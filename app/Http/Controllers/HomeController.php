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
    public function index()
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
    // Данная функция index в этом контроллере нужна для передачи класса транзакции в переменную, к которой потом можно будет обращаться в представлении profile и выводить определённые данные из таблицы
    // Переменные $totalIncome и $totalExpense нужны для подсчёта общих расходов и доходов определённого пользователя.

    public function index2()
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $user = Auth::user();
        return view("profile_settings", ['user' => $user]);
    }
    // Данная функция index2 нужна для передачи переменной $user, которая равна классу с данными пользователя. Нужно это для передачи в представление profile_settings данных пользователя

    public function index3()
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $user_id = Auth::user()->id;

        // Получаем транзакции с учетом как обычных, так и кастомных категорий
        $transactions = Transaction::where(function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type_id', '1')
                ->whereNotNull('category_id')
                ->orWhereNotNull('custom_category_id');
        })
        ->get()
        ->groupBy(function ($transaction) {
            $date = Carbon::parse($transaction->date);
            return $date->format('Y-m');
        });

        $monthlyData = [];
        foreach ($transactions->sortKeysDesc()->keys() as $month) {
            $categoriesSums = $transactions[$month]->groupBy(function ($transaction) {
                return $transaction->custom_category_id ?? $transaction->category_id;
            })
            ->mapWithKeys(function ($transactionsForCategory) {
                $categoryId = $transactionsForCategory->first()->custom_category_id ?? $transactionsForCategory->first()->category_id;
                return [$categoryId => $transactionsForCategory->sum('amount')];
            })
            ->sortByDesc(null, SORT_REGULAR)
            ->all();

            $monthlyData[] = [
                'month' => Carbon::parse($month)->translatedFormat('F Y'),
                'categoriesSums' => $categoriesSums,
            ];
        }

        $custom_categories = CustomCategories::all();

        $icons = $this->getIcons();
        $user = Auth::user();
        return view("profile_report", ['user' => $user, 'monthlyData' => $monthlyData, 'icons' => $icons, 'custom_categories' => $custom_categories]);
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

    public function edit_info_yandex(Request $request) {
        $user = Auth::user();
        $user_info = User::where('id', $user->id)->update([
            'fathername' => $request->fathername,
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

    public function categorySumm() {
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
