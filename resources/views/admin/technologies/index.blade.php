@extends('layouts.admin.app')

@section('title', 'Katalog Teknologi & Stack Rekayasa — VizzioCraft')
@section('page_title', 'Teknologi & Stack Rekayasa')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Alert Messages --}}
    @if(session('success'))
        <div style="background: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 14px; padding: 14px 18px; color: #065f46; font-size: 13px; font-weight: 600; display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 10px;">
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" style="background: none; border: none; color: #065f46; cursor: pointer; font-size: 16px;">×</button>
        </div>
    @endif

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Katalog Teknologi & Stack Rekayasa</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola stack framework, database, tool DevOps, dan pustaka sistem yang ditampilkan pada halaman publik /technology.</p>
        </div>
        <div style="display: flex; gap: 10px; align-items: center;">
            <a href="/technology" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; background: #ffffff; color: #334155; border: 1px solid #cbd5e1; font-weight: 700; font-size: 12px; padding: 9px 16px; border-radius: 12px; text-decoration: none;">
                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat Halaman Publik
            </a>
            <a href="{{ route('admin.technologies.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 9px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                Tambah Teknologi Baru
            </a>
        </div>
    </div>

    {{-- Stats Cards Row --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 16px 20px;">
            <div style="font-size: 11px; font-weight: 700; color: #64748b; text-transform: uppercase; margin-bottom: 4px;">Total Stack Terdaftar</div>
            <div style="font-size: 26px; font-weight: 800; color: #0f172a;">{{ $stats['total'] }}</div>
        </div>
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 16px 20px;">
            <div style="font-size: 11px; font-weight: 700; color: #059669; text-transform: uppercase; margin-bottom: 4px;">Aktif di Halaman Web</div>
            <div style="font-size: 26px; font-weight: 800; color: #059669;">{{ $stats['active'] }}</div>
        </div>
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 16px 20px;">
            <div style="font-size: 11px; font-weight: 700; color: #2563eb; text-transform: uppercase; margin-bottom: 4px;">Stack Unggulan (Featured)</div>
            <div style="font-size: 26px; font-weight: 800; color: #2563eb;">{{ $stats['featured'] }}</div>
        </div>
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 16px 20px;">
            <div style="font-size: 11px; font-weight: 700; color: #7c3aed; text-transform: uppercase; margin-bottom: 4px;">Kategori Arsitektur</div>
            <div style="font-size: 26px; font-weight: 800; color: #7c3aed;">{{ $stats['categories'] }}</div>
        </div>
    </div>

    {{-- Filter & Search Form --}}
    <form method="GET" action="{{ route('admin.technologies.index') }}" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 16px 20px; display: flex; flex-wrap: wrap; gap: 12px; align-items: center; justify-content: space-between;">
        <div style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; flex: 1;">
            <div style="position: relative; min-width: 240px; flex: 1;">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari teknologi, role, atau use case..."
                    style="width: 100%; border: 1px solid #cbd5e1; border-radius: 10px; padding: 8px 12px 8px 36px; font-size: 12px; outline: none;"
                />
                <svg style="position: absolute; left: 12px; top: 10px; width: 14px; height: 14px; color: #94a3b8;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <select name="category" onchange="this.form.submit()" style="border: 1px solid #cbd5e1; border-radius: 10px; padding: 8px 12px; font-size: 12px; outline: none; background: #fff; cursor: pointer;">
                <option value="all">Semua Kategori Layer</option>
                @foreach($categories as $cKey => $cMeta)
                    <option value="{{ $cKey }}" {{ request('category') === $cKey ? 'selected' : '' }}>{{ $cMeta['id'] }}</option>
                @endforeach
            </select>

            <select name="status" onchange="this.form.submit()" style="border: 1px solid #cbd5e1; border-radius: 10px; padding: 8px 12px; font-size: 12px; outline: none; background: #fff; cursor: pointer;">
                <option value="all">Semua Status</option>
                <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
            </select>
        </div>

        <div style="display: flex; gap: 8px;">
            <button type="submit" style="background: #0f172a; color: #fff; border: none; padding: 8px 16px; border-radius: 10px; font-size: 12px; font-weight: 700; cursor: pointer;">
                Filter
            </button>
            @if(request()->hasAny(['search', 'category', 'status']))
                <a href="{{ route('admin.technologies.index') }}" style="background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; padding: 8px 14px; border-radius: 10px; font-size: 12px; font-weight: 600; text-decoration: none;">
                    Reset
                </a>
            @endif
        </div>
    </form>

    {{-- Technologies Grid --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 20px;">
        @forelse($technologies as $tech)
            @php
                $catMeta = $categories[$tech->category] ?? ['id' => ucfirst($tech->category), 'badge_color' => 'bg-slate-50 text-slate-700 border-slate-200'];
            @endphp
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    {{-- Card Header: Logo, Name, Badge --}}
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; margin-bottom: 14px;">
                        <div style="display: flex; align-items: center; gap: 14px;">
                            <div style="width: 48px; height: 48px; border-radius: 14px; background: #f8fafc; border: 1px solid #e2e8f0; display: flex; align-items: center; justify-content: center; padding: 8px; flex-shrink: 0; box-shadow: inset 0 1px 2px rgba(0,0,0,0.04);">
                                <img
                                    src="{{ $tech->image }}"
                                    alt="{{ $tech->name }}"
                                    style="max-width: 100%; max-height: 100%; object-fit: contain;"
                                    onerror="this.src='https://cdn.jsdelivr.net/gh/devicons/devicon/icons/devicon/devicon-original.svg'"
                                />
                            </div>
                            <div>
                                <h3 style="font-size: 15px; font-weight: 800; color: #0f172a; margin: 0 0 2px 0;">{{ $tech->name }}</h3>
                                <div style="display: flex; align-items: center; gap: 6px;">
                                    <span style="font-size: 10px; font-weight: 700; padding: 2px 8px; border-radius: 9999px; background: #eff6ff; color: #1d4ed8; border: 1px solid #bfdbfe;">
                                        {{ $catMeta['id'] }}
                                    </span>
                                    @if($tech->version)
                                        <span style="font-size: 10px; color: #64748b; font-weight: 600;">{{ $tech->version }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div>
                            @if($tech->status === 'active')
                                <span style="font-size: 9.5px; font-weight: 800; padding: 3px 8px; border-radius: 9999px; background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; text-transform: uppercase;">
                                    Aktif
                                </span>
                            @else
                                <span style="font-size: 9.5px; font-weight: 800; padding: 3px 8px; border-radius: 9999px; background: #f1f5f9; color: #64748b; border: 1px solid #cbd5e1; text-transform: uppercase;">
                                    Draft
                                </span>
                            @endif
                        </div>
                    </div>

                    {{-- Role / Subtitle --}}
                    <div style="font-size: 12px; font-weight: 700; color: #2563eb; margin-bottom: 8px;">
                        {{ $tech->role }}
                    </div>

                    {{-- Description --}}
                    <div style="font-size: 12px; color: #475569; margin-bottom: 14px; line-height: 1.55;">
                        {{ Str::limit($tech->description, 130) }}
                    </div>

                    {{-- Performance & Use-Case Mini Box --}}
                    @if($tech->performance_metric || $tech->use_case)
                        <div style="background: #f8fafc; border-radius: 12px; padding: 10px 14px; margin-bottom: 14px; border: 1px solid #eef2f6; display: flex; flex-direction: column; gap: 4px;">
                            @if($tech->performance_metric)
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <span style="font-size: 10px; font-weight: 700; color: #64748b; text-transform: uppercase;">Benchmark / SLA:</span>
                                    <span style="font-size: 11px; font-weight: 800; color: #059669;">{{ $tech->performance_metric }}</span>
                                </div>
                            @endif
                            @if($tech->use_case)
                                <div style="font-size: 11px; color: #334155;">
                                    <strong style="font-weight: 700; color: #0f172a;">Kasus Pakai:</strong> {{ Str::limit($tech->use_case, 65) }}
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Tags / Features --}}
                    @if(!empty($tech->features) && is_array($tech->features))
                        <div style="display: flex; flex-wrap: wrap; gap: 5px; margin-bottom: 14px;">
                            @foreach(array_slice($tech->features, 0, 4) as $tag)
                                <span style="font-size: 10px; font-weight: 600; padding: 2px 7px; border-radius: 6px; background: #f1f5f9; color: #475569; border: 1px solid #e2e8f0;">
                                    {{ $tag }}
                                </span>
                            @endforeach
                            @if(count($tech->features) > 4)
                                <span style="font-size: 10px; font-weight: 600; color: #2563eb; padding: 2px 4px;">+{{ count($tech->features) - 4 }}</span>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Card Footer Actions --}}
                <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #f1f5f9; padding-top: 14px; margin-top: 8px;">
                    <div style="font-size: 11px; color: #94a3b8; font-weight: 600;">
                        Urutan: #{{ $tech->order }}
                    </div>

                    <div style="display: flex; gap: 8px;">
                        @if($tech->official_url)
                            <a href="{{ $tech->official_url }}" target="_blank" title="Dokumentasi Resmi" style="width: 32px; height: 32px; border-radius: 8px; border: 1px solid #e2e8f0; background: #fff; color: #64748b; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        @endif

                        <a href="{{ route('admin.technologies.edit', $tech->id) }}" title="Edit Teknologi" style="display: inline-flex; align-items: center; gap: 4px; padding: 6px 12px; border-radius: 8px; background: #eff6ff; color: #1d4ed8; font-size: 11px; font-weight: 700; text-decoration: none; border: 1px solid #bfdbfe;">
                            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            Edit
                        </a>

                        <form action="{{ route('admin.technologies.destroy', $tech->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus teknologi {{ $tech->name }} dari katalog?');" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" title="Hapus Teknologi" style="width: 32px; height: 32px; border-radius: 8px; border: 1px solid #fecaca; background: #fef2f2; color: #dc2626; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div style="grid-column: 1 / -1; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 16px; padding: 48px; text-align: center;">
                <div style="width: 48px; height: 48px; border-radius: 12px; background: #eff6ff; color: #2563eb; display: flex; align-items: center; justify-content: center; margin: 0 auto 14px auto;">
                    <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                </div>
                <h3 style="font-size: 15px; font-weight: 700; color: #0f172a; margin: 0 0 6px 0;">Belum ada teknologi yang cocok</h3>
                <p style="font-size: 12px; color: #64748b; margin: 0 0 16px 0;">Ubah kata kunci filter Anda atau tambahkan stack rekayasa baru ke sistem.</p>
                <a href="{{ route('admin.technologies.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; padding: 9px 18px; border-radius: 10px; text-decoration: none;">
                    + Tambah Teknologi Sekarang
                </a>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($technologies->hasPages())
        <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 12px 18px;">
            {{ $technologies->links() }}
        </div>
    @endif

</div>
@endsection

