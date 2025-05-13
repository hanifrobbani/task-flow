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

        $tasksThisWeek = $user->tasks()->whereBetween('created_at', [$startDate, $endDate])->get();
        $tasksToday = $user->tasks()->whereDate('created_at', Carbon::today())->get();
        $totalSecondsDay = 0;
        $totalSeconds = 0;

        foreach ($tasksToday as $task) {
            list($hours, $minutes, $seconds) = explode(':', $task->working_hour);
            $totalSecondsDay += ($hours * 3600) + ($minutes * 60) + $seconds;
        }
        foreach ($tasksThisWeek as $task) {
            list($hours, $minutes, $seconds) = explode(':', $task->working_hour);
            $totalSeconds += ($hours * 3600) + ($minutes * 60) + $seconds;
        }

        $totalHours = $totalSecondsDay / 3600;
        $dailyProgress = round($totalHours, 2);
        $dailyProgressWeek = round($totalSeconds / 3600, precision: 2);
        $weeklyPoint = $tasksThisWeek->sum('point');

        return view('users.statistic', compact('dailyProgress', 'weeklyPoint', 'dailyProgressWeek'));
    }
}
