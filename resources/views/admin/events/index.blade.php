@extends('layouts.admin.app')

@section('title', 'Manajemen Event & Workshop — VizzioCraft')
@section('page_title', 'Event & Workshop')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

    {{-- Header & Create Button --}}
    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 14px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Manajemen Event & Workshop</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola agenda workshop, webinar, meetup komunitas, dan event teknologi VizzioCraft.</p>
        </div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <a href="/events" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 16px; border-radius: 12px; background: #fff; border: 1px solid #e2e8f0; color: #475569; font-size: 13px; font-weight: 600; text-decoration: none; box-shadow: 0 1px 2px rgba(0,0,0,0.03);">
                <svg style="width: 15px; height: 15px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat Halaman Publik
            </a>
            <a href="{{ route('admin.events.create') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 18px; border-radius: 12px; background: #2563eb; color: #fff; font-size: 13px; font-weight: 700; text-decoration: none; box-shadow: 0 4px 12px rgba(37,99,235,0.25); transition: background 0.15s;">
                <svg style="width: 16px; height: 16px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Tambah Event Baru
            </a>
        </div>
    </div>

    {{-- Flash Success Message --}}
    @if(session('success'))
        <div style="padding: 12px 18px; border-radius: 12px; background: #ecfdf5; border: 1px solid #a7f3d0; color: #065f46; font-size: 13px; font-weight: 600; display: flex; align-items: center; gap: 8px;">
            <svg style="width: 18px; height: 18px; color: #059669;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Stats Cards --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 16px;">
        <div style="background: #fff; border: 1px solid #e8edf5; border-radius: 16px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="font-size: 11px; font-weight: 700; color: #94a3b8; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Total Event</div>
            <div style="font-size: 26px; font-weight: 800; color: #0f172a;">{{ $stats['total'] }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Semua event terdaftar</div>
        </div>
        <div style="background: #fff; border: 1px solid #e8edf5; border-radius: 16px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Event Mendatang</div>
            <div style="font-size: 26px; font-weight: 800; color: #2563eb;">{{ $stats['upcoming'] }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Aktif & siap dibuka</div>
        </div>
        <div style="background: #fff; border: 1px solid #e8edf5; border-radius: 16px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="font-size: 11px; font-weight: 700; color: #059669; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Peserta Terdaftar</div>
            <div style="font-size: 26px; font-weight: 800; color: #059669;">{{ number_format($stats['registered']) }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Total registrasi peserta</div>
        </div>
        <div style="background: #fff; border: 1px solid #e8edf5; border-radius: 16px; padding: 18px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Event Selesai</div>
            <div style="font-size: 26px; font-weight: 800; color: #475569;">{{ $stats['completed'] }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Arsip histori event</div>
        </div>
    </div>

    {{-- Filter & Search Toolbar --}}
    <div style="background: #fff; border: 1px solid #e8edf5; border-radius: 16px; padding: 16px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form method="GET" action="{{ route('admin.events.index') }}" style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 220px; position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul event, pembicara, lokasi..." style="width: 100%; padding: 9px 14px 9px 36px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12.5px; font-family: 'Poppins', sans-serif;">
                <svg style="position: absolute; left: 11px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; color: #94a3b8;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/></svg>
            </div>

            <select name="type" style="padding: 9px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12.5px; font-family: 'Poppins', sans-serif; background: #fff; color: #334155;">
                <option value="all">Semua Tipe</option>
                <option value="workshop" {{ request('type') === 'workshop' ? 'selected' : '' }}>Workshop</option>
                <option value="webinar" {{ request('type') === 'webinar' ? 'selected' : '' }}>Webinar</option>
                <option value="seminar" {{ request('type') === 'seminar' ? 'selected' : '' }}>Seminar</option>
                <option value="meetup" {{ request('type') === 'meetup' ? 'selected' : '' }}>Meetup</option>
                <option value="bootcamp" {{ request('type') === 'bootcamp' ? 'selected' : '' }}>Bootcamp</option>
                <option value="hackathon" {{ request('type') === 'hackathon' ? 'selected' : '' }}>Hackathon</option>
                <option value="talk" {{ request('type') === 'talk' ? 'selected' : '' }}>Tech Talk</option>
            </select>

            <select name="status" style="padding: 9px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12.5px; font-family: 'Poppins', sans-serif; background: #fff; color: #334155;">
                <option value="all">Semua Status</option>
                <option value="upcoming" {{ request('status') === 'upcoming' ? 'selected' : '' }}>Akan Datang</option>
                <option value="ongoing" {{ request('status') === 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>

            <button type="submit" style="padding: 9px 16px; border-radius: 10px; background: #2563eb; color: #fff; border: none; font-size: 12.5px; font-weight: 600; cursor: pointer; font-family: 'Poppins', sans-serif;">
                Filter
            </button>
            @if(request()->hasAny(['search', 'type', 'status']))
                <a href="{{ route('admin.events.index') }}" style="padding: 9px 14px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12.5px; font-weight: 600; text-decoration: none;">
                    Reset
                </a>
            @endif
        </form>
    </div>

    {{-- Event Table --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 12.5px;">
                <thead>
                    <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0; color: #64748b; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
                        <th style="padding: 14px 20px;">Informasi Event</th>
                        <th style="padding: 14px 16px;">Tipe & Format</th>
                        <th style="padding: 14px 16px;">Jadwal</th>
                        <th style="padding: 14px 16px;">Kapasitas</th>
                        <th style="padding: 14px 16px;">Harga</th>
                        <th style="padding: 14px 16px;">Status</th>
                        <th style="padding: 14px 20px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: background 0.1s;">
                            <td style="padding: 14px 20px;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    @if($event->image)
                                        <img src="{{ $event->image }}" alt="{{ $event->title }}" style="width: 52px; height: 38px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0; flex-shrink: 0;">
                                    @else
                                        <div style="width: 52px; height: 38px; border-radius: 8px; background: #f1f5f9; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; color: #94a3b8; font-size: 10px; flex-shrink: 0;">No Img</div>
                                    @endif
                                    <div>
                                        <div style="display: flex; align-items: center; gap: 6px;">
                                            @if($event->is_featured)
                                                <span style="display: inline-flex; align-items: center; justify-content: center; width: 18px; height: 18px; border-radius: 5px; background: #fef3c7; color: #b45309; flex-shrink: 0;" title="Featured Event">
                                                    <svg style="width: 10px; height: 10px; fill: currentColor;" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                                </span>
                                            @endif
                                            <span style="font-weight: 700; color: #0f172a; line-height: 1.3;">{{ $event->title }}</span>
                                        </div>
                                        <div style="font-size: 11.5px; color: #64748b; margin-top: 3px;">
                                            @if($event->speaker) 👤 {{ $event->speaker }} &bull; @endif
                                            📍 {{ $event->location ?? 'Online' }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 14px 16px;">
                                <div style="display: flex; flex-direction: column; gap: 4px;">
                                    <span style="display: inline-block; padding: 2px 8px; border-radius: 6px; font-size: 11px; font-weight: 700; text-transform: uppercase; background: #eff6ff; color: #2563eb; width: fit-content;">{{ $event->type }}</span>
                                    <span style="font-size: 11px; color: #64748b; text-transform: capitalize;">{{ $event->format }}</span>
                                </div>
                            </td>
                            <td style="padding: 14px 16px;">
                                <div style="font-weight: 600; color: #1e293b;">{{ $event->event_date->format('d M Y') }}</div>
                                @if($event->start_time)
                                    <div style="font-size: 11px; color: #64748b; margin-top: 2px;">{{ substr($event->start_time, 0, 5) }} WIB</div>
                                @endif
                            </td>
                            <td style="padding: 14px 16px;">
                                @if($event->capacity)
                                    <div style="font-weight: 600; color: #0f172a;">{{ $event->registered }} / {{ $event->capacity }}</div>
                                    <div style="font-size: 11px; color: #64748b;">{{ $event->spots_left }} tersisa</div>
                                @else
                                    <span style="color: #64748b;">Terbuka</span>
                                @endif
                            </td>
                            <td style="padding: 14px 16px;">
                                <span style="font-weight: 700; color: {{ $event->is_free ? '#059669' : '#0f172a' }};">
                                    {{ $event->formatted_price }}
                                </span>
                            </td>
                            <td style="padding: 14px 16px;">
                                @php
                                    $badgeBg = '#f1f5f9';
                                    $badgeColor = '#475569';
                                    if ($event->status === 'upcoming') {
                                        $badgeBg = '#dbeafe'; $badgeColor = '#1e40af';
                                    } elseif ($event->status === 'ongoing') {
                                        $badgeBg = '#d1fae5'; $badgeColor = '#065f46';
                                    } elseif ($event->status === 'completed') {
                                        $badgeBg = '#f1f5f9'; $badgeColor = '#64748b';
                                    } elseif ($event->status === 'cancelled') {
                                        $badgeBg = '#fee2e2'; $badgeColor = '#991b1b';
                                    }
                                @endphp
                                <span style="display: inline-block; padding: 3px 9px; border-radius: 99px; font-size: 10.5px; font-weight: 700; background: {{ $badgeBg }}; color: {{ $badgeColor }}; text-transform: capitalize;">
                                    {{ $event->status }}
                                </span>
                            </td>
                            <td style="padding: 14px 20px; text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <a href="/events/{{ $event->slug }}" target="_blank" title="Lihat di Web" style="padding: 6px; border-radius: 8px; color: #64748b; background: #f8fafc; border: 1px solid #e2e8f0; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">
                                        <svg style="width: 14px; height: 14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('admin.events.edit', $event->id) }}" title="Edit Event" style="padding: 6px; border-radius: 8px; color: #2563eb; background: #eff6ff; border: 1px solid #bfdbfe; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">
                                        <svg style="width: 14px; height: 14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus event ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus Event" style="padding: 6px; border-radius: 8px; color: #ef4444; background: #fef2f2; border: 1px solid #fecaca; display: inline-flex; align-items: center; justify-content: center; cursor: pointer;">
                                            <svg style="width: 14px; height: 14px;" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="padding: 40px 20px; text-align: center; color: #94a3b8;">
                                <div style="font-size: 14px; font-weight: 600; color: #475569; margin-bottom: 4px;">Belum ada event ditemukan</div>
                                <div style="font-size: 12px;">Mulai dengan menambahkan event atau workshop baru untuk komunitas.</div>
                                <a href="{{ route('admin.events.create') }}" style="display: inline-flex; align-items: center; gap: 6px; margin-top: 14px; padding: 8px 16px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 600; text-decoration: none;">
                                    + Tambah Event Baru
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($events->hasPages())
            <div style="padding: 16px 20px; border-top: 1px solid #f1f5f9;">
                {{ $events->links() }}
            </div>
        @endif
    </div>

</div>
@endsection

