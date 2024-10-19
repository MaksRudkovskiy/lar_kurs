<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction, Category};
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Auth;

class TransactionController extends Controller
{
    public function transactions(Request $request) {
        Transaction::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'date' => $request->date,
            'source_id' => $request->source,
            'type_id' => $request->type,
            'amount' => $request->amount,
        ]);
    
        // Получение транзакций
        
        $transaction = Transaction::where('user_id', Auth::id())->get();
        // dd($request);
        return redirect()->back()->with('transactions', $transaction);
    }

    public function edit($id)
    {
        $hui = Transaction::findOrFail($id);
        dd($hui);

        return view('profile', ['hui' => $hui]);
    }

    public function update(Request $request, $id)
    {
        $hui = Transaction::findOrFail($id);

        $hui->update([
            'category_id' => $request->category,
            'date' => $request->date,
            'source_id' => $request->source,
            'type_id' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect()->back()->with('success', 'Transaction updated successfully');
    }
    // Данная функция transactions нужна для создания транзакции и занесения её в базу данных, откуда она будет выводиться в представление

    public function filter(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $monthlyData = $this->getMonthlyData();

        if (($request->category) == 'all') {
            $transactions = Transaction::where('user_id', Auth::user()->id)
                ->orderBy('date', 'desc')
                ->get();
            $transactions = $transactions->groupBy(function ($transaction) {
                return Carbon::parse($transaction->date)->translatedformat('d M. Y');
            });
        } else {
            $transactions = Transaction::where('category_id',  $request->category)
                ->where('user_id', Auth::user()->id)
                ->orderBy('date', 'desc') 
                ->get()
                ->groupBy(function ($transaction) {
                    return Carbon::parse($transaction->date)->translatedformat('d M. Y');
                });
        }
        
        $totalIncome = $transactions->flatten()->where('type_id', '2')->sum('amount');

        $totalExpense = $transactions->flatten()->where('type_id', '1')->sum('amount');
        
        return view('profile', ['transactions' => $transactions, 'totalIncome' => $totalIncome, 'totalExpense' => $totalExpense, 'monthlyData' => $monthlyData]);
    }

    
    // Данная функция filter нужна для фильтрации транзакций по категориям
    // В данном случае условие проверяет, какие категории выбраны в форме фильтра модального окна
    // Если выбраны все категории, то она и будет выводить все категории
    // Иначе же будет выводиться какая-то определённая категория
    // Переменные $totalIncome и $totalExpense нужны для подсчёта общих расходов и доходов определённого пользователя по пути filter/, который копирует profile/, но необходим для филбтрации.

    public function getMonthlyData()
    {
    $transactions2 = Transaction::where('user_id', Auth::user()->id)
        ->orderBy('date', 'desc')
        ->get()
        ->groupBy(function ($transaction) {
            $date = Carbon::parse($transaction->date);
            return $date->format('Y-m');
        });

    $monthlyData = $transactions2->map(function ($transactionsForMonth, $month) {
        $totalIncome = $transactionsForMonth->where('type_id', '2')->sum('amount');
        $totalExpense = $transactionsForMonth->where('type_id', '1')->sum('amount');
        return [
            'month' => Carbon::parse($month)->translatedFormat('F Y'),
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
        ];
    })->values();

    return $monthlyData;
    }

}
