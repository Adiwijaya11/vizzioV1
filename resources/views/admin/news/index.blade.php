@extends('layouts.admin.app')

@section('title', 'Berita & Artikel — VizzioCraft')
@section('page_title', 'Berita & Artikel')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Action Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Manajemen Berita & Artikel</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola publikasi wawasan teknologi, artikel edukasi, dan berita resmi perusahaan VizzioCraft.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25); transition: all 0.15s;">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tulis Artikel Baru
        </a>
    </div>

    {{-- Filter & Search Card --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; padding: 16px 20px; box-shadow: 0 1px 3px rgba(0,0,0,0.02);">
        <form method="GET" action="{{ route('admin.news.index') }}" style="display: flex; flex-wrap: wrap; gap: 12px; align-items: center; margin: 0;">
            <div style="flex: 1; min-width: 220px; position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul artikel atau deskripsi..." style="width: 100%; padding: 9px 14px 9px 36px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; outline: none; font-family: 'Poppins', sans-serif;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #94a3b8;"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <select name="category" style="padding: 9px 14px; border: 1px solid #e2e8f0; border-radius: 10px; font-size: 12px; color: #475569; outline: none; background: #fff; font-family: 'Poppins', sans-serif;">
                <option value="all">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->category }}" {{ request('category') == $cat->category ? 'selected' : '' }}>{{ $cat->category_label_id ?: ucfirst($cat->category) }}</option>
                @endforeach
            </select>
            <button type="submit" style="padding: 9px 18px; border-radius: 10px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                Filter
            </button>
            @if(request('search') || (request('category') && request('category') !== 'all'))
                <a href="{{ route('admin.news.index') }}" style="padding: 9px 14px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; text-decoration: none;">Reset</a>
            @endif
        </form>
    </div>

    {{-- Articles Table Card --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Artikel</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Kategori</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Status</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Views</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Tanggal</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $art)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 14px 12px; max-width: 340px;">
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <img src="{{ $art->image ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=200&q=80' }}" style="width: 46px; height: 46px; border-radius: 10px; object-fit: cover; border: 1px solid #e2e8f0; shrink-0: 0;" alt="thumbnail">
                                    <div style="min-width: 0;">
                                        <div style="font-size: 13px; font-weight: 700; color: #0f172a; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $art->title_id }}</div>
                                        <div style="font-size: 11px; color: #64748b; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ Str::limit($art->desc_id, 50) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td style="padding: 12px;">
                                <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #eff6ff; color: #2563eb; font-size: 10px; font-weight: 700; border: 1px solid #bfdbfe;">
                                    {{ $art->category_label_id ?: ucfirst($art->category) }}
                                </span>
                            </td>
                            <td style="padding: 12px;">
                                @if($art->status === 'published')
                                    <span style="display: inline-flex; align-items: center; gap: 4px; padding: 3px 8px; border-radius: 6px; background: #ecfdf5; color: #059669; font-size: 10px; font-weight: 700; border: 1px solid #a7f3d0;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: #10b981;"></span>
                                        Published
                                    </span>
                                @else
                                    <span style="display: inline-block; padding: 3px 8px; border-radius: 6px; background: #fef2f2; color: #dc2626; font-size: 10px; font-weight: 700; border: 1px solid #fecaca;">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 12px; color: #475569; font-weight: 600;">{{ number_format($art->views ?? 0) }}</td>
                            <td style="padding: 12px; color: #64748b; font-size: 11px;">
                                {{ $art->published_at ? \Carbon\Carbon::parse($art->published_at)->format('d M Y') : $art->created_at->format('d M Y') }}
                            </td>
                            <td style="padding: 12px; text-align: right;">
                                <div style="display: inline-flex; align-items: center; gap: 6px;">
                                    <a href="/news" target="_blank" title="Lihat di web" style="padding: 6px; border-radius: 8px; background: #f1f5f9; color: #475569; text-decoration: none; display: flex; align-items: center;">
                                        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $art->id) }}" title="Edit artikel" style="padding: 6px 10px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 11px; text-decoration: none; border: 1px solid #bfdbfe;">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')" style="margin: 0; display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus artikel" style="padding: 6px 10px; border-radius: 8px; background: #fef2f2; color: #dc2626; font-weight: 700; font-size: 11px; border: 1px solid #fecaca; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="padding: 32px; text-align: center; color: #94a3b8;">
                                Tidak ditemukan artikel berita yang sesuai kriteria pencarian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($articles->hasPages())
            <div style="margin-top: 20px;">
                {{ $articles->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
