<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    public function run(): void
    {
        $playbooks = [
            [
                'title'      => 'Checklist Optimasi Kecepatan Web Tembus Skor 95+',
                'slug'       => 'checklist-optimasi-kecepatan-web',
                'category'   => 'performance',
                'badge'      => 'PERFORMA & WEB VITALS',
                'summary'    => 'Keterlambatan waktu muat halaman berdampak langsung pada rasio pentalan pengunjung. Terapkan langkah teknis ini pada aplikasi web Anda.',
                'summary_en' => 'Page load delays directly impact visitor bounce rates. Apply these technical steps to your web application.',
                'steps'      => [
                    'Konversi seluruh aset gambar ke format generasi baru (WebP/AVIF) dengan atribut width dan height eksplisit untuk mencegah Cumulative Layout Shift (CLS).',
                    'Aktifkan Eager Loading pada query ORM (hindari N+1 Query Problem) dan simpan hasil query yang jarang berubah di Redis Cache.',
                    'Gunakan HTTP/3 dan Brotli Compression di level edge (Cloudflare/Nginx) serta muat skrip analitik pihak ketiga secara defer atau async.',
                ],
                'outcome'    => 'Hasil Teknis: Waktu First Contentful Paint & LCP jauh lebih stabil di jaringan seluler',
                'outcome_en' => 'Technical Outcome: Much more stable First Contentful Paint & LCP on mobile networks',
                'read_time'  => '4 Menit Baca',
                'order'      => 1,
                'status'     => 'active',
            ],
            [
                'title'      => 'Standar Pengamanan Aplikasi Bisnis & Database Klien',
                'slug'       => 'standar-pengamanan-aplikasi-bisnis',
                'category'   => 'security',
                'badge'      => 'KEAMANAN SIBER & DATA',
                'summary'    => 'Langkah wajib sebelum meluncurkan sistem internal, ERP, maupun portal pelanggan ke jaringan publik.',
                'summary_en' => 'Mandatory steps before launching internal systems, ERPs, or customer portals to the public internet.',
                'steps'      => [
                    'Terapkan Role-Based Access Control (RBAC) berbasis prinsip Least Privilege dan wajibkan autentikasi berlapis pada akun administrator.',
                    'Pasang Rate Limiter pada endpoint login, lupa password, dan API publik untuk memblokir serangan brute-force maupun DDoS aplikasi.',
                    'Otomatisasi backup database harian ke object storage terpisah (off-site) dengan enkripsi AES-256 dan uji coba restore berkala.',
                ],
                'outcome'    => 'Hasil Teknis: Mitigasi vektor serangan umum OWASP Top 10 sejak hari pertama rilis',
                'outcome_en' => 'Technical Outcome: Mitigates common OWASP Top 10 attack vectors from day one',
                'read_time'  => '5 Menit Baca',
                'order'      => 2,
                'status'     => 'active',
            ],
            [
                'title'      => 'Strategi Efisiensi Biaya Cloud Server Tanpa Downgrade Performa',
                'slug'       => 'strategi-efisiensi-biaya-cloud-server',
                'category'   => 'architecture',
                'badge'      => 'ARSITEKTUR & CLOUD',
                'summary'    => 'Banyak perusahaan membayar tagihan cloud berlebih karena alokasi resource dan antrean proses yang kurang tepat.',
                'summary_en' => 'Many companies overpay on cloud bills due to unoptimized resource allocation and job queues.',
                'steps'      => [
                    'Mulai dengan Modular Monolith yang rapi sebelum memecah sistem menjadi Microservices: hemat biaya orkestrasi hingga trafik benar-benar membutuhkan.',
                    'Pindahkan pemrosesan berat (generate PDF, kirim ribuan email, ekspor Excel) ke Background Queue Worker agar CPU web server tetap ringan.',
                    'Manfaatkan CDN caching untuk file statis sehingga penggunaan bandwidth keluar (egress) dari server utama jauh lebih hemat.',
                ],
                'outcome'    => 'Hasil Teknis: Beban CPU server utama turun drastis saat jam sibuk operasional',
                'outcome_en' => 'Technical Outcome: Origin server CPU load drops significantly during peak operational hours',
                'read_time'  => '4 Menit Baca',
                'order'      => 3,
                'status'     => 'active',
            ],
            [
                'title'      => 'Panduan Membangun MVP Produk Digital Tepat Sasaran',
                'slug'       => 'panduan-membangun-mvp-produk-digital',
                'category'   => 'product',
                'badge'      => 'STRATEGI PRODUK & MVP',
                'summary'    => 'Hindari jebakan membangun terlalu banyak fitur di awal yang akhirnya jarang dipakai oleh pengguna akhir.',
                'summary_en' => 'Avoid the trap of building too many initial features that end users rarely touch.',
                'steps'      => [
                    'Fokuskan fase pertama pada alur fitur inti yang menyelesaikan masalah operasional paling mendesak bagi pengguna (Core Value Loop).',
                    'Validasi alur layar menggunakan prototipe interaktif Figma bersama calon pengguna sebelum masuk ke tahap penulisan kode.',
                    'Pasang telemetri dan pencatatan penggunaan fitur sejak rilis awal untuk mengambil keputusan pengembangan berbasis penggunaan nyata.',
                ],
                'outcome'    => 'Hasil Teknis: Siklus peluncuran produk lebih singkat dan minim pengerjaan ulang',
                'outcome_en' => 'Technical Outcome: Shorter product launch cycle with minimal engineering rework',
                'read_time'  => '3 Menit Baca',
                'order'      => 4,
                'status'     => 'active',
            ],
            [
                'title'      => 'Formula Struktur Website B2B yang Mendatangkan Prospek Organik',
                'slug'       => 'formula-struktur-website-b2b',
                'category'   => 'seo',
                'badge'      => 'SEO TEKNIS & KONVERSI',
                'summary'    => 'Website korporat bukan sekadar brosur digital, melainkan saluran akuisisi klien yang bekerja sepanjang waktu.',
                'summary_en' => 'A corporate website is not just a digital brochure, it is an always-on client acquisition channel.',
                'steps'      => [
                    'Buat halaman spesifik untuk setiap layanan utama (Service Landing Page) dengan struktur heading H1 hingga H3 yang menjawab niat pencarian calon klien.',
                    'Sertakan bukti portofolio proyek nyata dan rincian solusi tepat sebelum mengarahkan pengunjung ke halaman konsultasi.',
                    'Sederhanakan formulir konsultasi menjadi kolom esensial dan sediakan jalur cepat WhatsApp untuk kemudahan komunikasi.',
                ],
                'outcome'    => 'Hasil Teknis: Struktur halaman lebih mudah diindeks mesin pencari dan jelas bagi calon klien',
                'outcome_en' => 'Technical Outcome: Pages are cleaner for search engine crawlers and clearer for prospective clients',
                'read_time'  => '4 Menit Baca',
                'order'      => 5,
                'status'     => 'active',
            ],
            [
                'title'      => 'Tips Migrasi dari Spreadsheet Manual ke Sistem ERP Terintegrasi',
                'slug'       => 'tips-migrasi-spreadsheet-ke-erp',
                'category'   => 'database',
                'badge'      => 'DATABASE & INTEGRASI ERP',
                'summary'    => 'Transisi digital yang sukses membutuhkan kesiapan struktur data dan manajemen perubahan tim yang matang.',
                'summary_en' => 'Successful digital transition requires clean data structures and thoughtful team change management.',
                'steps'      => [
                    'Standarisasi kode master data (SKU produk, kode cabang, akun COA keuangan) terlebih dahulu sebelum melakukan impor massal ke database baru.',
                    'Jalankan fase Parallel Run di mana sistem baru diuji berdampingan sebelum menghentikan pencatatan manual sepenuhnya.',
                    'Tunjuk penanggung jawab (PIC) di tiap divisi (Gudang, Finance, Operasional) untuk mempercepat adopsi SOP digital di lapangan.',
                ],
                'outcome'    => 'Hasil Teknis: Integritas data terjaga dan adopsi tim berjalan tanpa gangguan operasional',
                'outcome_en' => 'Technical Outcome: Data integrity is preserved and team adoption proceeds without operational disruption',
                'read_time'  => '5 Menit Baca',
                'order'      => 6,
                'status'     => 'active',
            ],
        ];

        foreach ($playbooks as $item) {
            Tip::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}

