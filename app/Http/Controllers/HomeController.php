<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction, Category};
use Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        $totalIncome = $transactions->where('type', 'income')->sum('amount');
        $totalExpense = $transactions->where('type', 'outcome')->sum('amount');
        return view('profile', ['transactions' => $transactions, 'totalIncome' => $totalIncome, 'totalExpense' => $totalExpense]);
    }
    // Данная функция index в этом контроллере нужна для передачи класса транзакции в переменную, к которой потом можно будет обращаться в представлении profile и выводить определённые данные из таблицы
    // Переменные $totalIncome и $totalExpense нужны для подсчёта общих расходов и доходов определённого пользователя.

    public function index2()
    {
        $user = Auth::user();
        return view("profile_settings", ['user' => $user]);
    }
    // Данная функция index2 нужна для передачи переменной $user, которая равна классу с данными пользователя. Нужно это для передачи в представление profile_settings данных пользователя

    public function edit_info(Request $request) {
        $user = Auth::user();
        $user_info = User::where('id', $user->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'fathername' => $request->fathername,
            'phone' => $request->phone,
            'email' => $request->email,
            'tg_tag' => $request->tg_tag,
        ]);
        return redirect()->back();
    }
    // функция edit_info нужна для редактирования профиля пользователя
    // она отправляет запрос на обновление данных в таблице с пользователем, под чьим id отправляется запрос, обновляет данные и возвращает обратно на ту же страницу

    public function delete_transaction($id) {
        Transaction::where('id', $id)->delete();
        return redirect()->back();
    }
    // Данная функция delete_transaction удаляет транзакцию с соответствующим id и возвращает пользователя обратно на страницу

    public function filter(Request $request)
    {
        if (($request->category) == 'all') {
            $transactions = Transaction::where('user_id', Auth::user()->id)->get();
        } else {
            $transactions = Transaction::where('category_id',  $request->category)->get();
        }
        $totalIncome = $transactions->where('type', 'income')->sum('amount');
        $totalExpense = $transactions->where('type', 'outcome')->sum('amount');
        return view('profile', ['transactions' => $transactions, 'totalIncome' => $totalIncome, 'totalExpense' => $totalExpense]);
    }
    // Данная функция filter нужна для фильтрации транзакций по категориям
    // В данном случае условие проверяет, какие категории выбраны в форме фильтра модального окна
    // Если выбраны все категории, то она и будет выводить все категории
    // Иначе же будет выводиться какая-то определённая категория
    // Переменные $totalIncome и $totalExpense нужны для подсчёта общих расходов и доходов определённого пользователя по пути filter/, который копирует profile/, но необходим для филбтрации.
}
