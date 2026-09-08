<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Lead;
use App\Models\Message;
use App\Models\Project;
use App\Models\VisitorLog;
use App\Models\AuditLog;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\NewsArticle;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Super Admin & Admin Users
        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@vizziocraft.com'],
            [
                'name'     => 'Super Admin VizzioCraft',
                'password' => Hash::make('superadmin123'),
                'role'     => 'super_admin',
            ]
        );

        $admin = User::updateOrCreate(
            ['email' => 'admin@vizziocraft.com'],
            [
                'name'     => 'Admin VizzioCraft',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // 2. Real Projects Matching VizzioCraft Services
        $projects = [
            [
                'name'        => 'Enterprise Resource Planning (ERP) — PT Logistik Nusantara',
                'slug'        => 'erp-logistik-nusantara',
                'description' => 'Sistem kustom ERP terintegrasi armada transportasi, pergudangan, dan keuangan otomatis.',
                'client'      => 'PT Logistik Nusantara',
                'status'      => 'active',
                'start_date'  => '2026-06-01',
                'end_date'    => '2026-11-30',
                'budget'      => 185000000.00,
                'manager_id'  => $superAdmin->id,
            ],
            [
                'name'        => 'Corporate LMS & Interactive Training — Bank Finansia Mandiri',
                'slug'        => 'lms-bank-finansia',
                'description' => 'Platform Learning Management System untuk 3.000+ karyawan dengan sertifikasi otomatis dan quiz interaktif.',
                'client'      => 'Bank Finansia Mandiri',
                'status'      => 'active',
                'start_date'  => '2026-07-15',
                'end_date'    => '2026-12-15',
                'budget'      => 140000000.00,
                'manager_id'  => $admin->id,
            ],
            [
                'name'        => 'Smart IoT Cold-Chain Monitoring — PT Agro Makmur',
                'slug'        => 'iot-agro-makmur',
                'description' => 'Telemetri IoT suhu kontainer secara realtime dengan peringatan SMS & Webhook darurat.',
                'client'      => 'PT Agro Makmur Abadi',
                'status'      => 'completed',
                'start_date'  => '2026-03-01',
                'end_date'    => '2026-08-20',
                'budget'      => 95000000.00,
                'manager_id'  => $superAdmin->id,
            ],
            [
                'name'        => 'Customer Portal & UI/UX Redesign — Sentosa Global',
                'slug'        => 'portal-sentosa-global',
                'description' => 'Redesain website korporat dan portal klien berkecepatan tinggi dengan skor Core Web Vitals 98/100.',
                'client'      => 'PT Sentosa Global Investama',
                'status'      => 'completed',
                'start_date'  => '2026-04-10',
                'end_date'    => '2026-07-30',
                'budget'      => 75000000.00,
                'manager_id'  => $admin->id,
            ],
            [
                'name'        => 'Mobile Health & Clinic Electronic Records — Klinik Sehat',
                'slug'        => 'emr-klinik-sehat',
                'description' => 'Aplikasi reservasi online dokter & rekam medis elektronik terenkripsi standar BPJS & Kemenkes.',
                'client'      => 'Klinik Utama Sehat Sejahtera',
                'status'      => 'planning',
                'start_date'  => '2026-09-15',
                'end_date'    => '2027-01-30',
                'budget'      => 110000000.00,
                'manager_id'  => $superAdmin->id,
            ],
        ];

        foreach ($projects as $p) {
            Project::updateOrCreate(['slug' => $p['slug']], $p);
        }

        // 3. Real Messages (12 incoming messages)
        $messages = [
            [
                'name'       => 'Hendra Gunawan',
                'email'      => 'hendra@nusantaragroup.co.id',
                'subject'    => 'Pertanyaan Pengembangan Custom Web ERP & Integrasi API',
                'message'    => 'Selamat siang VizzioCraft. Perusahaan kami membutuhkan sistem ERP kustom untuk menyatukan 4 anak perusahaan kami di Jabodetabek. Mohon jadwal konsultasi daring.',
                'status'     => 'unread',
                'created_at' => now()->subHours(2),
            ],
            [
                'name'       => 'Amanda Putri',
                'email'      => 'amanda.putri@edukreasindo.com',
                'subject'    => 'Konsultasi Implementasi LMS untuk 1.500 Peserta Pelatihan',
                'message'    => 'Halo tim, kami tertarik dengan layanan LMS Development VizzioCraft. Apakah mendukung video streaming tanpa buffering dan integrasi Zoom API?',
                'status'     => 'unread',
                'created_at' => now()->subHours(5),
            ],
            [
                'name'       => 'Budi Santoso',
                'email'      => 'budi.s@primakarya.id',
                'subject'    => 'Permintaan Audit Keamanan dan Migrasi Cloud Hosting',
                'message'    => 'Kami ingin memigrasikan dedicated server kami ke arsitektur cloud AWS/Google Cloud dengan konfigurasi redundansi dan backup otomatis.',
                'status'     => 'unread',
                'created_at' => now()->subHours(9),
            ],
            [
                'name'       => 'Clarissa Megan',
                'email'      => 'clarissa@boutiquestyle.co.id',
                'subject'    => 'Redesign Website E-Commerce & Optimasi SEO Mesin Pencari',
                'message'    => 'Halo, kami ingin memperbarui visual website ritel kami agar lebih responsif, elegan, dan menempati ranking 1 Google untuk kata kunci fashion.',
                'status'     => 'unread',
                'created_at' => now()->subDay(),
            ],
            [
                'name'       => 'Dr. Farhan Wicaksono',
                'email'      => 'farhan@kliniksehat.org',
                'subject'    => 'Pengembangan Aplikasi Antrean & Rekam Medis Digital',
                'message'    => 'Apakah tim VizzioCraft berpengalaman mengintegrasikan sistem dengan SatuSehat Kemenkes? Kami butuh implementasi dalam 3 bulan ke depan.',
                'status'     => 'unread',
                'created_at' => now()->subDays(2),
            ],
            [
                'name'       => 'Rahmat Hidayat',
                'email'      => 'rahmat@translogistik.com',
                'subject'    => 'Integrasi IoT Tracking Armada dengan Web Dashboard',
                'message'    => 'Kami memiliki 45 armada truk logistik dan membutuhkan dashboard pemantauan GPS, sensor suhu kargo, dan konsumsi BBM.',
                'status'     => 'unread',
                'created_at' => now()->subDays(3),
            ],
            [
                'name'       => 'Jessica Tan',
                'email'      => 'jessica@tancorp.sg',
                'subject'    => 'Inquiry on Corporate Website Redesign & Multilingual SEO',
                'message'    => 'We are looking for a reliable software agency in Indonesia to revamp our corporate portal with multi-language support (EN/ID/ZH).',
                'status'     => 'unread',
                'created_at' => now()->subDays(3)->addHours(4),
            ],
            [
                'name'       => 'Irwan Setiawan',
                'email'      => 'irwan@bprartha.co.id',
                'subject'    => 'Konsultasi SLA IT Maintenance & Monitoring Server 24/7',
                'message'    => 'Kami membutuhkan mitra IT Maintenance bergaransi SLA 99.9% uptime untuk memelihara server perbankan dan security patching berkala.',
                'status'     => 'unread',
                'created_at' => now()->subDays(4),
            ],
            [
                'name'       => 'Maya Indah',
                'email'      => 'maya@balitravel.co.id',
                'subject'    => 'Pembuatan Platform Reservasi Online & Payment Gateway',
                'message'    => 'Mohon proposal penawaran untuk sistem reservasi tur dan paket perjalanan wisata yang terintegrasi dengan Midtrans dan Xendit.',
                'status'     => 'unread',
                'created_at' => now()->subDays(4)->addHours(8),
            ],
            [
                'name'       => 'Dimas Prasetyo',
                'email'      => 'dimas@startupnow.id',
                'subject'    => 'Estimasi Biaya Pengembangan MVP Aplikasi Mobile iOS & Android',
                'message'    => 'Halo tim, kami adalah startup fintech tahap awal yang ingin membuat prototype dan MVP Flutter dalam 8 minggu.',
                'status'     => 'unread',
                'created_at' => now()->subDays(5),
            ],
            [
                'name'       => 'Anita Wijaya',
                'email'      => 'anita.w@cemerlang.com',
                'subject'    => 'Penawaran Kerjasama Maintenance Sistem Tahunan',
                'message'    => 'Kami ingin mendiskusikan kontrak tahunan pemeliharaan aplikasi e-procurement kantor kami. Mohon dikirimkan draft rate card resmi.',
                'status'     => 'unread',
                'created_at' => now()->subDays(6),
            ],
            [
                'name'       => 'Kevin Ardiansyah',
                'email'      => 'kevin@ardilogistics.com',
                'subject'    => 'Demo Sistem Monitoring Logistik VizzioCraft',
                'message'    => 'Tertarik melihat studi kasus proyek logistik yang pernah dikerjakan VizzioCraft. Bisakah diagendakan demo tatap muka di kantor kami?',
                'status'     => 'unread',
                'created_at' => now()->subDays(6)->addHours(5),
            ],
        ];

        Message::truncate();
        foreach ($messages as $msg) {
            Message::create($msg);
        }

        // 4. Real Leads / Quotations (Permintaan Penawaran)
        $leads = [
            [
                'name'         => 'Hendra Gunawan',
                'email'        => 'hendra@nusantaragroup.co.id',
                'phone'        => '081298765432',
                'company'      => 'PT Nusantara Mandiri Group',
                'message'      => 'Pengembangan platform ERP custom multi-cabang terintegrasi.',
                'status'       => 'proposal',
                'source'       => 'website',
                'assigned_to'  => $superAdmin->id,
                'contacted_at' => now()->subDay(),
                'created_at'   => now()->subDays(2),
            ],
            [
                'name'         => 'Amanda Putri',
                'email'        => 'amanda.putri@edukreasindo.com',
                'phone'        => '081387654321',
                'company'      => 'Edukreasindo Academy',
                'message'      => 'Pembuatan platform LMS Corporate dengan video streaming dan sertifikasi.',
                'status'       => 'qualified',
                'source'       => 'referral',
                'assigned_to'  => $admin->id,
                'contacted_at' => now()->subHours(6),
                'created_at'   => now()->subDays(3),
            ],
            [
                'name'         => 'Budi Santoso',
                'email'        => 'budi.s@primakarya.id',
                'phone'        => '082156789012',
                'company'      => 'PT Prima Karya Perkasa',
                'message'      => 'Migrasi arsitektur cloud server & optimasi disaster recovery.',
                'status'       => 'new',
                'source'       => 'website',
                'assigned_to'  => null,
                'contacted_at' => null,
                'created_at'   => now()->subHours(9),
            ],
            [
                'name'         => 'Irwan Setiawan',
                'email'        => 'irwan@bprartha.co.id',
                'phone'        => '081876543210',
                'company'      => 'BPR Artha Sejahtera',
                'message'      => 'Kontrak tahunan IT Maintenance & Server Monitoring 24/7 SLA 99.9%.',
                'status'       => 'won',
                'source'       => 'social',
                'assigned_to'  => $superAdmin->id,
                'contacted_at' => now()->subDays(5),
                'created_at'   => now()->subDays(7),
            ],
            [
                'name'         => 'Clarissa Megan',
                'email'        => 'clarissa@boutiquestyle.co.id',
                'phone'        => '081543219876',
                'company'      => 'PT Sentra Mode Gaya',
                'message'      => 'Redesign UI/UX website katalog dan optimasi performa SEO Google.',
                'status'       => 'proposal',
                'source'       => 'website',
                'assigned_to'  => $admin->id,
                'contacted_at' => now()->subDays(2),
                'created_at'   => now()->subDays(4),
            ],
        ];

        Lead::truncate();
        foreach ($leads as $l) {
            Lead::create($l);
        }

        // 5. Real Visitor Logs for Past 14 Days
        VisitorLog::truncate();
        $referrers = [
            'https://www.google.com/search?q=vizziocraft+software+development',
            'https://www.google.com/search?q=jasa+pembuatan+lms+jakarta',
            'https://www.linkedin.com/company/vizziocraft',
            'https://github.com/vizziocraft',
            'direct',
            'direct',
            'https://twitter.com/vizziocraft',
            'https://www.google.com/search?q=it+consulting+indonesia',
        ];

        $pages = ['/', '/services', '/about/company', '/news', '/contact', '/about/team'];

        for ($i = 13; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            // Generate realistic weekday vs weekend traffic count
            $dayOfWeek = date('N', strtotime($date));
            $baseVisits = in_array($dayOfWeek, [6, 7]) ? rand(45, 80) : rand(110, 240);

            foreach (array_slice($referrers, 0, 4) as $refIdx => $ref) {
                VisitorLog::create([
                    'ip_address'   => '182.1.' . rand(1, 254) . '.' . rand(1, 254),
                    'user_agent'   => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/128.0',
                    'url'          => $pages[array_rand($pages)],
                    'referrer'     => $ref === 'direct' ? null : $ref,
                    'visit_date'   => $date,
                    'visit_count'  => (int) round($baseVisits / 4),
                    'created_at'   => $date . ' 10:00:00',
                    'updated_at'   => $date . ' 18:00:00',
                ]);
            }
        }

        // 6. Real Audit Logs
        AuditLog::truncate();
        $auditEvents = [
            [
                'user_id'     => $superAdmin->id,
                'user_name'   => 'Super Admin VizzioCraft',
                'action'      => 'login',
                'description' => 'Super Admin berhasil login ke Control Panel melalui IP 127.0.0.1.',
                'ip_address'  => '127.0.0.1',
                'user_agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/128.0',
                'created_at'  => now()->subMinutes(15),
            ],
            [
                'user_id'     => $superAdmin->id,
                'user_name'   => 'Super Admin VizzioCraft',
                'action'      => 'system_backup',
                'description' => 'Snapshot cadangan database MySQL vizziocraft2 berhasil diekspor.',
                'ip_address'  => '127.0.0.1',
                'user_agent'  => 'Artisan CLI / Scheduler',
                'created_at'  => now()->subHours(6),
            ],
            [
                'user_id'     => $superAdmin->id,
                'user_name'   => 'Super Admin VizzioCraft',
                'action'      => 'update_lead',
                'description' => 'Memperbarui status penawaran "PT Nusantara Mandiri" ke tahap Proposal.',
                'ip_address'  => '127.0.0.1',
                'user_agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'created_at'  => now()->subDay(),
            ],
            [
                'user_id'     => $admin->id,
                'user_name'   => 'Admin VizzioCraft',
                'action'      => 'read_message',
                'description' => 'Membuka dan membaca pesan masuk dari Amanda Putri (Edukreasindo Academy).',
                'ip_address'  => '127.0.0.1',
                'user_agent'  => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'created_at'  => now()->subDays(2),
            ],
            [
                'user_id'     => $superAdmin->id,
                'user_name'   => 'Super Admin VizzioCraft',
                'action'      => 'user_verified',
                'description' => 'Verifikasi hak akses role administrator akun admin@vizziocraft.com.',
                'ip_address'  => '127.0.0.1',
                'user_agent'  => 'System Auth Guard',
                'created_at'  => now()->subDays(3),
            ],
        ];

        foreach ($auditEvents as $audit) {
            AuditLog::create($audit);
        }

        // 7. Seed Real Services
        $services = [
            [
                'title'       => 'Apps & Software Development',
                'slug'        => 'apps-software-development',
                'price'       => 'Mulai Rp 15.000.000',
                'category'    => 'Engineering',
                'description' => 'Pengembangan aplikasi custom web & mobile berbasis arsitektur modern yang scalable, aman, dan berkinerja tinggi.',
                'icon'        => 'code',
                'features'    => ['Web App & API Integration', 'Mobile App (Flutter / React Native)', 'Database Optimization & Microservices'],
                'badge'       => 'Populer',
                'status'      => 'active',
            ],
            [
                'title'       => 'LMS Development',
                'slug'        => 'lms-development',
                'price'       => 'Mulai Rp 20.000.000',
                'category'    => 'EdTech',
                'description' => 'Platform Learning Management System interaktif untuk kebutuhan pelatihan perusahaan, akademi, dan institusi pendidikan.',
                'icon'        => 'academic',
                'features'    => ['Multi-tier Role (Admin, Guru, Siswa)', 'Video Streaming & Automated Quiz', 'Sertifikat Digital Otomatis'],
                'badge'       => 'Enterprise',
                'status'      => 'active',
            ],
            [
                'title'       => 'Domain Management',
                'slug'        => 'domain',
                'price'       => 'Mulai Rp 150.000 / thn',
                'category'    => 'Infrastructure',
                'description' => 'Pendaftaran & konfigurasi nama domain bisnis (.id, .com, .co.id, .org) dengan DNS Cloudflare proteksi DDoS.',
                'icon'        => 'globe',
                'features'    => ['DNS Management & Cloudflare', 'DNSSEC & Privacy Protection', 'Auto-Renewal Guarantee'],
                'badge'       => null,
                'status'      => 'active',
            ],
            [
                'title'       => 'Web Design & UI/UX',
                'slug'        => 'web-design',
                'price'       => 'Mulai Rp 8.000.000',
                'category'    => 'Creative',
                'description' => 'Desain antarmuka website modern berestetika visual premium, responsif di seluruh perangkat, dan berkonversi tinggi.',
                'icon'        => 'layout',
                'features'    => ['Figma High-Fidelity Prototype', 'Design System & Component Library', 'Mobile-First Responsive Layout'],
                'badge'       => 'Desain Modern',
                'status'      => 'active',
            ],
            [
                'title'       => 'Hosting & Cloud Server',
                'slug'        => 'hosting',
                'price'       => 'Mulai Rp 500.000 / bln',
                'category'    => 'Infrastructure',
                'description' => 'Infrastruktur cloud hosting & VPS berkecepatan tinggi dengan jaminan proteksi data, NVMe SSD, dan 99.9% uptime SLA.',
                'icon'        => 'server',
                'features'    => ['NVMe Enterprise Storage', 'Daily Automated Cloud Backup', 'SSL Let\'s Encrypt Gratis'],
                'badge'       => '99.9% Uptime',
                'status'      => 'active',
            ],
            [
                'title'       => 'IoT Solutions',
                'slug'        => 'iot-solutions',
                'price'       => 'Mulai Rp 25.000.000',
                'category'    => 'Engineering',
                'description' => 'Integrasi sistem sensor cerdas & telemetri otomatisasi berbasis Internet of Things untuk industri, logistik, dan pertanian.',
                'icon'        => 'cpu',
                'features'    => ['Hardware Microcontroller (ESP32/Raspberry Pi)', 'MQTT & WebSocket Real-Time Protocol', 'Interactive Analytics Dashboard'],
                'badge'       => 'IoT Cerdas',
                'status'      => 'active',
            ],
            [
                'title'       => 'IT Maintenance & Support',
                'slug'        => 'it-maintenance',
                'price'       => 'Mulai Rp 3.500.000 / bln',
                'category'    => 'Support',
                'description' => 'Pemeliharaan sistem berkesinambungan, monitoring server 24/7, security patching berkala, dan penanganan bug darurat.',
                'icon'        => 'shield',
                'features'    => ['SLA Tanggap 1 Jam Kerja', 'Security Audit & Vulnerability Scanning', 'Laporan Kinerja Bulanan'],
                'badge'       => 'Garansi SLA',
                'status'      => 'active',
            ],
            [
                'title'       => 'Digital Consulting',
                'slug'        => 'digital-consulting',
                'price'       => 'Mulai Rp 10.000.000',
                'category'    => 'Strategy',
                'description' => 'Konsultasi arsitektur teknologi, audit sistem legasi, dan peta jalan transformasi digital menyeluruh untuk perusahaan.',
                'icon'        => 'lightbulb',
                'features'    => ['Tech Stack & Cloud Architecture Advisory', 'System Gap Analysis & Modernization', 'Cost Optimization Strategy'],
                'badge'       => null,
                'status'      => 'active',
            ],
            [
                'title'       => 'SEO & Search Marketing',
                'slug'        => 'seo-services',
                'price'       => 'Mulai Rp 5.000.000 / bln',
                'category'    => 'Marketing',
                'description' => 'Optimasi mesin pencari organik teknis dan konten untuk melesatkan visibilitas brand, peringkat Google, dan lead penjualan.',
                'icon'        => 'search',
                'features'    => ['Technical SEO & Core Web Vitals Audit', 'Targeted Keyword & Content Strategy', 'Backlink Building & Monthly SERP Report'],
                'badge'       => 'Peringkat 1 Google',
                'status'      => 'active',
            ],
        ];
        Service::truncate();
        foreach ($services as $srv) {
            Service::create($srv);
        }

        // 8. Seed Team Members
        $team = [
            [
                'name'   => 'Adrian Pratama',
                'role'   => 'Chief Executive Officer & Co-Founder',
                'dept'   => 'Executive',
                'bio'    => 'Memimpin visi strategis dan ekspansi kemitraan korporat dengan 8+ tahun pengalaman di bidang rekayasa teknologi.',
                'image'  => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'tag'    => 'Strategy & Growth',
                'email'  => 'adrian@vizziocraft.com',
                'status' => 'active',
            ],
            [
                'name'   => 'Reza Kurniawan',
                'role'   => 'Chief Technology Officer',
                'dept'   => 'Engineering',
                'bio'    => 'Arsitek sistem cloud & backend berkecepatan tinggi, mengawasi standar keamanan kode dan skalabilitas infrastruktur.',
                'image'  => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'tag'    => 'Cloud Architecture',
                'email'  => 'reza@vizziocraft.com',
                'status' => 'active',
            ],
            [
                'name'   => 'Sarah Wijaya',
                'role'   => 'Head of Product Design & UI/UX',
                'dept'   => 'Creative & Design',
                'bio'    => 'Pakar human-centered design yang mendedikasikan karyanya untuk merancang antarmuka elegan, modern, dan intuitif.',
                'image'  => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'tag'    => 'Design Systems',
                'email'  => 'sarah.w@vizziocraft.com',
                'status' => 'active',
            ],
            [
                'name'   => 'Dimas Aditya',
                'role'   => 'Principal Solutions Consultant',
                'dept'   => 'Consulting',
                'bio'    => 'Menjembatani tantangan bisnis klien dengan implementasi teknologi yang efisien, terukur, dan hemat biaya.',
                'image'  => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                'tag'    => 'Solutions Consulting',
                'email'  => 'dimas.a@vizziocraft.com',
                'status' => 'active',
            ],
        ];
        TeamMember::truncate();
        foreach ($team as $tm) {
            TeamMember::create($tm);
        }

        // 9. Seed Testimonials
        $testimonials = [
            [
                'name'    => 'Rudy Wicaksono',
                'title'   => 'Direktur Operasional',
                'company' => 'PT Logistik Nusantara',
                'project' => 'Enterprise ERP & Telemetri Armada',
                'rating'  => 5,
                'comment' => 'VizzioCraft berhasil mendeliver kustom ERP kami 3 minggu lebih cepat dari jadwal. Integrasi GPS dan perhitungan biaya otomatis memangkas waktu rekonsiliasi kami hingga 65%.',
                'date'    => 'Agustus 2026',
                'status'  => 'published',
            ],
            [
                'name'    => 'Mariana Kusuma',
                'title'   => 'VP of Human Capital & Academy',
                'company' => 'Bank Finansia Mandiri',
                'project' => 'Corporate LMS Platform',
                'rating'  => 5,
                'comment' => 'Platform LMS yang dibangun VizzioCraft sangat andal. Dipakai oleh ribuan karyawan serentak saat pelatihan nasional tanpa ada kendala server sama sekali.',
                'date'    => 'Juli 2026',
                'status'  => 'published',
            ],
            [
                'name'    => 'Bambang Sudiro',
                'title'   => 'Head of Supply Chain Technology',
                'company' => 'PT Agro Makmur Abadi',
                'project' => 'IoT Cold-Chain Monitoring System',
                'rating'  => 5,
                'comment' => 'Sensor IoT dan dashboard VizzioCraft memberikan visibilitas suhu kontainer secara detik demi detik. Kerusakan muatan berhasil kami tekan ke titik nol.',
                'date'    => 'Juni 2026',
                'status'  => 'published',
            ],
            [
                'name'    => 'Evelyn Pranata',
                'title'   => 'Head of Digital Marketing & Communications',
                'company' => 'PT Sentosa Global Investama',
                'project' => 'Web Redesign & SEO Growth',
                'rating'  => 5,
                'comment' => 'Tampilan website baru kami mendapat banyak pujian dari investor asing. Nilai kecepatan Google PageSpeed mencapai skor 98, dan inquiry masuk meningkat 140%.',
                'date'    => 'Mei 2026',
                'status'  => 'published',
            ],
        ];
        Testimonial::truncate();
        foreach ($testimonials as $testi) {
            Testimonial::create($testi);
        }

        // 10. Seed News Articles from resources/data/news.php
        $newsArticlesData = [];
        $newsPath = base_path('resources/data/news.php');
        if (file_exists($newsPath)) {
            $newsArticlesData = include $newsPath;
        }
        NewsArticle::truncate();
        if (is_array($newsArticlesData)) {
            foreach ($newsArticlesData as $art) {
                NewsArticle::create([
                    'slug'              => $art['slug'],
                    'category'          => $art['category'] ?? 'tech',
                    'category_label_id' => $art['category_label']['id'] ?? 'Teknologi',
                    'category_label_en' => $art['category_label']['en'] ?? 'Tech',
                    'title_id'          => $art['title']['id'] ?? $art['slug'],
                    'title_en'          => $art['title']['en'] ?? null,
                    'desc_id'           => $art['desc']['id'] ?? null,
                    'desc_en'           => $art['desc']['en'] ?? null,
                    'content_id'        => $art['content']['id'] ?? ($art['desc']['id'] ?? null),
                    'content_en'        => $art['content']['en'] ?? null,
                    'image'             => $art['image'] ?? null,
                    'icon'              => $art['icon'] ?? 'cpu',
                    'views'             => (int) filter_var($art['views'] ?? 100, FILTER_SANITIZE_NUMBER_INT) ?: 250,
                    'published_at'      => now()->subDays(rand(1, 30)),
                    'status'            => 'published',
                ]);
            }
        }
    }
}

