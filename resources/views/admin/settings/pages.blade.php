@extends('layouts.admin.app')

@section('title', 'Halaman Statis — VizzioCraft')
@section('page_title', 'Halaman Statis')

@section('content')
<div style="display: flex; flex-direction: column; gap: 24px;">

    {{-- Top Header --}}
    <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px;">
        <div>
            <div style="display: inline-flex; align-items: center; gap: 6px; padding: 3px 10px; border-radius: 9999px; background: #eff6ff; color: #2563eb; font-size: 11px; font-weight: 700; margin-bottom: 6px; border: 1px solid #bfdbfe;">
                Pengaturan & Halaman
            </div>
            <h1 style="font-size: 22px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Manajemen Halaman Statis Situs Web</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Konfigurasi struktur rute statis, judul SEO per halaman, status publikasi, dan komponen tampilan.</p>
        </div>
        <div style="display: flex; gap: 8px;">
            <a href="/" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; padding: 10px 16px; border-radius: 12px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; text-decoration: none;">
                Buka Website Publik &rarr;
            </a>
        </div>
    </div>

    {{-- Static Pages Table Card --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,0.03);">
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 12px;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0; text-align: left;">
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Halaman & URL</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">File Template Blade</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Seksi & Komponen</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px;">Status</th>
                        <th style="padding: 12px; color: #64748b; font-weight: 700; text-transform: uppercase; font-size: 10.5px; text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $p)
                        <tr style="border-bottom: 1px solid #f1f5f9;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 14px 12px; max-width: 280px;">
                                <div style="font-size: 13px; font-weight: 800; color: #0f172a;">{{ $p['title'] }}</div>
                                <a href="{{ $p['url'] }}" target="_blank" style="font-size: 11px; color: #2563eb; font-weight: 600; text-decoration: none; font-family: monospace;">
                                    {{ $p['url'] }} &nearr;
                                </a>
                                @if(!empty($p['meta_desc']))
                                    <div style="font-size: 10.5px; color: #94a3b8; margin-top: 3px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $p['meta_desc'] }}</div>
                                @endif
                            </td>
                            <td style="padding: 12px; font-family: monospace; color: #64748b; font-size: 11px;">
                                {{ $p['template'] }}
                            </td>
                            <td style="padding: 12px;">
                                <div style="display: flex; flex-wrap: wrap; gap: 4px; max-width: 320px;">
                                    @foreach($p['sections'] as $sec)
                                        <span style="font-size: 10px; font-weight: 600; padding: 2px 7px; border-radius: 6px; background: #f1f5f9; color: #475569;">
                                            {{ $sec }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td style="padding: 12px;">
                                @if(($p['status'] ?? 'published') === 'published')
                                    <span style="display: inline-flex; align-items: center; gap: 4px; font-size: 10px; font-weight: 800; padding: 3px 8px; border-radius: 6px; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                                        <span style="width: 5px; height: 5px; border-radius: 50%; background: #10b981;"></span>
                                        PUBLISHED
                                    </span>
                                @else
                                    <span style="font-size: 10px; font-weight: 800; padding: 3px 8px; border-radius: 6px; background: #fffbeb; color: #d97706; border: 1px solid #fde68a;">
                                        DRAFT
                                    </span>
                                @endif
                            </td>
                            <td style="padding: 12px; text-align: right; white-space: nowrap;">
                                <button type="button" onclick="openEditModal({{ json_encode($p) }})" style="padding: 6px 12px; border-radius: 8px; background: #eff6ff; color: #2563eb; font-weight: 700; font-size: 11px; border: 1px solid #bfdbfe; cursor: pointer; font-family: 'Poppins', sans-serif;">
                                    Edit Halaman
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- Edit Static Page Modal --}}
<div id="editPageModal" style="display: none; position: fixed; inset: 0; background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px); z-index: 999; align-items: center; justify-content: center; padding: 20px;">
    <div style="background: #ffffff; border-radius: 20px; max-width: 540px; width: 100%; padding: 26px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.2);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px;">
            <div>
                <h2 style="font-size: 16px; font-weight: 800; color: #0f172a; margin: 0;">Pengaturan Halaman Statis</h2>
                <div id="modalPageSlug" style="font-size: 11px; color: #2563eb; font-family: monospace; margin-top: 2px;">/</div>
            </div>
            <button type="button" onclick="closeEditModal()" style="border: none; background: transparent; font-size: 22px; color: #94a3b8; cursor: pointer;">&times;</button>
        </div>

        <form id="editPageForm" method="POST" action="" style="display: flex; flex-direction: column; gap: 16px;">
            @csrf
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Judul Halaman Publik *</label>
                <input type="text" id="modalPageTitle" name="title" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">SEO Meta Title Tag</label>
                <input type="text" id="modalMetaTitle" name="meta_title" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">SEO Meta Description</label>
                <textarea id="modalMetaDesc" name="meta_desc" rows="3" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;"></textarea>
            </div>

            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Akses Halaman *</label>
                <select id="modalStatus" name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                    <option value="published">Published (Dapat Diakses Publik)</option>
                    <option value="draft">Draft (Mode Pemeliharaan/Privat)</option>
                </select>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 10px; border-top: 1px solid #f1f5f9; padding-top: 16px;">
                <button type="button" onclick="closeEditModal()" style="padding: 10px 18px; border-radius: 10px; background: #f1f5f9; color: #64748b; font-size: 12px; font-weight: 600; border: none; cursor: pointer;">Batal</button>
                <button type="submit" style="padding: 10px 22px; border-radius: 10px; background: #2563eb; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">Simpan Halaman</button>
            </div>
        </form>
    </div>
</div>

<script>
function openEditModal(page) {
    document.getElementById('editPageForm').action = '/admin/settings/pages/' + page.id;
    document.getElementById('modalPageTitle').value = page.title || '';
    document.getElementById('modalPageSlug').innerText = 'Rute URL: ' + page.url;
    document.getElementById('modalMetaTitle').value = page.meta_title || '';
    document.getElementById('modalMetaDesc').value = page.meta_desc || '';
    document.getElementById('modalStatus').value = page.status || 'published';
    document.getElementById('editPageModal').style.display = 'flex';
}
function closeEditModal() {
    document.getElementById('editPageModal').style.display = 'none';
}
</script>
@endsection
