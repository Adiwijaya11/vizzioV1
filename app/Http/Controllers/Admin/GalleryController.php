<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $mediaAssets = [
            [
                'id'        => 1,
                'name'      => 'Hero Organic Blob Sheen',
                'url'       => '/resources/views/components/hero-blob.blade.php',
                'type'      => 'SVG Graphic',
                'category'  => 'Hero Vector',
                'size'      => '3.2 KB',
                'dims'      => '1200 x 900 px',
                'preview'   => 'svg',
                'created_at'=> '01 Sep 2026',
            ],
            [
                'id'        => 2,
                'name'      => 'VizzioCraft Brand Logo Icon',
                'url'       => '/resources/views/components/logo.blade.php',
                'type'      => 'Vector Icon',
                'category'  => 'Brand Identity',
                'size'      => '1.5 KB',
                'dims'      => '36 x 36 px (Scalable)',
                'preview'   => 'logo',
                'created_at'=> '01 Sep 2026',
            ],
            [
                'id'        => 3,
                'name'      => 'Company Collaboration Showcase',
                'url'       => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Company Page',
                'size'      => '420 KB',
                'dims'      => '1200 x 800 px',
                'preview'   => 'image',
                'created_at'=> '02 Sep 2026',
            ],
            [
                'id'        => 4,
                'name'      => 'Leadership — Adrian Pratama (CEO)',
                'url'       => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=600&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Team Photo',
                'size'      => '180 KB',
                'dims'      => '600 x 600 px',
                'preview'   => 'image',
                'created_at'=> '03 Sep 2026',
            ],
            [
                'id'        => 5,
                'name'      => 'Leadership — Reza Kurniawan (CTO)',
                'url'       => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Team Photo',
                'size'      => '195 KB',
                'dims'      => '600 x 600 px',
                'preview'   => 'image',
                'created_at'=> '03 Sep 2026',
            ],
            [
                'id'        => 6,
                'name'      => 'Leadership — Sarah Wijaya (UI/UX)',
                'url'       => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'Team Photo',
                'size'      => '210 KB',
                'dims'      => '600 x 600 px',
                'preview'   => 'image',
                'created_at'=> '03 Sep 2026',
            ],
            [
                'id'        => 7,
                'name'      => 'News Cover — Cloud Native Architecture',
                'url'       => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=800&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'News Cover',
                'size'      => '315 KB',
                'dims'      => '800 x 500 px',
                'preview'   => 'image',
                'created_at'=> '04 Sep 2026',
            ],
            [
                'id'        => 8,
                'name'      => 'News Cover — AI Business Integration',
                'url'       => 'https://images.unsplash.com/photo-1677442136019-21780efad99a?auto=format&fit=crop&w=800&q=80',
                'type'      => 'JPEG Image',
                'category'  => 'News Cover',
                'size'      => '290 KB',
                'dims'      => '800 x 500 px',
                'preview'   => 'image',
                'created_at'=> '05 Sep 2026',
            ],
        ];

        return view('admin.gallery.index', compact('mediaAssets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'url'      => 'required|url',
            'category' => 'required|string',
        ]);

        AuditLog::create([
            'user_id'     => session('user_id'),
            'user_name'   => session('user_name', 'Admin'),
            'action'      => 'upload_media',
            'description' => "Menambahkan aset media visual baru: '{$request->name}'",
            'ip_address'  => $request->ip(),
            'user_agent'  => $request->userAgent(),
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Aset media visual berhasil ditambahkan!');
    }
}
