<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Message;
use App\Models\Lead;
use App\Models\Service;
use App\Models\NewsArticle;
use App\Models\VisitorLog;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu untuk mengakses panel admin.');
        }

        $userCount = User::count();
        $newsCount = NewsArticle::count();
        $proyekAktifCount = Project::where('status', 'active')->count();
        $proyekTotalCount = Project::count();
        $pesanMasuk = Message::where('status', 'unread')->count();
        $penawaran = Lead::whereIn('status', ['new', 'qualified', 'proposal'])->count();
        $layananCount = Service::count();

        $todayStr = now()->format('Y-m-d');
        $visitorToday = (int) VisitorLog::where('visit_date', $todayStr)->sum('visit_count');

        // 7-day traffic chart
        $trafficValues = [];
        $days = [];
        $daysMap = [1 => 'Sen', 2 => 'Sel', 3 => 'Rab', 4 => 'Kam', 5 => 'Jum', 6 => 'Sab', 7 => 'Min'];
        for ($i = 6; $i >= 0; $i--) {
            $d = now()->subDays($i)->format('Y-m-d');
            $trafficValues[] = (int) VisitorLog::where('visit_date', $d)->sum('visit_count');
            $dayNum = date('N', strtotime($d));
            $days[] = $daysMap[$dayNum] ?? 'Hari';
        }
        $trafficMax = max($trafficValues) ?: 10;
        $w = 560; $h = 180; $padX = 18; $padY = 22;
        $linePoints = [];
        $areaPoints = [];
        $points = [];
        for ($i = 0; $i < 7; $i++) {
            $x = $padX + $i * (($w - $padX * 2) / 6);
            $val = $trafficValues[$i] ?? 0;
            $y = $h - $padY - (($val / $trafficMax) * ($h - $padY * 2));
            $points[] = [round($x, 1), round($y, 1)];
            $linePoints[] = round($x, 1) . ',' . round($y, 1);
            $areaPoints[] = round($x, 1) . ',' . round($y, 1);
        }
        $areaPoints[] = round($padX + 6 * (($w - $padX * 2) / 6), 1) . ',' . ($h - $padY);
        $areaPoints[] = round($padX, 1) . ',' . ($h - $padY);

        $traffic = [
            'values' => $trafficValues,
            'max'    => $trafficMax,
            'points' => $points,
            'line'   => implode(' ', $linePoints),
            'area'   => implode(' ', $areaPoints),
        ];

        // Recent items
        $recentProjects = Project::latest()->take(3)->get();
        $recentMessages = Message::latest()->take(4)->get();
        $recentLeads = Lead::latest()->take(3)->get();
        $recentLogs = AuditLog::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'userCount', 'newsCount', 'proyekAktifCount', 'proyekTotalCount',
            'pesanMasuk', 'penawaran', 'layananCount', 'visitorToday',
            'traffic', 'days', 'w', 'h', 'padX', 'padY',
            'recentProjects', 'recentMessages', 'recentLeads', 'recentLogs'
        ));
    }
}
