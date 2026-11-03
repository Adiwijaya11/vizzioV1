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

        $userRole = session('user_role', 'admin');

        $userCount = User::count();
        $superAdminCount = User::where('role', 'super_admin')->count();
        $adminRoleCount = User::where('role', 'admin')->count();

        $newsCount = NewsArticle::count();
        $proyekAktifCount = Project::where('status', 'active')->count();
        $proyekTotalCount = Project::count();
        $pesanMasuk = Message::where('status', 'unread')->count();
        $penawaran = Lead::whereIn('status', ['new', 'qualified', 'proposal'])->count();
        $layananCount = Service::count();

        $todayStr = now()->format('Y-m-d');
        $visitorToday = (int) VisitorLog::where('visit_date', $todayStr)->sum('visit_count');

        // Mapping Hari & Bulan dalam Bahasa Indonesia
        $daysMap = [1 => 'Sen', 2 => 'Sel', 3 => 'Rab', 4 => 'Kam', 5 => 'Jum', 6 => 'Sab', 7 => 'Min'];
        $monthsMap = [
            '01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'Mei', '06' => 'Jun',
            '07' => 'Jul', '08' => 'Agu', '09' => 'Sep', '10' => 'Okt', '11' => 'Nov', '12' => 'Des'
        ];

        // 7 Hari Terakhir
        $dates7 = [];
        $categories7 = [];
        $values7 = [];
        for ($i = 6; $i >= 0; $i--) {
            $dt = now()->subDays($i);
            $dStr = $dt->format('Y-m-d');
            $dayName = $daysMap[(int) $dt->format('N')] ?? 'Hari';
            $mStr = $monthsMap[$dt->format('m')] ?? $dt->format('M');
            $formattedDate = $dt->format('d') . ' ' . $mStr;

            $dates7[] = $formattedDate;
            $categories7[] = $dayName . ', ' . $formattedDate;
            $values7[] = (int) VisitorLog::where('visit_date', $dStr)->sum('visit_count');
        }

        // 14 Hari Terakhir
        $dates14 = [];
        $categories14 = [];
        $values14 = [];
        for ($i = 13; $i >= 0; $i--) {
            $dt = now()->subDays($i);
            $dStr = $dt->format('Y-m-d');
            $dayName = $daysMap[(int) $dt->format('N')] ?? 'Hari';
            $mStr = $monthsMap[$dt->format('m')] ?? $dt->format('M');
            $formattedDate = $dt->format('d') . ' ' . $mStr;

            $dates14[] = $formattedDate;
            $categories14[] = $dayName . ', ' . $formattedDate;
            $values14[] = (int) VisitorLog::where('visit_date', $dStr)->sum('visit_count');
        }

        $totalVisits7 = array_sum($values7);
        $totalVisits14 = array_sum($values14);
        $avgVisits7 = round($totalVisits7 / 7);
        $peakVisits7 = count($values7) ? max($values7) : 0;
        $peakIndex7 = array_search($peakVisits7, $values7);
        $peakDay7 = $categories7[$peakIndex7] ?? 'N/A';

        // Hitung persentase tren 7 hari ini vs 7 hari sebelumnya
        $prevWeekSum = 0;
        for ($i = 13; $i >= 7; $i--) {
            $dStr = now()->subDays($i)->format('Y-m-d');
            $prevWeekSum += (int) VisitorLog::where('visit_date', $dStr)->sum('visit_count');
        }
        $trendPercentage = 0;
        $trendIsUp = true;
        if ($prevWeekSum > 0) {
            $diff = $totalVisits7 - $prevWeekSum;
            $trendPercentage = round(($diff / $prevWeekSum) * 100, 1);
            $trendIsUp = $trendPercentage >= 0;
        } else {
            $trendPercentage = $totalVisits7 > 0 ? 100 : 0;
            $trendIsUp = true;
        }

        // Data Grafik Khusus Super Admin: Audit Trail & Aktivitas Sistem
        $allAuditActions = AuditLog::pluck('action');
        $authEventsCount = $allAuditActions->filter(fn($a) => in_array($a, ['login', 'logout', 'reset_password', 'user_verified']))->count();
        $systemEventsCount = $allAuditActions->filter(fn($a) => in_array($a, ['system_backup', 'settings_update', 'database_cleanup']))->count();
        $contentEventsCount = $allAuditActions->filter(fn($a) => in_array($a, ['create_article', 'update_article', 'delete_article', 'update_project', 'create_service', 'update_service']))->count();
        $leadsEventsCount = $allAuditActions->filter(fn($a) => in_array($a, ['update_lead', 'read_message', 'contact_reply', 'lead_created']))->count();

        // Nilai fallback visual bila record audit masih baru/sedikit
        if ($authEventsCount === 0 && $systemEventsCount === 0 && $contentEventsCount === 0 && $leadsEventsCount === 0) {
            $authEventsCount = 12;
            $systemEventsCount = 6;
            $contentEventsCount = 18;
            $leadsEventsCount = 9;
        }

        $superAdminChartData = [
            'series' => [$authEventsCount, $contentEventsCount, $systemEventsCount, $leadsEventsCount],
            'labels' => ['Autentikasi & Akun', 'Kelola Konten & Data', 'Sistem & Backup', 'Leads & Pesan'],
            'colors' => ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b'],
            'totalLogs' => AuditLog::count(),
            'superAdminCount' => $superAdminCount,
            'adminRoleCount' => $adminRoleCount,
        ];

        // Data Grafik Khusus Admin: Pipeline Leads & Portofolio
        $leadNewCount = Lead::where('status', 'new')->count();
        $leadQualifiedCount = Lead::where('status', 'qualified')->count();
        $leadProposalCount = Lead::where('status', 'proposal')->count();
        $leadWonCount = Lead::where('status', 'won')->count();
        $totalLeadsAll = Lead::count() ?: 1;
        $winRate = round(($leadWonCount / $totalLeadsAll) * 100, 1);

        $adminChartData = [
            'series' => [$leadNewCount, $leadQualifiedCount, $leadProposalCount, $leadWonCount],
            'labels' => ['Prospek Baru', 'Terkualifikasi', 'Pengajuan Proposal', 'Deal Berhasil (Won)'],
            'colors' => ['#3b82f6', '#6366f1', '#ec4899', '#10b981'],
            'totalLeads' => Lead::count(),
            'wonCount' => $leadWonCount,
            'winRate' => $winRate,
            'projectsPlanning' => Project::where('status', 'planning')->count(),
            'projectsActive' => $proyekAktifCount,
            'projectsCompleted' => Project::where('status', 'completed')->count(),
        ];

        // Recent items
        $recentProjects = Project::latest()->take(3)->get();
        $recentMessages = Message::latest()->take(4)->get();
        $recentLeads = Lead::latest()->take(3)->get();
        $recentLogs = AuditLog::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'userRole',
            'userCount', 'superAdminCount', 'adminRoleCount',
            'newsCount', 'proyekAktifCount', 'proyekTotalCount',
            'pesanMasuk', 'penawaran', 'layananCount', 'visitorToday',
            'dates7', 'categories7', 'values7', 'totalVisits7', 'avgVisits7', 'peakVisits7', 'peakDay7',
            'dates14', 'categories14', 'values14', 'totalVisits14',
            'trendPercentage', 'trendIsUp',
            'superAdminChartData', 'adminChartData',
            'recentProjects', 'recentMessages', 'recentLeads', 'recentLogs'
        ));
    }
}
