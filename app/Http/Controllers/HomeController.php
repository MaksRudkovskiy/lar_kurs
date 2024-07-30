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

    public function index3()
    {
        $categoriesSums = $this->categorySumm();

        $currentMonth = now()->month;
        $translatedMonth = $this->monthRu($currentMonth);
        $icons = $this->getIcons();

        $user = Auth::user();

        return view("profile_report", ['user' => $user, 'categoriesSums' => $categoriesSums, 'translatedMonth' => $translatedMonth, 'icons' => $icons]);
    }

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

    public function categorySumm() {

        $categories = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]; // your 12 category IDs

        $categoriesSums = Transaction::whereIn('category_id', $categories)
            ->where('type', 'outcome') // add this line to filter out "income" type
            ->groupBy('category_id')
            ->selectRaw('category_id, SUM(amount) as sum')
            ->get()
            ->pluck('sum', 'category_id')
            ->sortByDesc(null, SORT_REGULAR)
            ->all();
        
        return $categoriesSums;
    }

    private function getIcons() {
        return [
            1 => 'bus.svg',
            2 => 'cart.svg',
            3 => 'health.svg',
            4 => 'transaction.svg',
            5 => 'gamepad.svg',
            6 => 'entertainment.svg',
            7 => 'taxi.svg',
            8 => 'sport.svg',
            9 => 'beauty.svg',
            10 => 'fuel.svg',
            11 => 'house.svg',
            12 => 'other.svg',
        ];
    }

    private function monthRu($month) {
        $months = [
            1 => 'январь',
            2 => 'февраль',
            3 => 'март',
            4 => 'апрель',
            5 => 'май',
            6 => 'июнь',
            7 => 'июль',
            8 => 'август',
            9 => 'сентябрь',
            10 => 'октябрь',
            11 => 'ноябрь',
            12 => 'декабрь',
        ];
        return $months[$month];
    }
}
