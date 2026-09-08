@extends('layouts.admin.app')

@section('title', 'Manajemen Tim — VizzioCraft')
@section('page_title', 'Manajemen Tim')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Struktur Tim & Pimpinan Perusahaan</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola profil eksekutif, rekayasawan senior, dan talenta profesional di balik VizzioCraft.</p>
        </div>
        <a href="{{ route('admin.team.create') }}" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah Anggota Tim
        </a>
    </div>

    {{-- Team Grid --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
        @forelse($members as $m)
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 22px; box-shadow: 0 1px 3px rgba(0,0,0,0.02); display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div style="display: flex; align-items: center; gap: 14px; margin-bottom: 14px;">
                        <img src="{{ $m->image ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=300&q=80' }}" alt="{{ $m->name }}" style="width: 56px; height: 56px; border-radius: 14px; object-fit: cover; border: 2px solid #eff6ff; shrink-0: 0;">
                        <div style="min-width: 0;">
                            <h3 style="font-size: 14px; font-weight: 800; color: #0f172a; margin: 0; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $m->name }}</h3>
                            <div style="font-size: 11.5px; font-weight: 600; color: #2563eb;">{{ $m->role }}</div>
                            <div style="font-size: 10.5px; color: #64748b;">{{ $m->dept }}</div>
                        </div>
                    </div>

                    <div style="font-size: 11.5px; color: #475569; line-height: 1.5; margin-bottom: 14px; background: #f8fafc; padding: 10px 12px; border-radius: 10px; border: 1px solid #eef2f6;">
                        {{ $m->bio }}
                    </div>

                    @if($m->tag)
                        <div style="margin-bottom: 12px;">
                            <span style="font-size: 10px; font-weight: 700; background: #ede9fe; color: #7c3aed; padding: 2px 8px; border-radius: 6px; border: 1px solid #ddd6fe;">
                                {{ $m->tag }}
                            </span>
                        </div>
                    @endif
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #f1f5f9; padding-top: 14px; margin-top: 8px;">
                    <div>
                        @if($m->status === 'active')
                            <span style="font-size: 10px; font-weight: 700; color: #059669; display: flex; align-items: center; gap: 4px;">
                                <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981;"></span>
                                Aktif di Tim
                            </span>
                        @else
                            <span style="font-size: 10px; font-weight: 700; color: #94a3b8;">
                                Non-Aktif
                            </span>
                        @endif
                    </div>

                    <div style="display: flex; gap: 6px;">
                        <a href="{{ route('admin.team.edit', $m->id) }}" style="padding: 6px 12px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; text-decoration: none; border: 1px solid #bfdbfe;">
                            Edit
                        </a>
                        <form action="{{ route('admin.team.destroy', $m->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota tim ini?')" style="margin: 0; display: inline;">
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
                Belum ada data anggota tim yang terdaftar.
            </div>
        @endforelse
    </div>

</div>
@endsection
