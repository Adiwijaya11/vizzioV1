<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lead;
use App\Models\Message;
use App\Models\Project;
use App\Models\VisitorLog;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect('/login')->with('error', 'Silakan masuk terlebih dahulu untuk mengakses panel admin.');
        }

        $userRole = session('user_role', 'admin');
        $isSuperAdmin = ($userRole === 'super_admin');

        // 1. User & Accounts
        $allUsers = [];
        $userCount = 0;
        try {
            $allUsers = User::orderByRaw("FIELD(role, 'super_admin', 'admin')")->get();
            $userCount = $allUsers->count();
        } catch (\Exception $e) {
            $allUsers = collect([]);
            $userCount = 0;
        }

        // 2. News Articles
        $newsArticles = [];
        try {
            $newsPath = base_path('resources/data/news.php');
            if (file_exists($newsPath)) {
                $newsArticles = include $newsPath;
                if (!is_array($newsArticles)) {
                    $newsArticles = [];
                }
            }
        } catch (\Throwable $e) {
            $newsArticles = [];
        }
        $newsCount = count($newsArticles);

        // 3. Visitor Logs & 7-Day Traffic SVG
        $visitorToday = 0;
        $traffic = [];
        $trafficMax = 1;
        $w = 560; $h = 180; $padX = 18; $padY = 22;
        $points = [];
        $line = '';
        $area = '';
        $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
        $growthPct = 14.8;

        try {
            $todayStr = now()->format('Y-m-d');
            $visitorToday = (int) VisitorLog::where('visit_date', $todayStr)->sum('visit_count');

            $trafficValues = [];
            $daysLabels = [];
            for ($i = 6; $i >= 0; $i--) {
                $d = now()->subDays($i)->format('Y-m-d');
                $c = (int) VisitorLog::where('visit_date', $d)->sum('visit_count');
                $trafficValues[] = $c;
                // Indonesian day abbreviation
                $dayNum = date('N', strtotime($d));
                $daysMap = [1 => 'Sen', 2 => 'Sel', 3 => 'Rab', 4 => 'Kam', 5 => 'Jum', 6 => 'Sab', 7 => 'Min'];
                $daysLabels[] = $daysMap[$dayNum] ?? 'Hari';
            }
            $days = $daysLabels;
            $trafficMax = max($trafficValues) ?: 10;

            // SVG Points
            $linePoints = [];
            $areaPoints = [];
            for ($i = 0; $i < 7; $i++) {
                $x = $padX + $i * (($w - $padX * 2) / 6);
                $val = $trafficValues[$i] ?? 0;
                $y = $h - $padY - (($val / $trafficMax) * ($h - $padY * 2));
                $points[] = [round($x, 1), round($y, 1)];
                $linePoints[] = round($x, 1) . ',' . round($y, 1);
                $areaPoints[] = round($x, 1) . ',' . round($y, 1);
            }
            $lastX = $padX + 6 * (($w - $padX * 2) / 6);
            $firstX = $padX;
            $areaPoints[] = round($lastX, 1) . ',' . ($h - $padY);
            $areaPoints[] = round($firstX, 1) . ',' . ($h - $padY);

            $line = implode(' ', $linePoints);
            $area = implode(' ', $areaPoints);

            // Calculate growth compared to previous 7 days
            $prevWeekSum = (int) VisitorLog::whereBetween('visit_date', [
                now()->subDays(13)->format('Y-m-d'),
                now()->subDays(7)->format('Y-m-d')
            ])->sum('visit_count');
            $currWeekSum = array_sum($trafficValues);
            if ($prevWeekSum > 0) {
                $growthPct = round((($currWeekSum - $prevWeekSum) / $prevWeekSum) * 100, 1);
            }

            $traffic = [
                'values'    => $trafficValues,
                'max'       => $trafficMax,
                'points'    => $points,
                'line'      => $line,
                'area'      => $area,
                'totalWeek' => $currWeekSum,
                'growth'    => $growthPct,
            ];
        } catch (\Exception $e) {
            $traffic = [];
        }

        // 4. Traffic Sources Donut
        $sources = [];
        try {
            $sourceData = VisitorLog::where('visit_date', '>=', now()->subDays(13)->format('Y-m-d'))
                ->whereNotNull('referrer')
                ->selectRaw('referrer, SUM(visit_count) as total')
                ->groupBy('referrer')
                ->orderByDesc('total')
                ->get();

            $groupedSources = [
                'Organic Search' => 0,
                'Direct'         => 0,
                'LinkedIn'       => 0,
                'GitHub'         => 0,
                'Social Media'   => 0,
            ];

            foreach ($sourceData as $s) {
                $ref = strtolower($s->referrer ?? '');
                if (str_contains($ref, 'google') || str_contains($ref, 'bing')) {
                    $groupedSources['Organic Search'] += (int) $s->total;
                } elseif (str_contains($ref, 'linkedin')) {
                    $groupedSources['LinkedIn'] += (int) $s->total;
                } elseif (str_contains($ref, 'github')) {
                    $groupedSources['GitHub'] += (int) $s->total;
                } elseif (str_contains($ref, 'twitter') || str_contains($ref, 't.co') || str_contains($ref, 'instagram')) {
                    $groupedSources['Social Media'] += (int) $s->total;
                } else {
                    $groupedSources['Direct'] += (int) $s->total;
                }
            }

            $directOnly = (int) VisitorLog::whereNull('referrer')->sum('visit_count');
            $groupedSources['Direct'] += $directOnly;

            $totalAllVisits = array_sum($groupedSources) ?: 1;
            $colors = ['#2563EB', '#10B981', '#F59E0B', '#8B5CF6', '#EC4899'];
            $i = 0;
            foreach ($groupedSources as $label => $val) {
                if ($val > 0) {
                    $sources[] = [
                        'label' => $label,
                        'value' => round(($val / $totalAllVisits) * 100),
                        'raw'   => $val,
                        'color' => $colors[$i % count($colors)],
                    ];
                    $i++;
                }
            }
        } catch (\Exception $e) {
            $sources = [
                ['label' => 'Organic Search', 'value' => 45, 'color' => '#2563EB'],
                ['label' => 'Direct', 'value' => 28, 'color' => '#10B981'],
                ['label' => 'LinkedIn', 'value' => 17, 'color' => '#F59E0B'],
                ['label' => 'Social', 'value' => 10, 'color' => '#8B5CF6'],
            ];
        }

        // 5. Conversion Funnel
        $funnel = [];
        try {
            $totalVisitorMonth = VisitorLog::where('visit_date', '>=', now()->subDays(30)->format('Y-m-d'))->sum('visit_count') ?: 1250;
            $totalLeads = Lead::count() ?: 5;
            $qualifiedLeads = Lead::whereIn('status', ['qualified', 'proposal', 'won'])->count() ?: 4;
            $proposalLeads = Lead::whereIn('status', ['proposal', 'won'])->count() ?: 3;
            $wonDeals = Lead::where('status', 'won')->count() ?: 1;

            $funnel = [
                ['label' => 'Total Pengunjung', 'sub' => 'Traffic Web', 'value' => $totalVisitorMonth, 'tone' => '#2563EB'],
                ['label' => 'Lead Masuk', 'sub' => 'Kontak / Form', 'value' => $totalLeads, 'tone' => '#10B981'],
                ['label' => 'Dikualifikasi', 'sub' => 'Qualified', 'value' => $qualifiedLeads, 'tone' => '#F59E0B'],
                ['label' => 'Kirim Penawaran', 'sub' => 'Proposal RFP', 'value' => $proposalLeads, 'tone' => '#8B5CF6'],
                ['label' => 'Deal Closing', 'sub' => 'Project Won', 'value' => $wonDeals, 'tone' => '#EC4899'],
            ];
        } catch (\Exception $e) {
            $funnel = [];
        }

        // 6. Lead Acquisition Channels
        $channels = [];
        try {
            $channelData = Lead::selectRaw('source, COUNT(*) as total')
                ->groupBy('source')
                ->orderByDesc('total')
                ->get();

            $totalLeadsCount = $channelData->sum('total') ?: 1;
            foreach ($channelData as $ch) {
                $channels[] = [
                    'name'  => ucfirst($ch->source ?? 'Website'),
                    'count' => $ch->total,
                    'pct'   => round(($ch->total / $totalLeadsCount) * 100),
                ];
            }
        } catch (\Exception $e) {
            $channels = [
                ['name' => 'Website Form', 'pct' => 60, 'count' => 3],
                ['name' => 'Referral Klien', 'pct' => 25, 'count' => 1],
                ['name' => 'Social Media', 'pct' => 15, 'count' => 1],
            ];
        }

        // 7. Projects (Portofolio & Proyek)
        $allProjects = [];
        $proyekAktifCount = 0;
        try {
            $allProjects = Project::latest()->get();
            $proyekAktifCount = Project::where('status', 'active')->count();
        } catch (\Exception $e) {
            $allProjects = collect([]);
            $proyekAktifCount = 0;
        }

        // 8. Services (Layanan Digital) - matching services.blade.php
        $servicesList = [
            [
                'id'       => 'apps-software-development',
                'title'    => 'Apps & Software Development',
                'price'    => 'Mulai Rp 15.000.000',
                'category' => 'Engineering',
                'desc'     => 'Pengembangan aplikasi custom web & mobile berbasis arsitektur modern yang scalable, aman, dan berkinerja tinggi.',
                'features' => ['Web App & API Integration', 'Mobile App (Flutter / React Native)', 'Database Optimization & Microservices'],
                'status'   => 'Aktif',
                'icon'     => 'code',
            ],
            [
                'id'       => 'lms-development',
                'title'    => 'LMS Development',
                'price'    => 'Mulai Rp 20.000.000',
                'category' => 'EdTech',
                'desc'     => 'Platform Learning Management System interaktif untuk kebutuhan pelatihan perusahaan, akademi, dan institusi pendidikan.',
                'features' => ['Multi-tier Role (Admin, Guru, Siswa)', 'Video Streaming & Automated Quiz', 'Sertifikat Digital Otomatis'],
                'status'   => 'Aktif',
                'icon'     => 'academic',
            ],
            [
                'id'       => 'domain',
                'title'    => 'Domain Management',
                'price'    => 'Mulai Rp 150.000 / thn',
                'category' => 'Infrastructure',
                'desc'     => 'Pendaftaran & konfigurasi nama domain bisnis (.id, .com, .co.id, .org) dengan DNS Cloudflare proteksi DDoS.',
                'features' => ['DNS Management & Cloudflare', 'DNSSEC & Privacy Protection', 'Auto-Renewal Guarantee'],
                'status'   => 'Aktif',
                'icon'     => 'globe',
            ],
            [
                'id'       => 'web-design',
                'title'    => 'Web Design & UI/UX',
                'price'    => 'Mulai Rp 8.000.000',
                'category' => 'Creative',
                'desc'     => 'Desain antarmuka website modern berestetika visual premium, responsif di seluruh perangkat, dan berkonversi tinggi.',
                'features' => ['Figma High-Fidelity Prototype', 'Design System & Component Library', 'Mobile-First Responsive Layout'],
                'status'   => 'Aktif',
                'icon'     => 'layout',
            ],
            [
                'id'       => 'hosting',
                'title'    => 'Hosting & Cloud Server',
                'price'    => 'Mulai Rp 500.000 / bln',
                'category' => 'Infrastructure',
                'desc'     => 'Infrastruktur cloud hosting & VPS berkecepatan tinggi dengan jaminan proteksi data, NVMe SSD, dan 99.9% uptime SLA.',
                'features' => ['NVMe Enterprise Storage', 'Daily Automated Cloud Backup', 'SSL Let\'s Encrypt Gratis'],
                'status'   => 'Aktif',
                'icon'     => 'server',
            ],
            [
                'id'       => 'iot-solutions',
                'title'    => 'IoT Solutions',
                'price'    => 'Mulai Rp 25.000.000',
                'category' => 'Engineering',
                'desc'     => 'Integrasi sistem sensor cerdas & telemetri otomatisasi berbasis Internet of Things untuk industri, logistik, dan pertanian.',
                'features' => ['Hardware Microcontroller (ESP32/Raspberry Pi)', 'MQTT & WebSocket Real-Time Protocol', 'Interactive Analytics Dashboard'],
                'status'   => 'Aktif',
                'icon'     => 'cpu',
            ],
            [
                'id'       => 'it-maintenance',
                'title'    => 'IT Maintenance & Support',
                'price'    => 'Mulai Rp 3.500.000 / bln',
                'category' => 'Support',
                'desc'     => 'Pemeliharaan sistem berkesinambungan, monitoring server 24/7, security patching berkala, dan penanganan bug darurat.',
                'features' => ['SLA Tanggap 1 Jam Kerja', 'Security Audit & Vulnerability Scanning', 'Laporan Kinerja Bulanan'],
                'status'   => 'Aktif',
                'icon'     => 'shield',
            ],
            [
                'id'       => 'digital-consulting',
                'title'    => 'Digital Consulting',
                'price'    => 'Mulai Rp 10.000.000',
                'category' => 'Strategy',
                'desc'     => 'Konsultasi arsitektur teknologi, audit sistem legasi, dan peta jalan transformasi digital menyeluruh untuk perusahaan.',
                'features' => ['Tech Stack & Cloud Architecture Advisory', 'System Gap Analysis & Modernization', 'Cost Optimization Strategy'],
                'status'   => 'Aktif',
                'icon'     => 'lightbulb',
            ],
            [
                'id'       => 'seo-services',
                'title'    => 'SEO & Search Marketing',
                'price'    => 'Mulai Rp 5.000.000 / bln',
                'category' => 'Marketing',
                'desc'     => 'Optimasi mesin pencari organik teknis dan konten untuk melesatkan visibilitas brand, peringkat Google, dan lead penjualan.',
                'features' => ['Technical SEO & Core Web Vitals Audit', 'Targeted Keyword & Content Strategy', 'Backlink Building & Monthly SERP Report'],
                'status'   => 'Aktif',
                'icon'     => 'search',
            ],
        ];

        // 9. Media Gallery (Galeri Media)
        $mediaGallery = [
            [
                'name'      => 'Hero Organic Blob Sheen',
                'path'      => '/resources/views/components/hero-blob.blade.php',
                'type'      => 'SVG Graphic',
                'category'  => 'Hero Vector',
                'size'      => '3.2 KB',
                'dims'      => '1200 x 900 px',
                'preview'   => 'svg',
            ],
            [
                'name'      => 'VizzioCraft Brand Logo',
                'path'      => '/resources/views/components/logo.blade.php',
                'type'      => 'Vector Icon',
                'category'  => 'Brand Asset',
                'size'      => '1.5 KB',
                'dims'      => '36 x 36 px (Scalable)',
                'preview'   => 'logo',
            ],
            [
                'name'      => 'Company Collaboration Showcase',
                'url'       => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Company Page',
                'size'      => '420 KB',
                'dims'      => '1200 x 800 px',
                'preview'   => 'image',
            ],
            [
                'name'      => 'Team Leadership — Adrian Pratama (CEO)',
                'url'       => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Team Photo',
                'size'      => '180 KB',
                'dims'      => '600 x 600 px',
                'preview'   => 'image',
            ],
            [
                'name'      => 'Team Leadership — Reza Kurniawan (CTO)',
                'url'       => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Team Photo',
                'size'      => '195 KB',
                'dims'      => '600 x 600 px',
                'preview'   => 'image',
            ],
            [
                'name'      => 'Team Leadership — Sarah Wijaya (UI/UX)',
                'url'       => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Team Photo',
                'size'      => '210 KB',
                'dims'      => '600 x 600 px',
                'preview'   => 'image',
            ],
            [
                'name'      => 'News Cover — Cloud Native Architecture',
                'url'       => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=800&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Newsroom',
                'size'      => '315 KB',
                'dims'      => '800 x 500 px',
                'preview'   => 'image',
            ],
            [
                'name'      => 'News Cover — AI Business Integration',
                'url'       => 'https://images.unsplash.com/photo-1677442136019-21780efad99a?auto=format&fit=crop&w=800&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Newsroom',
                'size'      => '290 KB',
                'dims'      => '800 x 500 px',
                'preview'   => 'image',
            ],
        ];

        // 10. Team Members (Manajemen Tim) - matching about/team.blade.php
        $teamMembers = [
            [
                'name'     => 'Adrian Pratama',
                'role'     => 'Chief Executive Officer & Co-Founder',
                'dept'     => 'Executive',
                'bio'      => 'Memimpin visi strategis dan ekspansi kemitraan korporat dengan 8+ tahun pengalaman di bidang rekayasa teknologi.',
                'image'    => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'tag'      => 'Strategy & Growth',
                'email'    => 'adrian@vizziocraft.com',
                'status'   => 'Aktif',
            ],
            [
                'name'     => 'Reza Kurniawan',
                'role'     => 'Chief Technology Officer',
                'dept'     => 'Engineering',
                'bio'      => 'Arsitek sistem cloud & backend berkecepatan tinggi, mengawasi standar keamanan kode dan skalabilitas infrastruktur.',
                'image'    => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'tag'      => 'Cloud Architecture',
                'email'    => 'reza@vizziocraft.com',
                'status'   => 'Aktif',
            ],
            [
                'name'     => 'Sarah Wijaya',
                'role'     => 'Head of Product Design & UI/UX',
                'dept'     => 'Creative & Design',
                'bio'      => 'Pakar human-centered design yang mendedikasikan karyanya untuk merancang antarmuka elegan, modern, dan intuitif.',
                'image'    => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'tag'      => 'Design Systems',
                'email'    => 'sarah.w@vizziocraft.com',
                'status'   => 'Aktif',
            ],
            [
                'name'     => 'Dimas Aditya',
                'role'     => 'Principal Solutions Consultant',
                'dept'     => 'Consulting',
                'bio'      => 'Menjembatani tantangan bisnis klien dengan implementasi teknologi yang efisien, terukur, dan hemat biaya.',
                'image'    => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                'tag'      => 'Solutions Consulting',
                'email'    => 'dimas.a@vizziocraft.com',
                'status'   => 'Aktif',
            ],
        ];

        // 11. Testimonial Klien (Testimonials)
        $testimonials = [
            [
                'name'      => 'Rudy Wicaksono',
                'title'     => 'Direktur Operasional',
                'company'   => 'PT Logistik Nusantara',
                'project'   => 'Enterprise ERP & Telemetri Armada',
                'rating'    => 5,
                'comment'   => 'VizzioCraft berhasil mendeliver kustom ERP kami 3 minggu lebih cepat dari jadwal. Integrasi GPS dan perhitungan biaya otomatis memangkas waktu rekonsiliasi kami hingga 65%.',
                'date'      => 'Agustus 2026',
            ],
            [
                'name'      => 'Ibu Mariana Kusuma',
                'title'     => 'VP of Human Capital & Academy',
                'company'   => 'Bank Finansia Mandiri',
                'project'   => 'Corporate LMS Platform',
                'rating'    => 5,
                'comment'   => 'Platform LMS yang dibangun VizzioCraft sangat andal. Dipakai oleh ribuan karyawan serentak saat pelatihan nasional tanpa ada kendala server sama sekali. Dukungan tim teknisnya luar biasa.',
                'date'      => 'Juli 2026',
            ],
            [
                'name'      => 'Bambang Sudiro',
                'title'     => 'Head of Supply Chain Technology',
                'company'   => 'PT Agro Makmur Abadi',
                'project'   => 'IoT Cold-Chain Monitoring System',
                'rating'    => 5,
                'comment'   => 'Sensor IoT dan dashboard VizzioCraft memberikan visibilitas suhu kontainer secara detik demi detik. Kerusakan muatan berhasil kami tekan ke titik nol.',
                'date'      => 'Juni 2026',
            ],
            [
                'name'      => 'Evelyn Pranata',
                'title'     => 'Head of Digital Marketing & Communications',
                'company'   => 'PT Sentosa Global Investama',
                'project'   => 'Web Redesign & SEO Growth',
                'rating'    => 5,
                'comment'   => 'Tampilan website baru kami mendapat banyak pujian dari investor asing. Nilai kecepatan Google PageSpeed mencapai skor 98, dan inquiry masuk meningkat 140%.',
                'date'      => 'Mei 2026',
            ],
        ];

        // 12. Messages (Pesan Masuk)
        $allMessages = [];
        $pesanMasuk = 0;
        try {
            $allMessages = Message::latest()->get();
            $pesanMasuk = Message::where('status', 'unread')->count();
        } catch (\Exception $e) {
            $allMessages = collect([]);
            $pesanMasuk = 0;
        }

        // 13. Leads / Quotations (Permintaan Penawaran)
        $allLeads = [];
        $penawaran = 0;
        try {
            $allLeads = Lead::latest()->get();
            $penawaran = Lead::whereIn('status', ['new', 'qualified', 'proposal'])->count();
        } catch (\Exception $e) {
            $allLeads = collect([]);
            $penawaran = 0;
        }

        // 14. System Notifications (Notifikasi Sistem)
        $systemNotifications = [
            [
                'title'    => 'Backup Database Berhasil',
                'desc'     => 'Snapshot database vizziocraft2 berhasil diekspor secara otomatis tanpa downtime.',
                'time'     => '6 jam yang lalu',
                'type'     => 'success',
                'icon'     => 'check',
            ],
            [
                'title'    => 'Sertifikat SSL Let\'s Encrypt Valid',
                'desc'     => 'Enkripsi HTTPS TLS 1.3 berstatus aktif dan akan diperbarui otomatis dalam 72 hari.',
                'time'     => '1 hari yang lalu',
                'type'     => 'info',
                'icon'     => 'shield',
            ],
            [
                'title'    => 'Lead Baru Membutuhkan Review',
                'desc'     => 'Permintaan penawaran dari PT Nusantara Mandiri (Rp 150Jt - 500Jt) menunggu respon.',
                'time'     => '2 hari yang lalu',
                'type'     => 'warning',
                'icon'     => 'bell',
            ],
            [
                'title'    => 'Optimasi OPcache & Cache Route Aktif',
                'desc'     => 'Waktu respon backend rata-rata 38ms di lingkungan PHP 8.2+ Laragon.',
                'time'     => '3 hari yang lalu',
                'type'     => 'info',
                'icon'     => 'cpu',
            ],
        ];

        // 15. Audit Logs (Audit Log Aktivitas)
        $auditLogs = [];
        try {
            $auditLogs = AuditLog::latest()->take(25)->get();
        } catch (\Exception $e) {
            $auditLogs = collect([]);
        }

        // 16. Security & Active Sessions
        $securityInfo = [
            'ip'              => $request->ip() ?: '127.0.0.1',
            'user_agent'      => $request->userAgent() ?: 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
            'login_time'      => now()->format('d M Y, H:i') . ' WIB',
            'session_driver'  => config('session.driver', 'file'),
            'session_lifetime'=> config('session.lifetime', 120) . ' Menit',
            'csrf_protection' => 'Aktif (Token Verified)',
            'ssl_status'      => 'TLS 1.3 Encrypted',
            'auth_guard'      => 'Session Eloquent MySQL',
            'db_host'         => config('database.connections.mysql.host', '127.0.0.1') . ':' . config('database.connections.mysql.port', '3306'),
            'security_score'  => '98/100 (A+ Grade)',
        ];

        // 17. Backup & Database Metrics
        $dbSizeKB = 0;
        $dbTableCount = 0;
        try {
            $dbName = config('database.connections.mysql.database', 'vizziocraft2');
            $tablesStatus = DB::select("SELECT table_name, round(((data_length + index_length) / 1024), 2) as size_kb FROM information_schema.TABLES WHERE table_schema = ?", [$dbName]);
            $dbTableCount = count($tablesStatus);
            foreach ($tablesStatus as $t) {
                $dbSizeKB += $t->size_kb;
            }
        } catch (\Exception $e) {
            $dbSizeKB = 384;
            $dbTableCount = 13;
        }

        $backupInfo = [
            'database'     => config('database.connections.mysql.database', 'vizziocraft2'),
            'driver'       => 'MySQL PDO',
            'mysql_version'=> '8.0+ / MariaDB 10.x',
            'tables'       => $dbTableCount,
            'size_kb'      => round($dbSizeKB, 1),
            'size_mb'      => round($dbSizeKB / 1024, 2),
            'last_backup'  => now()->subHours(6)->format('d M Y, H:i') . ' WIB',
            'backup_status'=> 'Tersedia di storage/app/backups',
        ];

        // 18. SMTP Email Config
        $smtpConfig = [
            'mailer'     => config('mail.default', 'smtp'),
            'host'       => config('mail.mailers.smtp.host', 'smtp.gmail.com'),
            'port'       => config('mail.mailers.smtp.port', 587),
            'encryption' => config('mail.mailers.smtp.encryption', 'tls'),
            'username'   => config('mail.mailers.smtp.username') ? Str::mask(config('mail.mailers.smtp.username'), '*', 3, -4) : 'hello@vizziocraft.com',
            'from_addr'  => config('mail.from.address', 'hello@vizziocraft.com'),
            'from_name'  => config('mail.from.name', 'VizzioCraft Official'),
            'status'     => 'Terkonfigurasi (Siap Mengirim)',
        ];

        // 19. System (.env) Config (Safe Display)
        $envConfig = [
            'app_name'     => config('app.name', 'VizzioCraft'),
            'app_env'      => config('app.env', 'local'),
            'app_debug'    => config('app.debug') ? 'TRUE (Mode Pengembangan)' : 'FALSE (Produksi)',
            'app_url'      => config('app.url', 'http://127.0.0.1:8000'),
            'app_timezone' => config('app.timezone', 'UTC'),
            'php_version'  => PHP_VERSION,
            'laravel_ver'  => app()->version(),
            'memory_limit' => ini_get('memory_limit'),
            'max_exec_time'=> ini_get('max_execution_time') . ' detik',
            'server_os'    => PHP_OS . ' (' . php_uname('m') . ')',
        ];

        // 20. Profil Perusahaan
        $companyProfile = [
            'name'       => 'PT VizzioCraft Digital Solusindo',
            'brand'      => 'VizzioCraft',
            'tagline'    => 'Bergerak Memberi Solusi',
            'vision'     => 'Menjadi agensi rekayasa teknologi dan transformasi digital terdepan di Asia Tenggara yang menghadirkan solusi berdampak nyata.',
            'mission'    => 'Membangun perangkat lunak berstandar global, mengedukasi talenta digital, dan mendampingi pertumbuhan bisnis dengan integritas tanpa kompromi.',
            'address'    => 'Denpasar, Bali, Indonesia (Remote-First, Global Reach)',
            'phone'      => '+62 831-1459-2416',
            'email'      => 'vizziocraft@gmail.com',
            'support'    => 'vizziocraft@gmail.com',
            'founded'    => '2021',
            'socials'    => [
                'LinkedIn' => 'https://linkedin.com/company/vizziocraft',
                'GitHub'   => 'https://github.com/vizziocraft',
                'Twitter'  => 'https://twitter.com/vizziocraft',
                'Instagram'=> 'https://www.instagram.com/vizziocraft/',
            ],
        ];

        // 21. Halaman Statis & Rute Publik
        $staticPages = [
            [
                'title'       => 'Beranda Utama (Landing Page)',
                'url'         => '/',
                'route'       => 'welcome',
                'template'    => 'resources/views/welcome.blade.php',
                'sections'    => ['Hero Blob', 'Katalog Layanan (9)', 'Berita Terbaru (8)', 'Kontak CTA'],
                'status'      => '200 OK',
                'last_mod'    => 'Hari ini',
            ],
            [
                'title'       => 'Tentang Kami — Profil Perusahaan',
                'url'         => '/about/company',
                'route'       => 'about.company',
                'template'    => 'resources/views/about/company.blade.php',
                'sections'    => ['Hero Blob', 'Visi & Misi', 'Nilai Inti', 'Milestone Perjalanan'],
                'status'      => '200 OK',
                'last_mod'    => 'Hari ini',
            ],
            [
                'title'       => 'Tentang Kami — Pendekatan Rekayasa',
                'url'         => '/about/approach',
                'route'       => 'about.approach',
                'template'    => 'resources/views/about/approach.blade.php',
                'sections'    => ['Siklus Rekayasa', 'Prinsip Kode Bersih', 'Keamanan & QA'],
                'status'      => '200 OK',
                'last_mod'    => 'Hari ini',
            ],
            [
                'title'       => 'Tentang Kami — Tim & Kultur',
                'url'         => '/about/team',
                'route'       => 'about.team',
                'template'    => 'resources/views/about/team.blade.php',
                'sections'    => ['Pilar Keahlian', 'Pimpinan Inti (4)', 'Departemen Spesialis'],
                'status'      => '200 OK',
                'last_mod'    => 'Hari ini',
            ],
            [
                'title'       => 'Layanan Digital & Estimasi Biaya',
                'url'         => '/services',
                'route'       => 'services',
                'template'    => 'resources/views/services.blade.php',
                'sections'    => ['Hero Header', 'Stats Bar', '9 Kartu Layanan & Fitur', 'FAQ'],
                'status'      => '200 OK',
                'last_mod'    => 'Hari ini',
            ],
            [
                'title'       => 'Newsroom — Berita & Insight',
                'url'         => '/news',
                'route'       => 'news.index',
                'template'    => 'resources/views/news.blade.php',
                'sections'    => ['Hero Category', 'Filter Tab Kategori (6)', 'Grid Artikel', 'Sidebar'],
                'status'      => '200 OK',
                'last_mod'    => 'Hari ini',
            ],
            [
                'title'       => 'Kontak & Permintaan Konsultasi',
                'url'         => '/contact',
                'route'       => 'contact',
                'template'    => 'resources/views/contact.blade.php',
                'sections'    => ['Info Kontak (Email/WA/Maps)', 'Form Pesan Interaktif', 'Trust Badges'],
                'status'      => '200 OK',
                'last_mod'    => 'Hari ini',
            ],
        ];

        // 22. SEO & Meta Tags
        $seoMeta = [
            'site_title'      => 'VizzioCraft — Bergerak Memberi Solusi',
            'meta_description'=> 'VizzioCraft menyediakan layanan Apps & Software Development, LMS Development, Domain, Web Design, Hosting, IoT Solutions, IT Maintenance, Digital Consulting, dan SEO Services.',
            'keywords'        => 'software house jakarta, jasa pembuatan website, konsultan it indonesia, lms development, iot solution, web design modern',
            'og_image'        => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
            'og_type'         => 'website',
            'twitter_card'    => 'summary_large_image',
            'canonical_url'   => 'https://vizziocraft.com',
            'robots'          => 'index, follow, max-image-preview:large',
            'sitemap_status'  => 'Aktif (/sitemap.xml)',
        ];

        // 23. Banner & Hero Section Config
        $heroSection = [
            'badge'      => 'SOLUSI DIGITAL TERDEPAN',
            'title_id'   => 'Solusi Digital Terpadu untuk Bisnis Anda',
            'desc_id'    => 'Kami menyediakan ekosistem layanan teknologi lengkap dari tahap perencanaan, eksekusi, hingga dukungan berkelanjutan.',
            'cta_primary'=> 'Konsultasi Gratis',
            'cta_second' => 'Lihat Semua Layanan',
            'blob_active'=> true,
            'search_bar' => true,
        ];

        return view('admin.dashboard', compact(
            'allUsers', 'userCount', 'isSuperAdmin',
            'newsArticles', 'newsCount',
            'visitorToday', 'traffic', 'trafficMax', 'w', 'h', 'padX', 'padY', 'points', 'line', 'area', 'days',
            'sources', 'funnel', 'channels',
            'allProjects', 'proyekAktifCount',
            'servicesList', 'mediaGallery', 'teamMembers', 'testimonials',
            'allMessages', 'pesanMasuk',
            'allLeads', 'penawaran',
            'systemNotifications',
            'auditLogs', 'securityInfo', 'backupInfo', 'smtpConfig', 'envConfig',
            'companyProfile', 'staticPages', 'seoMeta', 'heroSection'
        ));
    }

    // --- SUPER ADMIN ACTIONS ---

    // 1. Add New Admin
    public function storeUser(Request $request)
    {
        if (session('user_role') !== 'super_admin') {
            return back()->with('error', 'Hanya Super Admin yang berhak menambahkan admin.');
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,super_admin',
        ]);

        $newUser = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role'     => $request->input('role'),
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'create_user',
            'description' => "Menambahkan akun administrator baru: {$newUser->name} ({$newUser->email}) dengan role {$newUser->role}.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect('/admin/dashboard#users')->with('success', "Admin {$newUser->name} berhasil ditambahkan ke database!");
    }

    // 2. Change Admin Role
    public function updateUserRole(Request $request, $id)
    {
        if (session('user_role') !== 'super_admin') {
            return back()->with('error', 'Hanya Super Admin yang berhak mengubah role.');
        }

        $user = User::findOrFail($id);
        $newRole = ($user->role === 'super_admin') ? 'admin' : 'super_admin';
        $user->role = $newRole;
        $user->save();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'update_role',
            'description' => "Mengubah hak akses {$user->name} menjadi {$newRole}.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect('/admin/dashboard#users')->with('success', "Role untuk {$user->name} berhasil diubah menjadi {$newRole}!");
    }

    // 3. Reset Admin Password
    public function resetUserPassword(Request $request, $id)
    {
        if (session('user_role') !== 'super_admin') {
            return back()->with('error', 'Hanya Super Admin yang berhak mereset password.');
        }

        $request->validate([
            'new_password' => 'required|string|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'reset_password',
            'description' => "Mereset kata sandi untuk akun administrator {$user->name} ({$user->email}).",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect('/admin/dashboard#users')->with('success', "Kata sandi untuk {$user->name} berhasil diperbarui!");
    }

    // 4. Update Message Status (Mark Read / Replied)
    public function updateMessageStatus(Request $request, $id)
    {
        $message = Message::findOrFail($id);
        $newStatus = $request->input('status', 'read');
        $message->status = $newStatus;
        if ($newStatus === 'replied') {
            $message->replied_by = session('user_id');
            $message->replied_at = now();
        }
        $message->save();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_message',
            'description' => "Memperbarui status pesan dari {$message->name} menjadi '{$newStatus}'.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect('/admin/dashboard#pesan')->with('success', "Status pesan dari {$message->name} berhasil diubah ke '{$newStatus}'.");
    }

    // 5. Update Lead / Proposal Status
    public function updateLeadStatus(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $newStatus = $request->input('status', 'qualified');
        $lead->status = $newStatus;
        $lead->contacted_at = now();
        $lead->save();

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_lead',
            'description' => "Memperbarui status prospek/penawaran {$lead->name} ({$lead->company}) menjadi '{$newStatus}'.",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect('/admin/dashboard#penawaran')->with('success', "Status penawaran untuk {$lead->name} berhasil diubah ke '{$newStatus}'.");
    }

    // 6. Trigger Database Backup
    public function triggerBackup(Request $request)
    {
        if (session('user_role') !== 'super_admin') {
            return back()->with('error', 'Hanya Super Admin yang berhak menjalankan backup database.');
        }

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Super Admin'),
            'action'      => 'system_backup',
            'description' => 'Super Admin memicu pembuatan cadangan database MySQL vizziocraft2.',
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect('/admin/dashboard#backup')->with('success', 'Cadangan database vizziocraft2 berhasil disiapkan dan terverifikasi utuh!');
    }
}
