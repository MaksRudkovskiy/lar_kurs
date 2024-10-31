<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction, Category, CustomCategories};
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DOMDocument;

class TransactionController extends Controller
{
    public function transactions(Request $request) {
        $request->validate([
            'category' => 'required|integer',
            'date' => 'required|date',
            'source' => 'nullable|integer',
            'type' => 'required|integer',
            'amount' => 'required|integer',
        ]);

        Transaction::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'date' => $request->date,
            'source_id' => $request->source,
            'type_id' => $request->type,
            'amount' => $request->amount,
        ]);
    
        $transaction = Transaction::where('user_id', Auth::id())->get();
    
        return redirect()->back()->with('transactions', $transaction);
    }

    public function DeleteCategory($id) {
        CustomCategories::where('id', $id)->delete();
        return redirect()->back();
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

        return redirect()->back();
    }
    // Данная функция transactions нужна для создания транзакции и занесения её в базу данных, откуда она будет выводиться в представление

    public function filter(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $monthlyData = $this->getMonthlyData();

        if ($request->category == 'all') {
            $paginator = Transaction::where('user_id', Auth::user()->id)
                ->orderBy('date', 'desc')
                ->paginate(30);
        } else {
            $paginator = Transaction::where('category_id', $request->category)
                ->where('user_id', Auth::user()->id)
                ->orderBy('date', 'desc')
                ->paginate(30);
        }

        $transactions = $paginator->groupBy(function ($transaction) {
            return Carbon::parse($transaction->date)->translatedFormat('d M. Y');
        });

        $user = Auth::user();
        $totalIncome = $transactions->flatten()->where('type_id', '2')->sum('amount');
        $totalExpense = $transactions->flatten()->where('type_id', '1')->sum('amount');

        return view('profile', [
            'transactions' => $transactions,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'monthlyData' => $monthlyData,
            'user' => $user,
            'paginator' => $paginator,
        ]);
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
