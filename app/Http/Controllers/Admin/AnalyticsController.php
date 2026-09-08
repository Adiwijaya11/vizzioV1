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
        $todayStr = now()->format('Y-m-d');
        $visitorToday = (int) VisitorLog::where('visit_date', $todayStr)->sum('visit_count');
        $totalVisitsMonth = (int) VisitorLog::where('visit_date', '>=', now()->subDays(30)->format('Y-m-d'))->sum('visit_count');
        $totalVisitsAll = (int) VisitorLog::sum('visit_count');

        // 14 days traffic
        $dates = [];
        $counts = [];
        for ($i = 13; $i >= 0; $i--) {
            $d = now()->subDays($i)->format('Y-m-d');
            $dates[] = date('d M', strtotime($d));
            $counts[] = (int) VisitorLog::where('visit_date', $d)->sum('visit_count');
        }

        // Recent visitor logs table
        $visitorLogs = VisitorLog::latest()->take(30)->get();

        // Referrers breakdown
        $sourceData = VisitorLog::whereNotNull('referrer')
            ->selectRaw('referrer, SUM(visit_count) as total')
            ->groupBy('referrer')
            ->orderByDesc('total')
            ->get();

        $groupedSources = [
            'Google Search' => 0,
            'Direct'        => (int) VisitorLog::whereNull('referrer')->sum('visit_count'),
            'LinkedIn'      => 0,
            'GitHub'        => 0,
            'Twitter / X'   => 0,
        ];

        foreach ($sourceData as $s) {
            $ref = strtolower($s->referrer ?? '');
            if (str_contains($ref, 'google')) {
                $groupedSources['Google Search'] += (int) $s->total;
            } elseif (str_contains($ref, 'linkedin')) {
                $groupedSources['LinkedIn'] += (int) $s->total;
            } elseif (str_contains($ref, 'github')) {
                $groupedSources['GitHub'] += (int) $s->total;
            } elseif (str_contains($ref, 'twitter') || str_contains($ref, 't.co')) {
                $groupedSources['Twitter / X'] += (int) $s->total;
            } else {
                $groupedSources['Direct'] += (int) $s->total;
            }
        }

        $totalSources = array_sum($groupedSources) ?: 1;
        $sources = [];
        $colors = ['#2563EB', '#10B981', '#F59E0B', '#8B5CF6', '#EC4899'];
        $ci = 0;
        foreach ($groupedSources as $label => $val) {
            $sources[] = [
                'label' => $label,
                'value' => round(($val / $totalSources) * 100),
                'count' => $val,
                'color' => $colors[$ci % count($colors)],
            ];
            $ci++;
        }

        return view('admin.analytics.index', compact(
            'visitorToday', 'totalVisitsMonth', 'totalVisitsAll',
            'dates', 'counts', 'visitorLogs', 'sources'
        ));
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
        $totalAll = Lead::count() ?: 1;
        foreach ($channelData as $c) {
            $channels[] = [
                'name'      => ucfirst($c->source ?? 'Website'),
                'leads'     => $c->total,
                'won'       => $c->won_count,
                'share'     => round(($c->total / $totalAll) * 100),
                'conv_rate' => $c->total > 0 ? round(($c->won_count / $c->total) * 100, 1) : 0,
            ];
        }

        return view('admin.analytics.traffic', compact('funnel', 'channels', 'totalLeads', 'wonDeals'));
    }
}
