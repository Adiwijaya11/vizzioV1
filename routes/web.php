<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\SecurityController;
use App\Http\Controllers\Admin\BackupController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

$getNewsCategoryData = function ($categoryKey = 'all') {
    $categoryDetails = [
        'all' => [
            'key'        => 'all',
            'slug'       => 'semua',
            'label'      => ['id' => 'Semua', 'en' => 'All'],
            'badge'      => ['id' => 'VizzioCraft Newsroom', 'en' => 'VizzioCraft Newsroom'],
            'title'      => ['id' => 'Berita & <span class="text-sky-300">Insight</span> Terkini', 'en' => 'Latest <span class="text-sky-300">News</span> & Insights'],
            'desc'       => ['id' => 'Ikuti perkembangan terbaru seputar teknologi, proyek, dan inovasi digital dari tim VizzioCraft.', 'en' => 'Follow the latest developments in technology, projects, and digital innovation from the VizzioCraft team.'],
            'meta_title' => 'Berita & Insight — VizzioCraft',
            'meta_desc'  => 'Berita terbaru, insight teknologi, update proyek, dan artikel praktis dari VizzioCraft.',
            'icon'       => 'grid',
            'accent'     => 'from-primary-deep via-primary to-[#1E40AF]',
        ],
        'company' => [
            'key'        => 'company',
            'slug'       => 'perusahaan',
            'label'      => ['id' => 'Perusahaan', 'en' => 'Company'],
            'badge'      => ['id' => 'KATEGORI • PERUSAHAAN', 'en' => 'CATEGORY • COMPANY'],
            'title'      => ['id' => 'Kabar & <span class="text-sky-300">Perkembangan</span> Resmi Perusahaan', 'en' => 'Official Company <span class="text-sky-300">News</span> & Milestones'],
            'desc'       => ['id' => 'Pengumuman resmi, kemitraan strategis, pencapaian milestone bisnis, dan kultur kerja tim VizzioCraft.', 'en' => 'Official announcements, strategic partnerships, business milestones, and VizzioCraft team culture.'],
            'meta_title' => 'Kabar Perusahaan — Berita VizzioCraft',
            'meta_desc'  => 'Update resmi mengenai perkembangan perusahaan, pencapaian milestone, dan budaya kerja VizzioCraft.',
            'icon'       => 'building',
            'accent'     => 'from-primary-deep via-primary to-[#1E40AF]',
        ],
        'project' => [
            'key'        => 'project',
            'slug'       => 'proyek',
            'label'      => ['id' => 'Proyek', 'en' => 'Project'],
            'badge'      => ['id' => 'KATEGORI • PROYEK & STUDI KASUS', 'en' => 'CATEGORY • PROJECTS & CASE STUDIES'],
            'title'      => ['id' => 'Rilis Proyek & <span class="text-sky-300">Studi Kasus</span> Rekayasa Digital', 'en' => 'Project Releases & Engineering <span class="text-sky-300">Case Studies</span>'],
            'desc'       => ['id' => 'Studi kasus mendalam mengenai transformasi digital, pengembangan platform enterprise, dan solusi klien nyata.', 'en' => 'In-depth case studies on digital transformation, enterprise platform development, and real-world client solutions.'],
            'meta_title' => 'Rilis Proyek & Studi Kasus — Berita VizzioCraft',
            'meta_desc'  => 'Kumpulan studi kasus proyek rekayasa software dan platform digital yang dibangun oleh VizzioCraft.',
            'icon'       => 'folder',
            'accent'     => 'from-primary-deep via-primary to-[#1E40AF]',
        ],
        'event' => [
            'key'        => 'event',
            'slug'       => 'event',
            'label'      => ['id' => 'Event', 'en' => 'Event'],
            'badge'      => ['id' => 'KATEGORI • EVENT & WORKSHOP', 'en' => 'CATEGORY • EVENTS & WORKSHOPS'],
            'title'      => ['id' => 'Agenda Event, <span class="text-sky-300">Seminar</span> & Workshop Teknologi', 'en' => 'Events, Seminars & Tech <span class="text-sky-300">Workshops</span> Schedule'],
            'desc'       => ['id' => 'Ikuti jadwal seminar interaktif, workshop rekayasa software, meetup komunitas pengembang, dan konferensi VizzioCraft.', 'en' => 'Explore schedules for interactive seminars, software engineering workshops, developer meetups, and VizzioCraft conferences.'],
            'meta_title' => 'Event & Workshop — Berita VizzioCraft',
            'meta_desc'  => 'Jadwal seminar, workshop teknologi, dan meetup industri digital terkini bersama tim VizzioCraft.',
            'icon'       => 'calendar',
            'accent'     => 'from-primary-deep via-primary to-[#1E40AF]',
        ],
        'tech' => [
            'key'        => 'tech',
            'slug'       => 'teknologi',
            'label'      => ['id' => 'Teknologi', 'en' => 'Tech'],
            'badge'      => ['id' => 'KATEGORI • TEKNOLOGI & INOVASI', 'en' => 'CATEGORY • TECH & INNOVATION'],
            'title'      => ['id' => 'Inovasi Teknologi, <span class="text-sky-300">Cloud</span> & Kecerdasan Buatan', 'en' => 'Tech Innovation, <span class="text-sky-300">Cloud</span> & Artificial Intelligence'],
            'desc'       => ['id' => 'Pembahasan arsitektur software modern, infrastruktur cloud berkemampuan tinggi, DevOps, dan implementasi AI bisnis.', 'en' => 'Deep-dives into modern software architecture, high-availability cloud infrastructure, DevOps, and business AI deployment.'],
            'meta_title' => 'Teknologi & Inovasi — Berita VizzioCraft',
            'meta_desc'  => 'Wawasan arsitektur cloud, kecerdasan buatan, devops, dan teknologi rekayasa web terkini dari VizzioCraft.',
            'icon'       => 'cpu',
            'accent'     => 'from-primary-deep via-primary to-[#1E40AF]',
        ],
        'tips' => [
            'key'        => 'tips',
            'slug'       => 'tips',
            'label'      => ['id' => 'Tips', 'en' => 'Tips'],
            'badge'      => ['id' => 'KATEGORI • TIPS & PANDUAN PRAKTIS', 'en' => 'CATEGORY • TIPS & PRACTICAL GUIDES'],
            'title'      => ['id' => 'Tips Taktis, <span class="text-sky-300">Best Practice</span> & Panduan Digital', 'en' => 'Tactical Tips, <span class="text-sky-300">Best Practices</span> & Digital Guides'],
            'desc'       => ['id' => 'Panduan praktis optimasi performa web, strategi SEO, standar keamanan cyber, dan peningkatan konversi bisnis digital.', 'en' => 'Actionable guides on web performance optimization, SEO strategies, cybersecurity standards, and digital conversion growth.'],
            'meta_title' => 'Tips & Panduan — Berita VizzioCraft',
            'meta_desc'  => 'Tips taktis dan panduan praktis pengembangan web, SEO, dan keamanan siber dari pakar VizzioCraft.',
            'icon'       => 'lightbulb',
            'accent'     => 'from-primary-deep via-primary to-[#1E40AF]',
        ],
        'industry' => [
            'key'        => 'industry',
            'slug'       => 'industri',
            'label'      => ['id' => 'Industri', 'en' => 'Industry'],
            'badge'      => ['id' => 'KATEGORI • ANALISIS INDUSTRI & BISNIS', 'en' => 'CATEGORY • INDUSTRY ANALYSIS & BUSINESS'],
            'title'      => ['id' => 'Analisis Industri 4.0, <span class="text-sky-300">Rantai Pasok</span> & Riset Pasar', 'en' => 'Industry 4.0 Analysis, <span class="text-sky-300">Supply Chain</span> & Market Insights'],
            'desc'       => ['id' => 'Tinjauan lanskap pasar, tren digitalisasi manufaktur, logistik, ritel, dan panduan adopsi teknologi lintas sektor.', 'en' => 'Market landscapes, digitalization trends in manufacturing, logistics, retail, and cross-sector technology adoption.'],
            'meta_title' => 'Wawasan Industri — Berita VizzioCraft',
            'meta_desc'  => 'Analisis transformasi Industri 4.0, rantai pasok cerdas, dan tren pasar digital dari VizzioCraft.',
            'icon'       => 'briefcase',
            'accent'     => 'from-primary-deep via-primary to-[#1E40AF]',
        ],
    ];

    $categoryDetail = $categoryDetails[$categoryKey] ?? $categoryDetails['all'];
    return [$categoryDetails, $categoryDetail];
};

