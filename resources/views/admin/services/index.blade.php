@extends('layouts.admin.app')

@section('title', 'Layanan Digital — VizzioCraft')
@section('page_title', 'Layanan Digital')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Katalog Layanan & Solusi Digital</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola paket produk IT, model penentuan harga, fitur unggulan, dan status tampil di landing page.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah Layanan Baru
        </a>
    </div>

    {{-- Services Grid Cards --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px;">
        @forelse($services as $svc)
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; margin-bottom: 14px;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <div style="width: 42px; height: 42px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: 800; border: 1px solid #bfdbfe;">
                                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $svc->icon_path }}"/></svg>
                            </div>
                            <div>
                                <h3 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0;">{{ $svc->title }}</h3>
                                <span style="font-size: 11px; color: #64748b; font-weight: 600;">{{ $svc->category }}</span>
                            </div>
                        </div>
                        @if($svc->badge)
                            <span style="font-size: 9.5px; font-weight: 800; padding: 3px 8px; border-radius: 9999px; background: #dbeafe; color: #1e40af; border: 1px solid #bfdbfe; text-transform: uppercase;">
                                {{ $svc->badge }}
                            </span>
                        @endif
                    </div>

                    <div style="font-size: 12px; color: #475569; margin-bottom: 14px; line-height: 1.5;">
                        {{ $svc->description }}
                    </div>

                    <div style="background: #f8fafc; border-radius: 12px; padding: 10px 14px; margin-bottom: 14px; border: 1px solid #eef2f6;">
                        <div style="font-size: 10.5px; font-weight: 700; color: #64748b; text-transform: uppercase;">Investasi Mulai Dari</div>
                        <div style="font-size: 16px; font-weight: 800; color: #059669;">{{ $svc->price }}</div>
                    </div>

                    @if(!empty($svc->features) && is_array($svc->features))
                        <div style="margin-bottom: 16px;">
                            <div style="font-size: 11px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Fitur Termasuk:</div>
                            <ul style="margin: 0; padding-left: 18px; font-size: 11.5px; color: #64748b; display: flex; flex-direction: column; gap: 3px;">
                                @foreach(array_slice($svc->features, 0, 3) as $f)
                                    <li>{{ $f }}</li>
                                @endforeach
                                @if(count($svc->features) > 3)
                                    <li style="color: #2563eb; font-weight: 600;">+ {{ count($svc->features) - 3 }} fitur lainnya</li>
                                @endif
                            </ul>
                        </div>
                    @endif
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #f1f5f9; padding-top: 14px; margin-top: 8px;">
                    <div>
                        @if($svc->status === 'active')
                            <span style="font-size: 10px; font-weight: 700; color: #059669; display: flex; align-items: center; gap: 4px;">
                                <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span>
                                Aktif di Web
                            </span>
                        @else
                            <span style="font-size: 10px; font-weight: 700; color: #94a3b8;">
                                Non-Aktif
                            </span>
                        @endif
                    </div>
                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.services.edit', $svc->id) }}" style="padding: 6px 12px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; text-decoration: none; border: 1px solid #bfdbfe;">
                            Edit
                        </a>
                        <form action="{{ route('admin.services.destroy', $svc->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')" style="margin: 0; display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 6px 12px; border-radius: 8px; background: #fef2f2; color: #dc2626; font-size: 11px; font-weight: 700; border: 1px solid #fecaca; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; padding: 40px; text-align: center; background: #fff; border-radius: 20px; border: 1px solid #e8edf5; color: #94a3b8;">
                Belum ada katalog layanan digital yang terdaftar.
            </div>
        @endforelse
    </div>

</div>
@endsection
