<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\CustomCategories;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Auth;

class StatsController extends Controller
{
    public function stats(Request $request) // Отрисовывает страницу статистики и вызывает вспомогательные функции разных графиков, а также задаёт значение по умолчанию у периода
    {

        if (!Auth::check()) {
            return Redirect::route('login');
        }
        if (Auth::User()->role!=='admin') {
            return Redirect::route('profile');
        }

        $period = $request->input('period', 'last_7_days'); // По умолчанию последние 7 дней

        $userStats = $this->getUserStats($period);
        $transactionStats = $this->getTransactionStats($period);
        $customCatStats = $this->getCustomCatStats($period);

        return view('profile_stats', compact('userStats', 'transactionStats', 'customCatStats' , 'period'));
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

}