Route::get('/news', function (Request $request) use ($getNewsCategoryData) {
    $categoryParam = $request->query('category');
    $categoryAliases = [
        'semua'      => 'all',
        'all'        => 'all',
        'perusahaan' => 'company',
        'company'    => 'company',
        'proyek'     => 'project',
        'project'    => 'project',
        'event'      => 'event',
        'events'     => 'event',
        'teknologi'  => 'tech',
        'tech'       => 'tech',
        'tips'       => 'tips',
        'industri'   => 'industry',
        'industry'   => 'industry',
    ];

    $selectedCategory = 'all';
    if ($categoryParam && isset($categoryAliases[strtolower($categoryParam)])) {
        $selectedCategory = $categoryAliases[strtolower($categoryParam)];
        if ($selectedCategory === 'event') {
            return redirect('/events');
        }
    }

    [$categoryDetails, $categoryDetail] = $getNewsCategoryData($selectedCategory);

    return view('news', compact('selectedCategory', 'categoryDetail', 'categoryDetails'));
});

Route::get('/news/category/{category}', function ($category) use ($getNewsCategoryData) {
    $categoryAliases = [
        'semua'      => 'all',
        'all'        => 'all',
        'perusahaan' => 'company',
        'company'    => 'company',
        'proyek'     => 'project',
        'project'    => 'project',
        'event'      => 'event',
        'events'     => 'event',
        'teknologi'  => 'tech',
        'tech'       => 'tech',
        'tips'       => 'tips',
        'industri'   => 'industry',
        'industry'   => 'industry',
    ];

    $slugLower = strtolower($category);
    if (!isset($categoryAliases[$slugLower])) {
        abort(404);
    }

    $selectedCategory = $categoryAliases[$slugLower];
    if ($selectedCategory === 'all') {
        return redirect('/news');
    }
    if ($selectedCategory === 'event') {
        return redirect('/events');
    }

    [$categoryDetails, $categoryDetail] = $getNewsCategoryData($selectedCategory);

    return view('news', compact('selectedCategory', 'categoryDetail', 'categoryDetails'));
});

