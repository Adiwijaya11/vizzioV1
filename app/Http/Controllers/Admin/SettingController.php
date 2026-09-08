<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    private function getSettings()
    {
        $path = 'settings.json';
        if (!Storage::exists($path)) {
            $default = [
                'profile' => [
                    'name'        => 'PT VizzioCraft Digital Solusindo',
                    'brand'       => 'VizzioCraft',
                    'tagline'     => 'Bergerak Memberi Solusi',
                    'vision'      => 'Menjadi agensi rekayasa teknologi dan transformasi digital terdepan di Asia Tenggara yang menghadirkan solusi berdampak nyata bagi pertumbuhan bisnis klien.',
                    'mission'     => 'Membangun perangkat lunak berstandar global, mengedukasi talenta digital Indonesia, dan mendampingi transformasi teknologi dengan transparansi dan integritas tanpa kompromi.',
                    'address'     => 'Cyber 2 Tower Lt. 18, Jl. H.R. Rasuna Said Blok X-5, Kuningan, Jakarta Selatan 12950',
                    'maps_url'    => 'https://maps.google.com/?q=Jakarta',
                    'phone'       => '+62 831-1459-2416',
                    'email'       => 'hello@vizziocraft.com',
                    'support'     => 'support@vizziocraft.com',
                    'founded'     => '2021',
                    'operating_hours' => 'Senin - Jumat: 08:30 - 17:30 WIB',
                    'socials'     => [
                        'linkedin'  => 'https://linkedin.com/company/vizziocraft',
                        'github'    => 'https://github.com/vizziocraft',
                        'twitter'   => 'https://twitter.com/vizziocraft',
                        'instagram' => 'https://instagram.com/vizziocraft',
                        'youtube'   => 'https://youtube.com/@vizziocraft',
                    ],
                ],
                'seo' => [
                    'site_title'      => 'VizzioCraft — Bergerak Memberi Solusi',
                    'title_separator' => '|',
                    'meta_description'=> 'VizzioCraft menyediakan layanan rekayasa perangkat lunak enterprise, Apps & Software Development, LMS Development, Cloud & Domain Hosting, IoT Solutions, IT Maintenance, serta Digital Strategy Consulting.',
                    'keywords'        => 'software house jakarta, jasa pembuatan website, konsultan it indonesia, lms development, iot solution, web design modern, digital agency jakarta',
                    'og_image'        => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
                    'canonical_url'   => 'https://vizziocraft.com',
                    'robots'          => 'index, follow, max-image-preview:large',
                    'google_analytics'=> 'G-VZZCRFT2026',
                    'google_search_console' => 'google-site-verification=vzz_token_demo_98273',
                    'sitemap_status'  => 'Aktif (/sitemap.xml)',
                ],
                'banner' => [
                    'badge'           => 'SOLUSI DIGITAL TERDEPAN',
                    'title_id'        => 'Solusi Digital Terpadu untuk Bisnis Anda',
                    'desc_id'         => 'Kami menyediakan ekosistem layanan teknologi lengkap dari tahap perencanaan, eksekusi rekayasa perangkat lunak, hingga dukungan operasional berkelanjutan.',
                    'cta_primary'     => 'Konsultasi Gratis',
                    'cta_primary_url' => '/contact',
                    'cta_second'      => 'Lihat Semua Layanan',
                    'cta_second_url'  => '/services',
                    'blob_active'     => true,
                    'search_bar'      => true,
                    'gradient_style'  => 'blue-cyan',
                ],
                'pages' => [
                    [
                        'id'          => 1,
                        'title'       => 'Beranda Utama (Landing Page)',
                        'slug'        => '/',
                        'url'         => '/',
                        'template'    => 'resources/views/welcome.blade.php',
                        'meta_title'  => 'VizzioCraft — Bergerak Memberi Solusi',
                        'meta_desc'   => 'Solusi digital terpadu untuk bisnis Anda.',
                        'sections'    => ['Hero Blob', 'Katalog Layanan (9)', 'Berita Terbaru (8)', 'Kontak CTA'],
                        'status'      => 'published',
                        'last_update' => '08 Sep 2026',
                    ],
                    [
                        'id'          => 2,
                        'title'       => 'Tentang Kami — Profil Perusahaan',
                        'slug'        => 'about/company',
                        'url'         => '/about/company',
                        'template'    => 'resources/views/about/company.blade.php',
                        'meta_title'  => 'Profil Perusahaan — VizzioCraft',
                        'meta_desc'   => 'Mengenal visi, misi, dan perjalanan VizzioCraft.',
                        'sections'    => ['Hero Header', 'Visi & Misi', 'Nilai Inti Organisasi', 'Milestone Perjalanan'],
                        'status'      => 'published',
                        'last_update' => '08 Sep 2026',
                    ],
                    [
                        'id'          => 3,
                        'title'       => 'Tentang Kami — Pendekatan Rekayasa',
                        'slug'        => 'about/approach',
                        'url'         => '/about/approach',
                        'template'    => 'resources/views/about/approach.blade.php',
                        'meta_title'  => 'Pendekatan Rekayasa — VizzioCraft',
                        'meta_desc'   => 'Standar arsitektur dan siklus rekayasa perangkat lunak.',
                        'sections'    => ['Siklus Rekayasa', 'Prinsip Kode Bersih', 'Keamanan & QA'],
                        'status'      => 'published',
                        'last_update' => '08 Sep 2026',
                    ],
                    [
                        'id'          => 4,
                        'title'       => 'Tentang Kami — Tim & Kultur',
                        'slug'        => 'about/team',
                        'url'         => '/about/team',
                        'template'    => 'resources/views/about/team.blade.php',
                        'meta_title'  => 'Tim & Kultur — VizzioCraft',
                        'meta_desc'   => 'Jajaran kepemimpinan dan kultur tim VizzioCraft.',
                        'sections'    => ['Pilar Keahlian', 'Pimpinan Inti', 'Departemen Spesialis'],
                        'status'      => 'published',
                        'last_update' => '08 Sep 2026',
                    ],
                    [
                        'id'          => 5,
                        'title'       => 'Layanan Digital & Estimasi Biaya',
                        'slug'        => 'services',
                        'url'         => '/services',
                        'template'    => 'resources/views/services.blade.php',
                        'meta_title'  => 'Katalog Layanan Digital — VizzioCraft',
                        'meta_desc'   => 'Katalog lengkap 9 layanan rekayasa IT dan estimasi harga.',
                        'sections'    => ['Hero Header', 'Stats Bar', '9 Kartu Layanan', 'FAQ'],
                        'status'      => 'published',
                        'last_update' => '08 Sep 2026',
                    ],
                    [
                        'id'          => 6,
                        'title'       => 'Newsroom — Berita & Insight',
                        'slug'        => 'news',
                        'url'         => '/news',
                        'template'    => 'resources/views/news.blade.php',
                        'meta_title'  => 'Newsroom & Insight — VizzioCraft',
                        'meta_desc'   => 'Wawasan industri, arsitektur cloud, dan panduan IT.',
                        'sections'    => ['Hero Category', 'Filter Tab Kategori', 'Grid Artikel'],
                        'status'      => 'published',
                        'last_update' => '08 Sep 2026',
                    ],
                    [
                        'id'          => 7,
                        'title'       => 'Kontak & Konsultasi Proyek',
                        'slug'        => 'contact',
                        'url'         => '/contact',
                        'template'    => 'resources/views/contact.blade.php',
                        'meta_title'  => 'Hubungi Kami — VizzioCraft',
                        'meta_desc'   => 'Konsultasikan kebutuhan software dan penawaran proyek Anda.',
                        'sections'    => ['Info Kontak', 'Form Pesan Interaktif', 'Trust Badges'],
                        'status'      => 'published',
                        'last_update' => '08 Sep 2026',
                    ],
                    [
                        'id'          => 8,
                        'title'       => 'Kebijakan Privasi (Privacy Policy)',
                        'slug'        => 'privacy-policy',
                        'url'         => '/privacy-policy',
                        'template'    => 'resources/views/pages/privacy.blade.php',
                        'meta_title'  => 'Kebijakan Privasi — VizzioCraft',
                        'meta_desc'   => 'Kebijakan privasi perlindungan data pengguna VizzioCraft.',
                        'sections'    => ['Kebijakan Data', 'Penyimpanan Cookie', 'Hak Pengguna'],
                        'status'      => 'draft',
                        'last_update' => '08 Sep 2026',
                    ],
                ]
            ];
            Storage::put($path, json_encode($default, JSON_PRETTY_PRINT));
            return $default;
        }

        $data = json_decode(Storage::get($path), true);
        return is_array($data) ? $data : [];
    }

    private function saveSettings(array $settings)
    {
        Storage::put('settings.json', json_encode($settings, JSON_PRETTY_PRINT));
    }

    // 1. Profil Perusahaan
    public function profile()
    {
        $settings = $this->getSettings();
        $profile = $settings['profile'] ?? [];
        return view('admin.settings.profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'brand'           => 'required|string|max:255',
            'tagline'         => 'nullable|string|max:255',
            'vision'          => 'nullable|string',
            'mission'         => 'nullable|string',
            'address'         => 'nullable|string',
            'maps_url'        => 'nullable|url',
            'phone'           => 'required|string|max:100',
            'email'           => 'required|email',
            'support'         => 'nullable|email',
            'operating_hours' => 'nullable|string|max:255',
            'social_linkedin' => 'nullable|url',
            'social_github'   => 'nullable|url',
            'social_twitter'  => 'nullable|url',
            'social_instagram'=> 'nullable|url',
            'social_youtube'  => 'nullable|url',
        ]);

        $settings = $this->getSettings();
        $settings['profile'] = [
            'name'            => $validated['name'],
            'brand'           => $validated['brand'],
            'tagline'         => $validated['tagline'] ?? '',
            'vision'          => $validated['vision'] ?? '',
            'mission'         => $validated['mission'] ?? '',
            'address'         => $validated['address'] ?? '',
            'maps_url'        => $validated['maps_url'] ?? '',
            'phone'           => $validated['phone'],
            'email'           => $validated['email'],
            'support'         => $validated['support'] ?? $validated['email'],
            'founded'         => '2021',
            'operating_hours' => $validated['operating_hours'] ?? 'Senin - Jumat: 08:30 - 17:30 WIB',
            'socials'         => [
                'linkedin'  => $validated['social_linkedin'] ?? '',
                'github'    => $validated['social_github'] ?? '',
                'twitter'   => $validated['social_twitter'] ?? '',
                'instagram' => $validated['social_instagram'] ?? '',
                'youtube'   => $validated['social_youtube'] ?? '',
            ],
        ];
        $this->saveSettings($settings);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_profile',
            'description' => "Memperbarui data profil resmi perusahaan: '{$validated['name']}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->back()->with('success', 'Profil resmi perusahaan berhasil diperbarui dan tersimpan permanen!');
    }

    // 2. Halaman Statis
    public function pages()
    {
        $settings = $this->getSettings();
        $pages = $settings['pages'] ?? [];
        return view('admin.settings.pages', compact('pages'));
    }

    public function updatePage(Request $request, $id)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'meta_title'  => 'nullable|string|max:255',
            'meta_desc'   => 'nullable|string',
            'status'      => 'required|in:published,draft',
        ]);

        $settings = $this->getSettings();
        if (isset($settings['pages'])) {
            foreach ($settings['pages'] as &$p) {
                if ((int) $p['id'] === (int) $id) {
                    $p['title']       = $validated['title'];
                    $p['meta_title']  = $validated['meta_title'] ?? $validated['title'];
                    $p['meta_desc']   = $validated['meta_desc'] ?? '';
                    $p['status']      = $validated['status'];
                    $p['last_update'] = now()->format('d M Y');
                    break;
                }
            }
            $this->saveSettings($settings);
        }

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_static_page',
            'description' => "Memperbarui konfigurasi halaman statis: '{$validated['title']}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->back()->with('success', "Konfigurasi halaman '{$validated['title']}' berhasil disimpan!");
    }

    // 3. SEO & Meta Tag
    public function seo()
    {
        $settings = $this->getSettings();
        $seoMeta = $settings['seo'] ?? [];
        return view('admin.settings.seo', compact('seoMeta'));
    }

    public function updateSeo(Request $request)
    {
        $validated = $request->validate([
            'site_title'             => 'required|string|max:255',
            'title_separator'        => 'required|string|max:10',
            'meta_description'       => 'required|string|max:500',
            'keywords'               => 'nullable|string',
            'og_image'               => 'nullable|url',
            'robots'                 => 'required|string|max:100',
            'canonical_url'          => 'required|url',
            'google_analytics'       => 'nullable|string|max:50',
            'google_search_console'  => 'nullable|string|max:255',
        ]);

        $settings = $this->getSettings();
        $settings['seo'] = [
            'site_title'             => $validated['site_title'],
            'title_separator'        => $validated['title_separator'],
            'meta_description'       => $validated['meta_description'],
            'keywords'               => $validated['keywords'] ?? '',
            'og_image'               => $validated['og_image'] ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
            'robots'                 => $validated['robots'],
            'canonical_url'          => $validated['canonical_url'],
            'google_analytics'       => $validated['google_analytics'] ?? '',
            'google_search_console'  => $validated['google_search_console'] ?? '',
            'sitemap_status'         => 'Aktif (/sitemap.xml)',
        ];
        $this->saveSettings($settings);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_seo',
            'description' => "Memperbarui konfigurasi SEO & Meta tags: '{$validated['site_title']}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->back()->with('success', 'Konfigurasi SEO & OpenGraph berhasil diperbarui!');
    }

    // 4. Banner & Hero Section
    public function banner()
    {
        $settings = $this->getSettings();
        $heroSection = $settings['banner'] ?? [];
        return view('admin.settings.banner', compact('heroSection'));
    }

    public function updateBanner(Request $request)
    {
        $validated = $request->validate([
            'badge'           => 'required|string|max:100',
            'title_id'        => 'required|string|max:255',
            'desc_id'         => 'required|string',
            'cta_primary'     => 'required|string|max:100',
            'cta_primary_url' => 'required|string|max:255',
            'cta_second'      => 'required|string|max:100',
            'cta_second_url'  => 'required|string|max:255',
            'gradient_style'  => 'required|string',
        ]);

        $settings = $this->getSettings();
        $settings['banner'] = [
            'badge'           => $validated['badge'],
            'title_id'        => $validated['title_id'],
            'desc_id'         => $validated['desc_id'],
            'cta_primary'     => $validated['cta_primary'],
            'cta_primary_url' => $validated['cta_primary_url'],
            'cta_second'      => $validated['cta_second'],
            'cta_second_url'  => $validated['cta_second_url'],
            'blob_active'     => $request->boolean('blob_active'),
            'search_bar'      => $request->boolean('search_bar'),
            'gradient_style'  => $validated['gradient_style'],
        ];
        $this->saveSettings($settings);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'update_banner',
            'description' => "Memperbarui konfigurasi banner beranda: '{$validated['title_id']}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->back()->with('success', 'Pengaturan Hero Banner & bilah interaktif berhasil diperbarui!');
    }

    // 5. Email & SMTP (Super Admin)
    public function email()
    {
        if (session('user_role') !== 'super_admin') {
            abort(403, 'Halaman ini khusus untuk Super Admin.');
        }

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

        return view('admin.settings.email', compact('smtpConfig'));
    }

    // 6. System Info (Super Admin)
    public function system()
    {
        if (session('user_role') !== 'super_admin') {
            abort(403, 'Halaman ini khusus untuk Super Admin.');
        }

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

        return view('admin.settings.system', compact('envConfig'));
    }
}
