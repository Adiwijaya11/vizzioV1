<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorLog;
use App\Models\Lead;
use Illuminate\Http\Request;

class AnalyticsController extends Controller
{
    public function visitors(Request $request)
    {
        $search = $request->query('q');

        $todayStr = now()->format('Y-m-d');
        
        // Ringkasan Metrik Riil dari Database
        $visitorToday = (int) VisitorLog::where('visit_date', $todayStr)->sum('visit_count');
        $totalVisitsMonth = (int) VisitorLog::where('visit_date', '>=', now()->subDays(30)->format('Y-m-d'))->sum('visit_count');
        $totalVisitsAll = (int) VisitorLog::sum('visit_count');

        // Pengunjung Unik Riil (Berdasarkan IP Unik)
        $uniqueToday = VisitorLog::where('visit_date', $todayStr)->distinct('ip_address')->count('ip_address');
        $uniqueMonth = VisitorLog::where('visit_date', '>=', now()->subDays(30)->format('Y-m-d'))->distinct('ip_address')->count('ip_address');
        $uniqueAll = VisitorLog::distinct('ip_address')->count('ip_address');

        // Mapping Nama Hari & Bulan Bahasa Indonesia
        $daysMap = [1 => 'Sen', 2 => 'Sel', 3 => 'Rab', 4 => 'Kam', 5 => 'Jum', 6 => 'Sab', 7 => 'Min'];
        $monthsMap = [
            '01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'Mei', '06' => 'Jun',
            '07' => 'Jul', '08' => 'Agu', '09' => 'Sep', '10' => 'Okt', '11' => 'Nov', '12' => 'Des'
        ];

        // Trend Traffic 7, 14, dan 30 Hari
        $traffic7 = $this->buildTrafficSeries(7, $daysMap, $monthsMap);
        $traffic14 = $this->buildTrafficSeries(14, $daysMap, $monthsMap);
        $traffic30 = $this->buildTrafficSeries(30, $daysMap, $monthsMap);

        // Halaman Paling Sering Dikunjungi (Top Pages) Data Asli
        $topPages = VisitorLog::selectRaw('url, SUM(visit_count) as total_hits, COUNT(DISTINCT ip_address) as unique_visitors')
            ->whereNotNull('url')
            ->groupBy('url')
            ->orderByDesc('total_hits')
            ->take(6)
            ->get();
        $totalHitsAllPages = $topPages->sum('total_hits') ?: 1;

        // Sumber Rujukan Traffic (Referrers) Data Asli
        $sourceData = VisitorLog::selectRaw('referrer, SUM(visit_count) as total')
            ->groupBy('referrer')
            ->orderByDesc('total')
            ->get();

        $groupedSources = [
            'Direct / Langsung' => 0,
            'Google Search'     => 0,
            'LinkedIn'          => 0,
            'GitHub'            => 0,
            'Twitter / X'       => 0,
            'WhatsApp'          => 0,
            'Rujukan Lainnya'   => 0,
        ];

        foreach ($sourceData as $s) {
            $ref = strtolower($s->referrer ?? '');
            if (empty($ref) || $ref === 'direct') {
                $groupedSources['Direct / Langsung'] += (int) $s->total;
            } elseif (str_contains($ref, 'google')) {
                $groupedSources['Google Search'] += (int) $s->total;
            } elseif (str_contains($ref, 'linkedin')) {
                $groupedSources['LinkedIn'] += (int) $s->total;
            } elseif (str_contains($ref, 'github')) {
                $groupedSources['GitHub'] += (int) $s->total;
            } elseif (str_contains($ref, 'twitter') || str_contains($ref, 't.co')) {
                $groupedSources['Twitter / X'] += (int) $s->total;
            } elseif (str_contains($ref, 'whatsapp') || str_contains($ref, 'wa.me')) {
                $groupedSources['WhatsApp'] += (int) $s->total;
            } else {
                $groupedSources['Rujukan Lainnya'] += (int) $s->total;
            }
        }

        $totalSources = array_sum($groupedSources) ?: 1;
        $sources = [];
        $sourceColors = [
            'Direct / Langsung' => '#2563EB',
            'Google Search'     => '#10B981',
            'LinkedIn'          => '#0A66C2',
            'GitHub'            => '#333333',
            'Twitter / X'       => '#0284C7',
            'WhatsApp'          => '#25D366',
            'Rujukan Lainnya'   => '#8B5CF6',
        ];

        foreach ($groupedSources as $label => $val) {
            if ($val > 0) {
                $sources[] = [
                    'label' => $label,
                    'value' => round(($val / $totalSources) * 100, 1),
                    'count' => $val,
                    'color' => $sourceColors[$label] ?? '#64748B',
                ];
            }
        }

        // Breakdown Perangkat (Device & Browser) dari Data Asli
        $allAgents = VisitorLog::select('user_agent', 'visit_count')->get();
        $deviceBreakdown = ['Desktop' => 0, 'Mobile / Tablet' => 0];
        $browserBreakdown = ['Chrome' => 0, 'Safari' => 0, 'Firefox' => 0, 'Edge' => 0, 'Lainnya' => 0];

        foreach ($allAgents as $uaLog) {
            $agent = strtolower($uaLog->user_agent ?? '');
            $count = (int) $uaLog->visit_count;

            if (str_contains($agent, 'mobile') || str_contains($agent, 'android') || str_contains($agent, 'iphone')) {
                $deviceBreakdown['Mobile / Tablet'] += $count;
            } else {
                $deviceBreakdown['Desktop'] += $count;
            }

            if (str_contains($agent, 'edg/')) {
                $browserBreakdown['Edge'] += $count;
            } elseif (str_contains($agent, 'chrome') && !str_contains($agent, 'edg/')) {
                $browserBreakdown['Chrome'] += $count;
            } elseif (str_contains($agent, 'safari') && !str_contains($agent, 'chrome')) {
                $browserBreakdown['Safari'] += $count;
            } elseif (str_contains($agent, 'firefox')) {
                $browserBreakdown['Firefox'] += $count;
            } else {
                $browserBreakdown['Lainnya'] += $count;
            }
        }

        $totalDevices = array_sum($deviceBreakdown) ?: 1;
        $totalBrowsers = array_sum($browserBreakdown) ?: 1;

        // Tabel Riwayat Log Kunjungan Asli dengan Pagination & Search
        $queryLogs = VisitorLog::latest('visit_date')->latest('id');
        if ($search) {
            $queryLogs->where(function($q) use ($search) {
                $q->where('url', 'like', "%{$search}%")
                  ->orWhere('ip_address', 'like', "%{$search}%")
                  ->orWhere('referrer', 'like', "%{$search}%");
            });
        }
        $visitorLogs = $queryLogs->paginate(25)->withQueryString();

        return view('admin.analytics.index', compact(
            'visitorToday', 'totalVisitsMonth', 'totalVisitsAll',
            'uniqueToday', 'uniqueMonth', 'uniqueAll',
            'traffic7', 'traffic14', 'traffic30',
            'topPages', 'totalHitsAllPages',
            'sources',
            'deviceBreakdown', 'totalDevices',
            'browserBreakdown', 'totalBrowsers',
            'visitorLogs', 'search'
        ));
    }