Route::get('/news/{slug}', function ($slug) {
    // If slug matches a known category, render the category page directly
    $categoryAliases = [
        'semua'      => 'all',
        'all'        => 'all',
        'perusahaan' => 'company',
        'company'    => 'company',
        'proyek'     => 'project',
        'project'    => 'project',
        'event'      => 'event',
        'events'     => 'event',
        'teknologi'  => 'tech',
        'tech'       => 'tech',
        'tips'       => 'tips',
        'industri'   => 'industry',
        'industry'   => 'industry',
    ];

    $slugLower = strtolower($slug);
    if (isset($categoryAliases[$slugLower])) {
        $canonical = $categoryAliases[$slugLower];
        if ($canonical === 'all') {
            return redirect('/news');
        }
        $slugParam = $slugLower === $canonical ? $canonical : $slugLower;
        return redirect('/news/category/' . $slugParam);
    }

    $newsArticles = include base_path('resources/data/news.php');
    $article = collect($newsArticles)->firstWhere('slug', $slug);
    if (!$article) {
        abort(404);
    }
    // Pick related articles (same category if possible, or latest)
    $sameCategory = collect($newsArticles)
        ->where('slug', '!=', $slug)
        ->where('category', $article['category'])
        ->values();
    $others = collect($newsArticles)
        ->where('slug', '!=', $slug)
        ->where('category', '!=', $article['category'])
        ->values();
    $relatedArticles = $sameCategory->concat($others)->take(4)->all();

    // Previous and Next article navigation
    $currentIndex = collect($newsArticles)->search(fn($item) => $item['slug'] === $slug);
    $prevArticle = $currentIndex > 0 ? $newsArticles[$currentIndex - 1] : null;
    $nextArticle = $currentIndex < count($newsArticles) - 1 ? $newsArticles[$currentIndex + 1] : null;

    return view('news.show', compact('article', 'relatedArticles', 'prevArticle', 'nextArticle'));
});

Route::get('/about', function () {
    return redirect('/about/company');
});

Route::get('/about/company', function () {
    return view('about.company');
});

Route::get('/about/approach', function () {
    return view('about.approach');
});

