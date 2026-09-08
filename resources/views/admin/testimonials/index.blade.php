@extends('layouts.admin.app')

@section('title', 'Testimonial Klien — VizzioCraft')
@section('page_title', 'Testimonial Klien')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Ulasan & Testimonial Klien</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola feedback kepuasan mitra, rating bintang 5, dan testimoni proyek untuk membangun kredibilitas.</p>
        </div>
        <a href="{{ route('admin.testimonials.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah Testimonial
        </a>
    </div>

    {{-- Testimonials Grid --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 20px;">
        @forelse($testimonials as $t)
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                        <div style="display: flex; gap: 3px; color: #f59e0b;">
                            @for($i = 1; $i <= 5; $i++)
                                <svg width="16" height="16" fill="{{ $i <= $t->rating ? '#f59e0b' : '#e2e8f0' }}" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/></svg>
                            @endfor
                        </div>
                        @if($t->status === 'published')
                            <span style="font-size: 9.5px; font-weight: 800; padding: 2px 7px; border-radius: 6px; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">PUBLISHED</span>
                        @else
                            <span style="font-size: 9.5px; font-weight: 800; padding: 2px 7px; border-radius: 6px; background: #fef2f2; color: #dc2626; border: 1px solid #fecaca;">DRAFT</span>
                        @endif
                    </div>

                    <div style="font-size: 12.5px; color: #334155; line-height: 1.6; font-style: italic; margin-bottom: 14px; background: #f8fafc; padding: 12px 14px; border-radius: 12px; border: 1px solid #eef2f6;">
                        &ldquo;{{ $t->comment }}&rdquo;
                    </div>

                    <div>
                        <div style="font-size: 13px; font-weight: 800; color: #0f172a;">{{ $t->name }}</div>
                        <div style="font-size: 11px; color: #64748b;">
                            {{ $t->title ? $t->title . ', ' : '' }}<strong>{{ $t->company }}</strong>
                        </div>
                        @if($t->project)
                            <div style="font-size: 10.5px; color: #2563eb; font-weight: 600; margin-top: 2px;">
                                Proyek: {{ $t->project }}
                            </div>
                        @endif
                    </div>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #f1f5f9; padding-top: 14px; margin-top: 12px;">
                    <span style="font-size: 10.5px; color: #94a3b8;">{{ $t->date ?: $t->created_at->format('M Y') }}</span>
                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.testimonials.edit', $t->id) }}" style="padding: 6px 12px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; text-decoration: none; border: 1px solid #bfdbfe;">
                            Edit
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')" style="margin: 0; display: inline;">
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
                Belum ada testimonial klien yang ditambahkan.
            </div>
        @endforelse
    </div>

</div>
@endsection
