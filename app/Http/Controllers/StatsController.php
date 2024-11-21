<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\CustomCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Auth;

class StatsController extends Controller
{
    public function stats(Request $request) // Отрисовывает страницу статистики и вызывает вспомогательные функции разных графиков, а также задаёт значение по умолчанию у периода
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }
        if (Auth::User()->role !== 'admin') {
            return Redirect::route('profile');
        }

        $period = $request->input('period', 'last_7_days'); // По умолчанию последние 7 дней

        $userStats = $this->getUserStats($period);
        $transactionStats = $this->getTransactionStats($period);
        $customCatStats = $this->getCustomCatStats($period);
        $lastLoginByDay = $this->getLastLoginByDay();
        $transactionByMonth = $this->getTransactionByMonth();

        return view('profile_stats', compact(
            'userStats',
            'transactionStats',
            'customCatStats',
            'lastLoginByDay',
            'transactionByMonth',
            'period'
        ));
    }

    private function getUserStats($period) // Вспомогательная функция получения статистики по пользователям
    {
        $query = User::query();

        switch ($period) {
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'last_7_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
            case 'last_30_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
                break;
            case 'last_90_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(90));
                break;
            case 'all_time':
                break;
            default:
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
        }

        $totalUsers = $query->count();
        $newUsers = $query->where('created_at', '>=', Carbon::now()->subDays(1))->count();

        return [
            'totalUsers' => $totalUsers,
            'newUsers' => $newUsers,
        ];
    }

    private function getTransactionStats($period)
    {
        $query = Transaction::query();

        switch ($period) {
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'last_7_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
            case 'last_30_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
                break;
            case 'last_90_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(90));
                break;
            case 'all_time':
                break;
            default:
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
        }

        $totalTransactions = $query->count();
        $newTransactions = $query->where('created_at', '>=', Carbon::now()->subDays(1))->count();

        return [
            'totalTransactions' => $totalTransactions,
            'newTransactions' => $newTransactions,
        ];
    }

    private function getCustomCatStats($period)
    {
        $query = CustomCategories::query();

        switch ($period) {
            case 'yesterday':
                $query->whereDate('created_at', Carbon::yesterday());
                break;
            case 'today':
                $query->whereDate('created_at', Carbon::today());
                break;
            case 'last_7_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
            case 'last_30_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
                break;
            case 'last_90_days':
                $query->where('created_at', '>=', Carbon::now()->subDays(90));
                break;
            case 'all_time':
                break;
            default:
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
        }

        $totalCustomCat = $query->count();
        $newCustomCat = $query->where('created_at', '>=', Carbon::now()->subDays(1))->count();

        return [
            'totalCustomCat' => $totalCustomCat,
            'newCustomCat' => $newCustomCat,
        ];
    }

    private function getLastLoginByDay()
    {
        $lastLoginByDay = User::select(
            DB::raw('DATE(last_login_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->where('last_login_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $lastLoginByDayLabels = [];
        $lastLoginByDayData = [];

        for ($i = 0; $i < 30; $i++) {
            $date = Carbon::now()->subDays($i)->format('Y-m-d');
            $lastLoginByDayLabels[] = $date;
            $lastLoginByDayData[] = $lastLoginByDay->firstWhere('date', $date)->count ?? 0;
        }

        return [
            'labels' => array_reverse($lastLoginByDayLabels),
            'data' => array_reverse($lastLoginByDayData),
        ];
    }

    private function getTransactionByMonth()
{
    $transactions = Transaction::select(
        DB::raw('DATE_FORMAT(date, "%Y-%m") as month'),
        DB::raw('COUNT(*) as count')
    )
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $transactionByMonthLabels = [];
    $transactionByMonthData = [];

    foreach ($transactions as $transaction) {
        $month = Carbon::parse($transaction->month)->translatedFormat('F Y');
        $transactionByMonthLabels[] = $month;
        $transactionByMonthData[] = $transaction->count;
    }

    return [
        'labels' => $transactionByMonthLabels,
        'data' => $transactionByMonthData,
    ];
}
}