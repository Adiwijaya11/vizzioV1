@extends('layouts.admin.app')

@section('title', 'Galeri Media — VizzioCraft')
@section('page_title', 'Galeri Media')

@section('content')
<div style="display:flex; flex-direction:column; gap:24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Galeri & Manajemen Aset Media</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Kelola aset visual, ilustrasi hero, foto tim kepemimpinan, dan cover artikel berita.</p>
        </div>
        <button type="button" onclick="document.getElementById('uploadModal').style.display='flex'" style="display: inline-flex; align-items: center; gap: 8px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; padding: 10px 18px; border-radius: 12px; border: none; cursor: pointer; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
            <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
            Tambah Aset Media
        </button>
    </div>

    {{-- Media Asset Cards Grid --}}
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 18px;">
        @foreach($mediaAssets as $asset)
            <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 18px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.02); display: flex; flex-direction: column;">
                <div style="height: 160px; background: #f8fafc; border-bottom: 1px solid #f1f5f9; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                    @if($asset['preview'] === 'svg')
                        <div style="padding: 20px; text-align: center;">
                            <div style="width: 60px; height: 60px; border-radius: 14px; background: #eff6ff; color: #2563eb; margin: 0 auto 8px; display: flex; align-items: center; justify-content: center;">
                                <svg width="32" height="32" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                            <span style="font-size: 11px; font-weight: 700; color: #2563eb;">Blade SVG Vector</span>
                        </div>
                    @elseif($asset['preview'] === 'logo')
                        <div style="width: 54px; height: 54px; border-radius: 16px; background: #2563eb; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 16px rgba(37,99,235,0.3);">
                            <span style="color: #fff; font-weight: 900; font-size: 20px;">V</span>
                        </div>
                    @else
                        <img src="{{ $asset['url'] }}" alt="{{ $asset['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                    @endif
                    <span style="position: absolute; top: 10px; right: 10px; padding: 2px 8px; border-radius: 6px; background: rgba(15, 23, 42, 0.7); backdrop-filter: blur(4px); color: #fff; font-size: 9.5px; font-weight: 700;">
                        {{ $asset['type'] }}
                    </span>
                </div>

                <div style="padding: 16px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <div style="font-size: 12.5px; font-weight: 700; color: #0f172a; margin-bottom: 4px; line-height: 1.4;">{{ $asset['name'] }}</div>
                        <div style="display: flex; gap: 8px; font-size: 11px; color: #64748b; margin-bottom: 12px;">
                            <span>{{ $asset['category'] }}</span>
                            &bull;
                            <span>{{ $asset['size'] }}</span>
                        </div>
                    </div>

                    <div style="display: flex; gap: 6px; align-items: center;">
                        <button type="button" onclick="navigator.clipboard.writeText('{{ $asset['url'] }}'); alert('URL aset berhasil disalin ke clipboard!');" style="flex: 1; padding: 7px 10px; border-radius: 8px; background: #f1f5f9; color: #475569; font-size: 11px; font-weight: 700; border: 1px solid #e2e8f0; cursor: pointer; font-family: 'Poppins', sans-serif; display: flex; align-items: center; justify-content: center; gap: 6px;">
                            <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            Salin URL
                        </button>
                        <a href="{{ $asset['url'] }}" target="_blank" style="padding: 7px 10px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; text-decoration: none; border: 1px solid #bfdbfe;">
                            Buka
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>

{{-- Add Asset Modal --}}
<div id="uploadModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 999; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: #ffffff; border-radius: 20px; max-width: 500px; width: 100%; padding: 26px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.2);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <h2 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">Tambah Entri Aset Media</h2>
            <button type="button" onclick="document.getElementById('uploadModal').style.display='none'" style="border: none; background: transparent; font-size: 20px; color: #94a3b8; cursor: pointer;">&times;</button>
        </div>

        <form action="{{ route('admin.gallery.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
            @csrf
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Nama Aset Media *</label>
                <input type="text" name="name" required placeholder="Contoh: Banner Event Tech 2026" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Aset Media *</label>
                <input type="url" name="url" required placeholder="https://images.unsplash.com/photo-..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kategori *</label>
                <select name="category" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="News Cover">News Cover</option>
                    <option value="Team Photo">Team Photo</option>
                    <option value="Company Page">Company Page</option>
                    <option value="Hero Vector">Hero Vector</option>
                    <option value="Brand Identity">Brand Identity</option>
                </select>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 8px;">
                <button type="button" onclick="document.getElementById('uploadModal').style.display='none'" style="padding: 10px 18px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; border: none; cursor: pointer;">Batal</button>
                <button type="submit" style="padding: 10px 22px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">Simpan Aset</button>
            </div>
        </form>
    </div>
</div>
@endsection
