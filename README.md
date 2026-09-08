# VizzioCraft — Modern Company Profile & Digital Agency Management System

Official GitHub Repository: [Adiwijaya11/vizzioV1](https://github.com/Adiwijaya11/vizzioV1)

> **vizzioV1** adalah repositori resmi untuk sistem profil perusahaan dan panel kendali manajemen terintegrasi **VizzioCraft**. Dibangun menggunakan arsitektur modern berbasis **Laravel**, **Tailwind CSS**, **MySQL**, dan **Vite**, platform ini dirancang khusus untuk memadukan pengalaman visual publik yang premium dengan kapabilitas manajemen operasional dan kontrol administratif berskala enterprise.

---

## 📌 Tentang Repositori vizzioV1

Repositori **[Adiwijaya11/vizzioV1](https://github.com/Adiwijaya11/vizzioV1)** mencakup seluruh ekosistem aplikasi VizzioCraft:
1. **Frontend Publik**: Portal profil perusahaan yang responsif, modern, dan interaktif dengan desain berstandar tinggi (Primary Blue `#2563EB`, font *Poppins*, micro-animations, filter portofolio, katalog layanan interaktif, dan integrasi WhatsApp).
2. **Panel Kontrol Admin (Role-Based)**: Sistem manajemen operasional mandiri yang dipisahkan secara ketat menjadi dua peran akses:
   - **Admin Biasa (`role: admin`)**: Mengelola seluruh konten publikasi, analitik traffic, interaksi klien, dan pengaturan tampilan situs.
   - **Super Admin (`role: super_admin`)**: Memegang kendali penuh atas manajemen pengguna (`All Users`), audit log, keamanan sesi, snapshot backup database MySQL, konfigurasi SMTP, dan variabel sistem.

---

## 🚀 Fitur Utama

### 1. Halaman Web Publik
- **Hero Banner Interaktif**: Headline dinamis, badge layanan, pencarian instan, dan tombol Call-To-Action (CTA).
- **Layanan Digital**: Katalog 9 paket layanan dengan fitur unggulan dan rincian harga.
- **Portofolio Proyek**: Showcase proyek aktif dan selesai lengkap dengan filter kategori & teknologi.
- **Berita & Wawasan**: Artikel terindeks dengan filter kategori, detail baca, dan rekomendasi terkait.
- **Tentang Kami**: Profil visi-misi perusahaan, metodologi pendekatan, dan struktur pimpinan/tim.
- **Kontak & CRM**: Form kontak publik terintegrasi langsung ke kotak masuk admin dan widget WhatsApp floating chat.

### 2. Panel Admin Terpadu

#### A. Utama & Analitik
- **Dashboard Overview (`/admin/dashboard`)**: Metrik KPI real-time (adaptif role), grafik kunjungan 7-hari, portofolio terbaru, dan pesan kontak masuk.
- **Analitik Pengunjung (`/admin/analytics`)**: Monitoring log IP pengunjung, rujukan traffic, serta distribusi peramban & OS.
- **Laporan Traffic (`/admin/analytics/traffic`)**: Funnel konversi dari total visitor hingga closing deal penawaran.

#### B. Manajemen Konten
- **Berita & Artikel (`/admin/news`)**: Full CRUD artikel berita publikasi.
- **Portofolio & Proyek (`/admin/projects`)**: Full CRUD proyek dan estimasi anggaran.
- **Layanan Digital (`/admin/services`)**: Full CRUD katalog layanan dan paket.
- **Galeri Media (`/admin/gallery`)**: Manajemen aset visual dan perpustakaan media.
- **Manajemen Tim (`/admin/team`)**: Full CRUD struktur organisasi dan sosial media anggota tim.
- **Testimonial Klien (`/admin/testimonials`)**: Full CRUD testimoni dan rating kepuasan klien.

#### C. Interaksi & CRM
- **Pesan Masuk (`/admin/messages`)**: Inbox pesan kontak publik dengan pembaruan status baca.
- **Permintaan Penawaran (`/admin/leads`)**: CRM pipeline penawaran proyek prospek masuk.
- **Notifikasi Sistem (`/admin/notifications`)**: Riwayat alert keamanan dan update sistem.

#### D. Pengaturan & Tampilan
- **Profil Perusahaan (`/admin/settings/profile`)**: Identitas, kontak resmi, alamat kantor, dan media sosial.
- **Halaman Statis (`/admin/settings/pages`)**: Pengelolaan konten statis (Tentang Kami, Privasi, Syarat Ketentuan, FAQ, Karir).
- **SEO & Meta Tag (`/admin/settings/seo`)**: Meta tag global dengan live pratinjau Google SERP & Social Card.
- **Banner & Hero Section (`/admin/settings/banner`)**: Kustomisasi teks hero, CTA, dan live preview.

#### E. Khusus Super Admin
- **All Users Management (`/admin/users`)**: Full CRUD akun administrator, penetapan peran (Super Admin vs Admin), dan reset password.
- **Audit Log Aktivitas (`/admin/logs`)**: Histori komprehensif seluruh aktivitas admin.
- **Keamanan & Sesi (`/admin/security`)**: Audit sesi login aktif dan pemantauan keamanan.
- **Backup & Restore DB (`/admin/backup`)**: Snapshot mandiri tabel-tabel MySQL secara real-time.
- **Konfigurasi Email SMTP (`/admin/settings/email`)** & **Konfigurasi Sistem .env (`/admin/settings/system`)**.

---

## 🛠️ Teknologi yang Digunakan

- **Backend**: [Laravel 11 / 12](https://laravel.com) (PHP 8.2+)
- **Frontend Styling**: [Tailwind CSS](https://tailwindcss.com), Vanilla CSS, Google Fonts (*Poppins*)
- **Build Tool**: [Vite](https://vitejs.dev)
- **Database**: MySQL / MariaDB (via Laragon / Local Server)
- **Icons & Visuals**: Heroicons (SVG), Custom Vector Illustrations

---

## 📦 Panduan Instalasi & Menjalankan Lokal

### 1. Klon Repositori
```bash
git clone https://github.com/Adiwijaya11/vizzioV1.git
cd vizzioV1
```

### 2. Instal Dependensi
```bash
# Dependensi PHP
composer install

# Dependensi Frontend Node.js
npm install
```

### 3. Konfigurasi Lingkungan (.env)
Salin file konfigurasi dan sesuaikan pengaturan database:
```bash
cp .env.example .env
php artisan key:generate
```

Pastikan konfigurasi database di `.env` sudah sesuai (contoh konfigurasi MySQL Laragon):
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vizziocraft2
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi Database & Seeder
Jalankan migrasi tabel beserta sample data lengkap:
```bash
php artisan migrate --seed
```

### 5. Jalankan Server Pengembangan
Buka dua terminal terpisah:
```bash
# Terminal 1: Backend PHP
php artisan serve

# Terminal 2: Vite Dev Server
npm run dev
```

Aplikasi siap diakses di: `http://127.0.0.1:8000`

---

## 🔐 Kredensial Akun Pengujian (Demo)

| Peran (Role) | Email | Kata Sandi | Lingkup Akses |
|---|---|---|---|
| **Admin Biasa** | `admin@vizziocraft.com` | `admin123` | Seluruh Modul Konten, CRM, Analitik, & Pengaturan Tampilan |
| **Super Admin** | `superadmin@vizziocraft.com` | `superadmin123` | Akses Penuh: All Users, Backup MySQL, Audit Log, SMTP, & .env |

---

## 📄 Lisensi

Repositori ini dilisensikan di bawah lisensi terbuka [MIT License](LICENSE).
Dikembangkan untuk ekosistem **VizzioCraft** &copy; 2026.
