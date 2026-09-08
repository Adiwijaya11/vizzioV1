@extends('layouts.admin.app')

@section('title', 'Pesan Masuk — VizzioCraft')
@section('page_title', 'Pesan Masuk')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Kotak Masuk Pesan & Pertanyaan</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Pesan langsung yang dikirim oleh calon klien dan publik melalui formulir kontak web VizzioCraft.</p>
        </div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <div style="padding: 8px 16px; border-radius: 12px; background: #fff7ed; border: 1px solid #fed7aa; color: #c2410c; font-size: 12px; font-weight: 700; display: flex; align-items: center; gap: 8px;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: #ea580c;"></span>
                {{ $unreadCount }} Pesan Belum Dibaca
            </div>
        </div>
    </div>

    {{-- Filter Bar --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 16px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form method="GET" action="{{ route('admin.messages.index') }}" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin: 0;">
            <div style="flex: 1; min-width: 220px; position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pengirim, email, perihal..." style="width: 100%; padding: 9px 14px 9px 36px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; outline: none; font-family: 'Poppins', sans-serif;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select name="status" style="padding: 9px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; color: #475569; outline: none; background: #fff; font-family: 'Poppins', sans-serif;">
                <option value="all">Semua Status</option>
                <option value="unread" {{ request('status') == 'unread' ? 'selected' : '' }}>Belum Dibaca (Unread)</option>
                <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Sudah Dibaca (Read)</option>
                <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Telah Dibalas (Replied)</option>
            </select>
            <button type="submit" style="padding: 9px 18px; border-radius: 10px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                Filter
            </button>
            @if(request('search') || (request('status') && request('status') !== 'all'))
                <a href="{{ route('admin.messages.index') }}" style="padding: 9px 14px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Reset</a>
            @endif
        </form>
    </div>

    {{-- Messages Table --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Pengirim</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Perihal & Cuplikan Pesan</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Status</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Waktu Masuk</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr style="border-bottom: 1px solid #f1f5f9; {{ $msg->status === 'unread' ? 'background: #fdfbf7;' : '' }}" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='{{ $msg->status === 'unread' ? '#fdfbf7' : 'transparent' }}'">
                            <td style="padding: 14px 12px; white-space: nowrap;">
                                <div style="font-size: 13px; font-weight: 700; color: #0f172a;">{{ $msg->name }}</div>
                                <div style="font-size: 11px; color: #64748b; font-family: monospace;">{{ $msg->email }}</div>
                            </td>
                            <td style="padding: 14px 12px; max-width: 380px;">
                                <div style="font-size: 12.5px; font-weight: 700; color: #1e293b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $msg->subject ?: 'Konsultasi Layanan VizzioCraft' }}
                                </div>
                                <div style="font-size: 11px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 2px;">
                                    {{ Str::limit($msg->message, 70) }}
                                </div>
                            </td>
                            <td style="padding: 12px;">
                                @if($msg->status === 'unread')
                                    <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 6px; background: #fff7ed; color: #ea580c; font-size: 10px; font-weight: 800; border: 1px solid #fed7aa;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: #ea580c;"></span>
                                        UNREAD
                                    </span>
                                @elseif($msg->status === 'replied')
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #ecfdf5; color: #059669; font-size: 10px; font-weight: 700; border: 1px solid #a7f3d0;">
                                        REPLIED
                                    </span>
                                @else
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #f1f5f9; color: #64748b; font-size: 10px; font-weight: 600; border: 1px solid #e2e8f0;">
                                        READ
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 12px; color: #64748b; font-size: 11px; white-space: nowrap;">
                                {{ $msg->created_at->diffForHumans() }}
                            </td>
                            <td style="padding: 12px; text-align: right; white-space: nowrap;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" style="padding: 6px 12px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 11px; text-decoration: none; border: 1px solid #bfdbfe;">
                                        Buka Pesan
                                    </a>
                                    <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('Hapus pesan dari {{ $msg->name }}?')" style="margin: 0; display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding: 6px 10px; border-radius: 8px; background: #fef2f2; color: #dc2626; font-weight: 700; font-size: 11px; border: 1px solid #fecaca; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding: 32px; text-align: center; color: #94a3b8;">
                                Belum ada pesan masuk di kotak masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div style="margin-top: 20px;">
                {{ $messages->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