    private function buildTrafficSeries(int $daysCount, array $daysMap, array $monthsMap): array
    {
        $dates = [];
        $categories = [];
        $counts = [];

        for ($i = $daysCount - 1; $i >= 0; $i--) {
            $dt = now()->subDays($i);
            $dStr = $dt->format('Y-m-d');
            $dayName = $daysMap[(int) $dt->format('N')] ?? 'Hari';
            $mStr = $monthsMap[$dt->format('m')] ?? $dt->format('M');
            $formattedDate = $dt->format('d') . ' ' . $mStr;

            $dates[] = $formattedDate;
            $categories[] = $dayName . ', ' . $formattedDate;
            $counts[] = (int) VisitorLog::where('visit_date', $dStr)->sum('visit_count');
        }

        $total = array_sum($counts);
        $peak = count($counts) ? max($counts) : 0;
        $peakIndex = array_search($peak, $counts);
        $peakDay = $categories[$peakIndex] ?? 'N/A';

        return [
            'dates' => $dates,
            'categories' => $categories,
            'counts' => $counts,
            'total' => $total,
            'avg' => round($total / $daysCount),
            'peak' => $peak,
            'peakDay' => $peakDay,
        ];
    }

    public function traffic(Request $request)
    {
        $totalVisitorMonth = VisitorLog::where('visit_date', '>=', now()->subDays(30)->format('Y-m-d'))->sum('visit_count') ?: 1250;
        $totalLeads = Lead::count();
        $qualifiedLeads = Lead::whereIn('status', ['qualified', 'proposal', 'won'])->count();
        $proposalLeads = Lead::whereIn('status', ['proposal', 'won'])->count();
        $wonDeals = Lead::where('status', 'won')->count();

        $funnel = [
            ['label' => 'Total Kunjungan Web', 'sub' => 'Audience Traffic', 'value' => $totalVisitorMonth, 'tone' => '#2563EB'],
            ['label' => 'Prospek Lead Masuk', 'sub' => 'Inquiry & Kontak', 'value' => $totalLeads, 'tone' => '#10B981'],
            ['label' => 'Lead Terkualifikasi', 'sub' => 'Qualified Prospects', 'value' => $qualifiedLeads, 'tone' => '#F59E0B'],
            ['label' => 'Pengiriman Proposal', 'sub' => 'Proposal & RFP', 'value' => $proposalLeads, 'tone' => '#8B5CF6'],
            ['label' => 'Kesepakatan Deal (Won)', 'sub' => 'Closing Projects', 'value' => $wonDeals, 'tone' => '#EC4899'],
        ];

        // Channel conversion
        $channelData = Lead::selectRaw('source, COUNT(*) as total, SUM(CASE WHEN status="won" THEN 1 ELSE 0 END) as won_count')
            ->groupBy('source')
            ->get();

        $channels = [];
        $totalChannelLeads = $totalLeads ?: 1;
        foreach ($channelData as $c) {
            $srcName = ucfirst($c->source ?: 'Website Langsung');
            $leadsCount = (int) $c->total;
            $wonCount = (int) $c->won_count;
            $convRate = $leadsCount > 0 ? round(($wonCount / $leadsCount) * 100, 1) : 0;
            $share = round(($leadsCount / $totalChannelLeads) * 100, 1);

            $channels[] = [
                'name'      => $srcName,
                'share'     => $share,
                'leads'     => $leadsCount,
                'won'       => $wonCount,
                'conv_rate' => $convRate,
            ];
        }

        return view('admin.analytics.traffic', compact('funnel', 'channels', 'totalLeads', 'wonDeals'));
    }
}
