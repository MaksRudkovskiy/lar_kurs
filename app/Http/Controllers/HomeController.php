<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Transaction, Category, CustomCategories};
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Auth;


class HomeController extends Controller
{
    public function index() // Данная функция index в этом контроллере нужна для передачи класса транзакции в переменную, к которой потом можно будет обращаться в представлении profile и выводить определённые данные из таблицы
    // Переменные $totalIncome и $totalExpense нужны для подсчёта общих расходов и доходов определённого пользователя.
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }
    
        $monthlyData = $this->getMonthlyData();
        $paginator = Transaction::where('user_id', Auth::user()->id)
            ->orderBy('date', 'desc')
            ->paginate(30);
    
        $transactions = $paginator->groupBy(function ($transaction) {
            return Carbon::parse($transaction->date)->translatedFormat('d M. Y');
        });
    
        $totalIncome = $transactions->flatten()->where('type_id', '2')->sum('amount');
        $totalExpense = $transactions->flatten()->where('type_id', '1')->sum('amount');
    
        $user = Auth::user();
        $customCat = CustomCategories::where('user_id', Auth::user()->id)->get()->keyBy('id');

        return view('profile', [
            'transactions' => $transactions,
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'monthlyData' => $monthlyData,
            'user' => $user,
            'customCat' => $customCat,
            'paginator' => $paginator,
        ]);
    }

    public function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => now(),
        ]);
    }
    
 
    public function index2() // Данная функция index2 нужна для передачи переменной $user, которая равна классу с данными пользователя. Нужно это для передачи в представление profile_settings данных пользователя
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $user = Auth::user();
        return view("profile_personalisation", ['user' => $user]);
    }
    

    public function index3() // index3 возвращает представление profile_report и обрабатывает данные транзакций таким образом, что транзакции с одинаковой категорией суммируются и группируются по месяцам
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }
    
        $user_id = Auth::user()->id;
    
        $transactions = Transaction::where('user_id', $user_id)
            ->where('type_id', '1')
            ->where(function ($query) {
                $query->whereNotNull('category_id')
                    ->orWhereNotNull('custom_category_id');
            })
            ->get()
            ->groupBy(function ($transaction) {
                $date = Carbon::parse($transaction->date);
                return $date->format('Y-m');
            });
    
        $monthlyData = [];
        foreach ($transactions->sortKeysDesc()->keys() as $month) {
            $categoriesSums = $transactions[$month]->filter(function ($transaction) {
                return $transaction->category_id !== null;
            })->groupBy('category_id')
            ->mapWithKeys(function ($transactionsForCategory) {
                $categoryId = $transactionsForCategory->first()->category_id;
                return [$categoryId => $transactionsForCategory->sum('amount')];
            })
            ->sortByDesc(null, SORT_REGULAR)
            ->all();
    
            $customCategoriesSums = $transactions[$month]->filter(function ($transaction) {
                return $transaction->custom_category_id !== null;
            })->groupBy('custom_category_id')
            ->mapWithKeys(function ($transactionsForCategory) {
                $categoryId = $transactionsForCategory->first()->custom_category_id;
                return [$categoryId => $transactionsForCategory->sum('amount')];
            })
            ->sortByDesc(null, SORT_REGULAR)
            ->all();
    
            $monthlyData[] = [
                'month' => Carbon::parse($month)->translatedFormat('F Y'),
                'categoriesSums' => $categoriesSums,
                'customCategoriesSums' => $customCategoriesSums,
            ];
        }
    
        $custom_categories = CustomCategories::where('user_id', $user_id)->get();
    
        $icons = $this->getIcons();
        $user = Auth::user();
        return view("profile_report", ['user' => $user, 'monthlyData' => $monthlyData, 'icons' => $icons, 'custom_categories' => $custom_categories]);
    }

    public function edit_info(Request $request) { // Данная функция позволяет редактировать данные профиля пользователя.
        $user = Auth::user();
        $user_info = User::where('id', $user->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'fathername' => $request->fathername,
            'phone' => $request->phone,
            'email' => $request->email,
            'tg_tag' => $request->tg_tag,
        ]);
        return redirect()->back(); // она отправляет запрос на обновление данных в таблице с пользователем, под чьим id отправляется запрос, обновляет данные и возвращает обратно на ту же страницу
    }
    

    public function edit_info_yandex(Request $request) { // Данная функция позволяет редактировать только два параметра пользователя, который зарегистрирован через Яндекс
        $user = Auth::user();
        $user_info = User::where('id', $user->id)->update([
            'fathername' => $request->fathername,
            'tg_tag' => $request->tg_tag,
        ]);
        return redirect()->back(); // она отправляет запрос на обновление данных в таблице с пользователем, под чьим id отправляется запрос, обновляет данные и возвращает обратно на ту же страницу
    }


    public function delete_transaction($id) { // Данная функция delete_transaction удаляет транзакцию с соответствующим id и возвращает пользователя обратно на страницу
        Transaction::where('id', $id)->delete();
        return redirect()->back();
    }
    

    public function categorySumm() { // Реализует отображение общих доходов и расходов на странице
        $categories = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $user_id = Auth::user()->id;
        $currentMonth = now()->month;
        $currentYear = now()->year;
    
        $categoriesSums = Transaction::whereIn('category_id', $categories)
            ->where('user_id', $user_id)
            ->where('type_id', '1')
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->groupBy('category_id')
            ->selectRaw('category_id, SUM(amount) as sum')
            ->get()
            ->pluck('sum', 'category_id')
            ->sortByDesc(null, SORT_REGULAR)
            ->all();
            
        return $categoriesSums;
    }

    private function getIcons() { // Вспомогательная функция для выведения иконок и их названий
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

    public function getMonthlyData() // вспомогательная функция для index3
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
