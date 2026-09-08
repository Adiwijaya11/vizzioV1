<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = [
            [
                'id'       => 1,
                'title'    => 'Snapshot Backup Database Selesai',
                'desc'     => 'Snapshot database MySQL vizziocraft2 berhasil diekspor otomatis tanpa kendala.',
                'time'     => '6 jam yang lalu',
                'category' => 'Database',
                'type'     => 'success',
                'read'     => false,
            ],
            [
                'id'       => 2,
                'title'    => 'Sertifikat SSL Let\'s Encrypt Valid & Aktif',
                'desc'     => 'Enkripsi koneksi HTTPS TLS 1.3 berstatus aktif dan akan diperbarui otomatis dalam 72 hari.',
                'time'     => '1 hari yang lalu',
                'category' => 'Keamanan',
                'type'     => 'info',
                'read'     => false,
            ],
            [
                'id'       => 3,
                'title'    => 'Permintaan Penawaran Baru Masuk',
                'desc'     => 'PT Nusantara Mandiri mengirimkan permintaan penawaran ERP dengan anggaran Rp 150Jt - 500Jt.',
                'time'     => '2 hari yang lalu',
                'category' => 'Penawaran',
                'type'     => 'warning',
                'read'     => false,
            ],
            [
                'id'       => 4,
                'title'    => 'Aktivitas Login Administrator Terdeteksi',
                'desc'     => 'Super Admin berhasil masuk ke sesi control panel dari alamat IP 127.0.0.1.',
                'time'     => '2 hari yang lalu',
                'category' => 'Autentikasi',
                'type'     => 'info',
                'read'     => true,
            ],
            [
                'id'       => 5,
                'title'    => 'Kinerja OPcache & Route Cache Terverifikasi',
                'desc'     => 'Waktu respon backend aplikasi rata-rata 38ms di lingkungan PHP 8.2+ Laragon.',
                'time'     => '3 hari yang lalu',
                'category' => 'Performa',
                'type'     => 'info',
                'read'     => true,
            ],
        ];

        return view('admin.notifications.index', compact('notifications'));
    }
}