Route::get('/about/team', function () {
    return view('about.team');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{slug}', [EventController::class, 'show'])->name('events.show');



/*
|--------------------------------------------------------------------------
| Protected Hidden Admin & Auth Routes (Role-Based MySQL Auth)
|--------------------------------------------------------------------------
*/

// GET Login Form
Route::get('/login', function () {
    if (session('admin_logged_in')) {
        return redirect('/admin/dashboard');
    }
    return view('auth.login');
})->name('login');

// POST Login Submit (Database MySQL & Role Verification)
Route::post('/login', function (Request $request) {
    $email = trim($request->input('email'));
    $password = $request->input('password');

    // 1. Try Eloquent MySQL Database Authentication
    try {
        $user = User::where('email', $email)->first();
        if ($user && Hash::check($password, $user->password)) {
            session([
                'admin_logged_in' => true,
                'user_id'         => $user->id,
                'user_name'       => $user->name,
                'user_email'      => $user->email,
                'user_role'       => $user->role, // 'super_admin' or 'admin'
            ]);
            return redirect('/admin/dashboard');
        }
    } catch (\Exception $e) {
        // Fallback to demo credentials if DB error occurs
    }

    // 2. Demo Account Fallbacks
    if ($email === 'superadmin@vizziocraft.com' && $password === 'superadmin123') {
        session([
            'admin_logged_in' => true,
            'user_name'       => 'Super Admin VizzioCraft',
            'user_email'      => 'superadmin@vizziocraft.com',
            'user_role'       => 'super_admin',
        ]);
        return redirect('/admin/dashboard');
    }

    if ($email === 'admin@vizziocraft.com' && $password === 'admin123') {
        session([
            'admin_logged_in' => true,
            'user_name'       => 'Admin VizzioCraft',
            'user_email'      => 'admin@vizziocraft.com',
            'user_role'       => 'admin',
        ]);
        return redirect('/admin/dashboard');
    }

    return back()->with('error', 'Alamat email atau kata sandi admin tidak ditemukan.');
});

/*
|--------------------------------------------------------------------------
| Admin Portal Dedicated Routes (Role-Based Protected Panel)
|--------------------------------------------------------------------------
*/
Route::middleware([])->group(function () {
    // 1. Utama & Analitik
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/analytics', [AnalyticsController::class, 'visitors'])->name('admin.analytics.visitors');
    Route::get('/admin/analytics/traffic', [AnalyticsController::class, 'traffic'])->name('admin.analytics.traffic');

    // 2. Manajemen Konten CRUD
    Route::resource('admin/news', NewsController::class)->names('admin.news');
    Route::resource('admin/events', AdminEventController::class)->names('admin.events');
    Route::resource('admin/projects', ProjectController::class)->names('admin.projects');
    Route::resource('admin/services', AdminServiceController::class)->names('admin.services');
    Route::get('/admin/gallery', [GalleryController::class, 'index'])->name('admin.gallery.index');
    Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
    Route::resource('admin/team', TeamController::class)->names('admin.team');
    Route::resource('admin/testimonials', TestimonialController::class)->names('admin.testimonials');

    // 3. Interaksi & Pesan
    Route::get('/admin/messages', [MessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/{id}', [MessageController::class, 'show'])->name('admin.messages.show');
    Route::match(['post', 'patch'], '/admin/messages/{id}', [MessageController::class, 'update'])->name('admin.messages.update');
    Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])->name('admin.messages.destroy');

    Route::get('/admin/leads', [LeadController::class, 'index'])->name('admin.leads.index');
    Route::get('/admin/leads/{id}', [LeadController::class, 'show'])->name('admin.leads.show');
    Route::match(['post', 'patch'], '/admin/leads/{id}', [LeadController::class, 'update'])->name('admin.leads.update');
    Route::delete('/admin/leads/{id}', [LeadController::class, 'destroy'])->name('admin.leads.destroy');

    Route::get('/admin/notifications', [NotificationController::class, 'index'])->name('admin.notifications.index');

    // 4. ★ Khusus Super Admin - All Users & Keamanan
    Route::get('/admin/users/reset-password', [UserController::class, 'resetPasswordView'])->name('admin.users.reset-password');
    Route::post('/admin/users/reset-password', [UserController::class, 'resetPassword'])->name('admin.users.reset-password.post');
    Route::resource('admin/users', UserController::class)->names('admin.users');

    Route::get('/admin/logs', [LogController::class, 'index'])->name('admin.logs.index');
    Route::get('/admin/security', [SecurityController::class, 'index'])->name('admin.security.index');
    Route::get('/admin/backup', [BackupController::class, 'index'])->name('admin.backup.index');
    Route::post('/admin/backup', [BackupController::class, 'createBackup'])->name('admin.backup.create');

    // 5. Pengaturan & Halaman
    Route::get('/admin/settings/profile', [SettingController::class, 'profile'])->name('admin.settings.profile');
    Route::post('/admin/settings/profile', [SettingController::class, 'updateProfile'])->name('admin.settings.profile.update');
    Route::get('/admin/settings/pages', [SettingController::class, 'pages'])->name('admin.settings.pages');
    Route::post('/admin/settings/pages/{id}', [SettingController::class, 'updatePage'])->name('admin.settings.pages.update');
    Route::get('/admin/settings/seo', [SettingController::class, 'seo'])->name('admin.settings.seo');
    Route::post('/admin/settings/seo', [SettingController::class, 'updateSeo'])->name('admin.settings.seo.update');
    Route::get('/admin/settings/banner', [SettingController::class, 'banner'])->name('admin.settings.banner');
    Route::post('/admin/settings/banner', [SettingController::class, 'updateBanner'])->name('admin.settings.banner.update');
    Route::get('/admin/settings/email', [SettingController::class, 'email'])->name('admin.settings.email');
    Route::get('/admin/settings/system', [SettingController::class, 'system'])->name('admin.settings.system');
});


// Logout
Route::match(['GET', 'POST'], '/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');

Route::match(['GET', 'POST'], '/admin/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('admin.logout');

