@extends('layouts.admin.app')

@section('title', 'Konfigurasi Email SMTP — VizzioCraft')
@section('page_title', 'Email & SMTP')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 2px 10px; border-radius: 9999px; background: #ede9fe; color: #7c3aed; font-size: 10.5px; font-weight: 800; text-transform: uppercase; margin-bottom: 6px; border: 1px solid #ddd6fe;">
                ★ Khusus Super Admin
            </div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Konfigurasi Gateway Email SMTP</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Pengaturan kredensial pengiriman email notifikasi, pemberitahuan kontak masuk, dan verifikasi akun.</p>
        </div>
        <div style="padding: 6px 12px; border-radius: 8px; background: #ecfdf5; color: #059669; font-size: 11px; font-weight: 700; border: 1px solid #a7f3d0;">
            Status: {{ $smtpConfig['status'] }}
        </div>
    </div>

    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <div style="display: flex; flex-direction: column; gap: 18px;">
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Mail Driver Default</label>
                    <input type="text" readonly value="{{ $smtpConfig['mailer'] }}" style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 13px; background: #f8fafc; font-family: monospace;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">SMTP Host Gateway</label>
                    <input type="text" readonly value="{{ $smtpConfig['host'] }}" style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 13px; background: #f8fafc; font-family: monospace;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Port Layanan</label>
                    <input type="text" readonly value="{{ $smtpConfig['port'] }} ({{ strtoupper($smtpConfig['encryption']) }})" style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 13px; background: #f8fafc; font-family: monospace;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Username Terotentikasi</label>
                    <input type="text" readonly value="{{ $smtpConfig['username'] }}" style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 13px; background: #f8fafc; font-family: monospace;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Alamat Email Pengirim (From Address)</label>
                    <input type="text" readonly value="{{ $smtpConfig['from_addr'] }}" style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 13px; background: #f8fafc; font-family: monospace;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Tampilan Pengirim (From Name)</label>
                    <input type="text" readonly value="{{ $smtpConfig['from_name'] }}" style="width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 13px; background: #f8fafc;">
                </div>
            </div>

            <div style="padding: 16px; border-radius: 12px; background: #eff6ff; border: 1px solid #bfdbfe; font-size: 12px; color: #1e40af; line-height: 1.5;">
                <strong>Catatan Super Admin:</strong> Konfigurasi SMTP disinkronisasikan secara aman dari berkas root environment <code>.env</code> server Laragon.
            </div>

        </div>
    </div>

</div>
@endsection
