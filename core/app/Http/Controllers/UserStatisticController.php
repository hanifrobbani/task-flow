<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserStatisticController extends Controller
{
    public function taskProgress()
    {
        $user = Auth::user();
        $startDate = Carbon::today()->subDays(6);
        $endDate = Carbon::today()->endOfDay();

        // Ambil task sesuai rentang waktu
        $tasksToday = $user->tasks()->whereDate('created_at', Carbon::today())->get();
        $tasksThisWeek = $user->tasks()->whereBetween('created_at', [$startDate, $endDate])->get();
        $tasksThisMonth = $user->tasks()->whereMonth('created_at', Carbon::now()->month)->get();

        // Inisialisasi variabel
        $totalSecondsDay = 0;
        $totalSeconds = 0;
        $totalSecondsMonth = 0;

        $pointToday = 0;
        $pointMonth = 0;

        foreach ($tasksToday as $task) {
            list($hours, $minutes, $seconds) = explode(':', $task->working_hour);
            $secondsToday = ($hours * 3600) + ($minutes * 60) + $seconds;
            $totalSecondsDay += $secondsToday;
            $pointToday += $task->point;
        }

        foreach ($tasksThisWeek as $task) {
            list($hours, $minutes, $seconds) = explode(':', $task->working_hour);
            $totalSeconds += ($hours * 3600) + ($minutes * 60) + $seconds;
        }

        foreach ($tasksThisMonth as $task) {
            list($hours, $minutes, $seconds) = explode(':', $task->working_hour);
            $secondsMonth = ($hours * 3600) + ($minutes * 60) + $seconds;
            $totalSecondsMonth += $secondsMonth;
            $pointMonth += $task->point;
        }

        $totalHours = $totalSecondsDay / 3600;
        $totalHoursMonth = $totalSecondsMonth / 3600;

        $dailyProgress = round($totalHours, 2);
        $dailyProgressWeek = round($totalSeconds / 3600, 2);
        $weeklyPoint = $tasksThisWeek->sum('point');

        $efficiencyToday = $totalHours > 0 ? round($pointToday / $totalHours, 2) : 0;
        $efficiencyMonth = $totalHoursMonth > 0 ? round($pointMonth / $totalHoursMonth, 2) : 0;

        return view('users.statistic', compact(
            'dailyProgress',
            'weeklyPoint',
            'dailyProgressWeek',
            'efficiencyToday',
            'efficiencyMonth'
        ));
    }

}
