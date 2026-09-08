@extends('layouts.admin.app')

@section('title', 'Portofolio & Proyek — VizzioCraft')
@section('page_title', 'Portofolio & Proyek')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Manajemen Portofolio & Proyek Klien</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Pantau progress pengerjaan proyek enterprise, status anggaran, dan rincian klien VizzioCraft.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah Proyek Baru
        </a>
    </div>

    {{-- Stats Cards --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px;">
        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Proyek Aktif Berjalan</div>
            <div style="font-size: 26px; font-weight: 800; color: #2563eb;">{{ $activeCount }} <span style="font-size: 14px; font-weight: 600; color: #64748b;">Proyek</span></div>
            <div style="font-size: 11px; color: #10b981; font-weight: 600; margin-top: 4px;">Dalam tahap pengerjaan & QA</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Total Nilai Anggaran Proyek</div>
            <div style="font-size: 26px; font-weight: 800; color: #0f172a;">Rp {{ number_format($totalBudget, 0, ',', '.') }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Akumulasi portofolio klien</div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 8px;">Total Entitas Proyek</div>
            <div style="font-size: 26px; font-weight: 800; color: #059669;">{{ $projects->total() }}</div>
            <div style="font-size: 11px; color: #64748b; margin-top: 4px;">Termasuk selesai & perencanaan</div>
        </div>
    </div>

    {{-- Filter Bar --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 16px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form method="GET" action="{{ route('admin.projects.index') }}" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin: 0;">
            <div style="flex: 1; min-width: 220px; position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama proyek, klien, deskripsi..." style="width: 100%; padding: 9px 14px 9px 36px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; outline: none; font-family: 'Poppins', sans-serif;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select name="status" style="padding: 9px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; color: #475569; outline: none; background: #fff; font-family: 'Poppins', sans-serif;">
                <option value="all">Semua Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active (Berjalan)</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed (Selesai)</option>
                <option value="planning" {{ request('status') == 'planning' ? 'selected' : '' }}>Planning (Rencana)</option>
                <option value="on_hold" {{ request('status') == 'on_hold' ? 'selected' : '' }}>On Hold</option>
            </select>
            <button type="submit" style="padding: 9px 18px; border-radius: 10px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                Filter
            </button>
            @if(request('search') || (request('status') && request('status') !== 'all'))
                <a href="{{ route('admin.projects.index') }}" style="padding: 9px 14px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Reset</a>
            @endif
        </form>
    </div>

    {{-- Table --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Nama Proyek & Klien</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Anggaran / Nilai</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Status</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Rentang Waktu</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $p)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 14px 12px;">
                                <div style="font-size: 13px; font-weight: 700; color: #0f172a;">{{ $p->name }}</div>
                                <div style="font-size: 11px; color: #64748b; margin-top: 2px;">
                                    Klien: <span style="font-weight: 600; color: #1e293b;">{{ $p->client }}</span>
                                    @if($p->description)
                                        &bull; {{ Str::limit($p->description, 40) }}
                                    @endif
                                </div>
                            </td>
                            <td style="padding: 12px; color: #0f172a; font-weight: 700;">
                                Rp {{ number_format($p->budget, 0, ',', '.') }}
                            </td>
                            <td style="padding: 12px;">
                                @if($p->status === 'active')
                                    <span style="display: inline-flex; align-items: center; gap: 5px; padding: 3px 8px; border-radius: 6px; background: #eff6ff; color: #2563eb; font-size: 10px; font-weight: 700; border: 1px solid #bfdbfe;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: #2563eb;"></span>
                                        Active
                                    </span>
                                @elseif($p->status === 'completed')
                                    <span style="display: inline-flex; align-items: center; gap: 5px; padding: 3px 8px; border-radius: 6px; background: #ecfdf5; color: #059669; font-size: 10px; font-weight: 700; border: 1px solid #a7f3d0;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: #10b981;"></span>
                                        Completed
                                    </span>
                                @elseif($p->status === 'planning')
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #fffbeb; color: #d97706; font-size: 10px; font-weight: 700; border: 1px solid #fde68a;">
                                        Planning
                                    </span>
                                @else
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #f1f5f9; color: #64748b; font-size: 10px; font-weight: 700; border: 1px solid #e2e8f0;">
                                        {{ ucfirst($p->status) }}
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 12px; font-size: 11px; color: #64748b;">
                                {{ $p->start_date ? \Carbon\Carbon::parse($p->start_date)->format('d M Y') : '-' }} s/d {{ $p->end_date ? \Carbon\Carbon::parse($p->end_date)->format('d M Y') : 'Selesai' }}
                            </td>
                            <td style="padding: 12px; text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <a href="{{ route('admin.projects.edit', $p->id) }}" style="padding: 6px 10px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 11px; text-decoration: none; border: 1px solid #bfdbfe;">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?')" style="margin: 0; display: inline;">
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
                                Belum ada data proyek portofolio yang sesuai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($projects->hasPages())
            <div style="margin-top: 20px;">
                {{ $projects->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
