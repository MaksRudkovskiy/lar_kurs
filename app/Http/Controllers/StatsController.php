<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class StatsController extends Controller
{
    public function stats(Request $request)
    {

        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $period = $request->input('period', 'last_7_days'); // По умолчанию последние 7 дней

        $userStats = $this->getUserStats($period);
        $pieChartData = $this->getPieChartData($period);

        return view('profile_stats', compact('userStats', 'period', 'pieChartData'));
    }

    private function getUserStats($period)
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

    private function getPieChartData($period)
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
            default:
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
        }

        $roles = ['user', 'privelegious_user', 'admin'];
        $pieChartData = [];

        foreach ($roles as $role) {
            $count = $query->where('role', $role)->count();
            $pieChartData[] = $count;
        }

        return $pieChartData;
    }
}