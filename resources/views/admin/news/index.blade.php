@extends('layouts.admin.app')

@section('title', 'Berita & Artikel — VizzioCraft')
@section('page_title', 'Berita & Artikel')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-xl sm:text-2xl font-bold text-slate-900 tracking-tight">Manajemen Berita & Artikel</h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-0.5">Kelola publikasi artikel, wawasan teknologi, dan berita resmi VizzioCraft.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold shadow-sm shadow-blue-600/20 transition shrink-0">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tulis Artikel Baru
        </a>
    </div>

    {{-- Filter & Search --}}
    <div class="bg-white border border-slate-200/80 rounded-2xl p-4 shadow-xs">
        <form method="GET" action="{{ route('admin.news.index') }}" class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <div class="relative flex-1">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari judul artikel atau deskripsi..."
                    class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-800 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition"
                >
            </div>
            <select name="category" class="px-3.5 py-2.5 rounded-xl border border-slate-200 bg-slate-50/50 text-xs sm:text-sm text-slate-700 focus:bg-white focus:border-blue-600 focus:ring-4 focus:ring-blue-600/10 outline-none transition">
                <option value="all">Semua Kategori</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->category }}" {{ request('category') == $cat->category ? 'selected' : '' }}>
                        {{ $cat->category_label_id ?: ucfirst($cat->category) }}
                    </option>
                @endforeach
            </select>
            <div class="flex items-center gap-2 shrink-0">
                <button type="submit" class="px-4 py-2.5 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold cursor-pointer transition">
                    Filter
                </button>
                @if(request('search') || (request('category') && request('category') !== 'all'))
                    <a href="{{ route('admin.news.index') }}" class="px-3.5 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-600 text-xs font-semibold transition">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- Articles Table --}}
    <div class="bg-white border border-slate-200/80 rounded-2xl p-5 sm:p-6 shadow-xs">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead>
                    <tr class="bg-slate-50 border-y border-slate-100 text-[10.5px] font-bold text-slate-500 uppercase tracking-wider">
                        <th class="py-3 px-3 rounded-l-lg">Artikel</th>
                        <th class="py-3 px-3">Kategori</th>
                        <th class="py-3 px-3">Status</th>
                        <th class="py-3 px-3">Views</th>
                        <th class="py-3 px-3">Tanggal</th>
                        <th class="py-3 px-3 text-right rounded-r-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($articles as $art)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="py-3.5 px-3 max-w-[340px]">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $art->image ?: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=200&q=80' }}"
                                         class="w-11 h-11 rounded-xl object-cover border border-slate-200 shrink-0"
                                         alt="thumbnail">
                                    <div class="min-w-0">
                                        <div class="text-xs sm:text-[13px] font-bold text-slate-900 truncate">{{ $art->title_id }}</div>
                                        <div class="text-[11px] text-slate-500 truncate mt-0.5">{{ Str::limit($art->desc_id, 55) }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                <span class="inline-block px-2.5 py-1 rounded-lg bg-blue-50 text-blue-700 border border-blue-100 text-[10.5px] font-semibold">
                                    {{ $art->category_label_id ?: ucfirst($art->category) }}
                                </span>
                            </td>
                            <td class="py-3.5 px-3 whitespace-nowrap">
                                @if($art->status === 'published')
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10.5px] font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-slate-100 text-slate-600 border border-slate-200 text-[10.5px] font-semibold">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-3 font-semibold text-slate-700 tabular-nums whitespace-nowrap">
                                {{ number_format($art->views ?? 0) }}
                            </td>
                            <td class="py-3.5 px-3 text-slate-500 tabular-nums whitespace-nowrap">
                                {{ $art->published_at ? \Carbon\Carbon::parse($art->published_at)->format('d M Y') : $art->created_at->format('d M Y') }}
                            </td>
                            <td class="py-3.5 px-3 text-right whitespace-nowrap">
                                <div class="inline-flex items-center gap-1.5">
                                    <a href="/news" target="_blank" title="Lihat di web" class="p-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 transition">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('admin.news.edit', $art->id) }}" title="Edit artikel" class="px-3 py-1.5 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 border border-blue-200 text-[11px] font-semibold transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $art->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus artikel" class="px-3 py-1.5 rounded-lg bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 text-[11px] font-semibold cursor-pointer transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-10 text-center text-slate-400">
                                Tidak ditemukan artikel berita yang sesuai kriteria pencarian.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($articles->hasPages())
            <div class="mt-5 pt-4 border-t border-slate-100">
                {{ $articles->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
