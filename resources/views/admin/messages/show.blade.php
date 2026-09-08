@extends('layouts.admin.app')

@section('title', 'Rincian Pesan — VizzioCraft')
@section('page_title', 'Rincian Pesan')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Detail Pesan Masuk</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Dari: <strong style="color: #2563eb;">{{ $message->name }}</strong> &bull; {{ $message->email }}</p>
        </div>
        <a href="{{ route('admin.messages.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
            &larr; Kembali ke Kotak Masuk
        </a>
    </div>

    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        
        {{-- Metadata Row --}}
        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: flex-start; gap: 16px; border-bottom: 1px solid #f1f5f9; padding-bottom: 20px; margin-bottom: 20px;">
            <div>
                <div style="font-size: 18px; font-weight: 800; color: #0f172a; margin-bottom: 6px;">
                    {{ $message->subject ?: 'Konsultasi Layanan VizzioCraft' }}
                </div>
                <div style="display: flex; flex-wrap: wrap; gap: 14px; font-size: 12px; color: #64748b;">
                    <span>Pengirim: <strong style="color: #1e293b;">{{ $message->name }}</strong></span>
                    <span>Email: <a href="mailto:{{ $message->email }}" style="color: #2563eb; font-weight: 600; text-decoration: none;">{{ $message->email }}</a></span>
                    @if($message->phone)
                        <span>Telepon: <strong style="color: #1e293b;">{{ $message->phone }}</strong></span>
                    @endif
                </div>
            </div>

            <div style="text-align: right;">
                <div style="font-size: 11px; color: #94a3b8; margin-bottom: 6px;">
                    Diterima: {{ $message->created_at->format('d M Y, H:i') }} WIB
                </div>
                <div>
                    @if($message->status === 'replied')
                        <span style="font-size: 10px; font-weight: 800; padding: 3px 9px; border-radius: 6px; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0;">
                            TELAH DIBALAS
                        </span>
                    @else
                        <span style="font-size: 10px; font-weight: 800; padding: 3px 9px; border-radius: 6px; background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe;">
                            TERBACA (READ)
                        </span>
                    @endif
                </div>
            </div>
        </div>

        {{-- Message Body --}}
        <div style="font-size: 13.5px; line-height: 1.7; color: #334155; white-space: pre-line; background: #f8fafc; padding: 22px; border-radius: 14px; border: 1px solid #eef2f6; margin-bottom: 24px;">
            {{ $message->message }}
        </div>

        {{-- Actions Bar --}}
        <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 16px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <div style="display: flex; gap: 10px; align-items: center;">
                <form action="{{ route('admin.messages.update', $message->id) }}" method="POST" style="margin: 0; display: flex; gap: 8px; align-items: center;">
                    @csrf
                    @method('PATCH')
                    <label style="font-size: 12px; font-weight: 600; color: #64748b;">Ubah Status:</label>
                    <select name="status" style="padding: 7px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="read" {{ $message->status === 'read' ? 'selected' : '' }}>Read</option>
                        <option value="replied" {{ $message->status === 'replied' ? 'selected' : '' }}>Replied</option>
                        <option value="unread" {{ $message->status === 'unread' ? 'selected' : '' }}>Unread</option>
                    </select>
                    <button type="submit" style="padding: 7px 14px; border-radius: 8px; background: #0f172a; color: #fff; font-size: 12px; font-weight: 700; border: none; cursor: pointer; font-family: 'Poppins', sans-serif;">
                        Update
                    </button>
                </form>
            </div>

            <div style="display: flex; gap: 10px; align-items: center;">
                <a href="mailto:{{ $message->email }}?subject=Re: {{ rawurlencode($message->subject ?: 'Konsultasi VizzioCraft') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 18px; border-radius: 10px; background: #2563eb; color: #ffffff; font-weight: 700; font-size: 12px; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    Balas via Email Klien
                </a>

                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini secara permanen?')" style="margin: 0; display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding: 8px 16px; border-radius: 10px; background: #fef2f2; color: #dc2626; font-size: 12px; font-weight: 700; border: 1px solid #fecaca; cursor: pointer; font-family: 'Poppins', sans-serif;">
                        Hapus Pesan
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
