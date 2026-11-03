@extends('layouts.admin.app')

@section('title', 'Edit Event — ' . $event->title . ' — VizzioCraft')
@section('page_title', 'Edit Event')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    {{-- Top Bar --}}
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Edit Event: {{ $event->title }}</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Perbarui rincian jadwal, pembicara, kuota peserta, dan informasi event.</p>
        </div>
        <div style="display: flex; align-items: center; gap: 8px;">
            <a href="/events/{{ $event->slug }}" target="_blank" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #fff; border: 1px solid #cbd5e1; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
                Lihat di Web &rarr;
            </a>
            <a href="{{ route('admin.events.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
                &larr; Kembali
            </a>
        </div>
    </div>

    {{-- Error Banner --}}
    @if ($errors->any())
        <div style="padding: 14px 18px; border-radius: 14px; background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; font-size: 12px;">
            <div style="font-weight: 700; margin-bottom: 6px;">Harap periksa kesalahan input berikut:</div>
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Card --}}
    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Judul Event *</label>
                <input type="text" name="title" value="{{ old('title', $event->title) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            {{-- Type & Format --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tipe Event *</label>
                    <select name="type" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="workshop" {{ old('type', $event->type) == 'workshop' ? 'selected' : '' }}>Workshop (Hands-on)</option>
                        <option value="webinar" {{ old('type', $event->type) == 'webinar' ? 'selected' : '' }}>Webinar (Online)</option>
                        <option value="seminar" {{ old('type', $event->type) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                        <option value="meetup" {{ old('type', $event->type) == 'meetup' ? 'selected' : '' }}>Meetup Komunitas</option>
                        <option value="bootcamp" {{ old('type', $event->type) == 'bootcamp' ? 'selected' : '' }}>Bootcamp Intensif</option>
                        <option value="hackathon" {{ old('type', $event->type) == 'hackathon' ? 'selected' : '' }}>Hackathon & Kompetisi</option>
                        <option value="talk" {{ old('type', $event->type) == 'talk' ? 'selected' : '' }}>Tech Talk</option>
                    </select>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Format Pelaksanaan *</label>
                    <select name="format" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="offline" {{ old('format', $event->format) == 'offline' ? 'selected' : '' }}>Offline (Tatap Muka Langsung)</option>
                        <option value="online" {{ old('format', $event->format) == 'online' ? 'selected' : '' }}>Online (Zoom / Meet)</option>
                        <option value="hybrid" {{ old('format', $event->format) == 'hybrid' ? 'selected' : '' }}>Hybrid (Offline & Streaming)</option>
                    </select>
                </div>
            </div>

            {{-- Date, Start Time, End Time --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tanggal Event *</label>
                    <input type="date" name="event_date" value="{{ old('event_date', $event->event_date ? $event->event_date->format('Y-m-d') : '') }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Jam Mulai</label>
                    <input type="time" name="start_time" value="{{ old('start_time', substr($event->start_time, 0, 5)) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Jam Selesai</label>
                    <input type="time" name="end_time" value="{{ old('end_time', substr($event->end_time, 0, 5)) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Location & Location URL --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Lokasi / Tempat</label>
                    <input type="text" name="location" value="{{ old('location', $event->location) }}" placeholder="Contoh: VizzioCraft HQ, Surabaya / Zoom" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">URL Maps / Tautan Meeting</label>
                    <input type="url" name="location_url" value="{{ old('location_url', $event->location_url) }}" placeholder="https://maps.google.com/..." style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Speaker, Capacity, Registered, Price --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Pembicara / Fasilitator</label>
                    <input type="text" name="speaker" value="{{ old('speaker', $event->speaker) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kapasitas Kursi</label>
                    <input type="number" name="capacity" value="{{ old('capacity', $event->capacity) }}" min="1" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Peserta Terdaftar</label>
                    <input type="number" name="registered" value="{{ old('registered', $event->registered) }}" min="0" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Harga Tiket (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price', (int)$event->price) }}" required min="0" step="1000" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Registration URL & Status --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tautan Pendaftaran</label>
                    <input type="url" name="registration_url" value="{{ old('registration_url', $event->registration_url) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Event *</label>
                    <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <option value="upcoming" {{ old('status', $event->status) == 'upcoming' ? 'selected' : '' }}>Akan Datang (Upcoming)</option>
                        <option value="ongoing" {{ old('status', $event->status) == 'ongoing' ? 'selected' : '' }}>Sedang Berlangsung (Ongoing)</option>
                        <option value="completed" {{ old('status', $event->status) == 'completed' ? 'selected' : '' }}>Selesai (Completed)</option>
                        <option value="cancelled" {{ old('status', $event->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan (Cancelled)</option>
                    </select>
                </div>
            </div>

            {{-- Image Upload / URL & Preview --}}
            <div style="background: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 14px; padding: 18px; display: flex; flex-direction: column; gap: 14px;">
                <div>
                    <label style="display: block; font-size: 12.5px; font-weight: 700; color: #0f172a; margin-bottom: 2px;">Gambar Banner Event</label>
                    <p style="font-size: 11.5px; color: #64748b; margin: 0;">Upload file gambar baru dari perangkat Anda atau masukkan tautan URL gambar.</p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                    <div>
                        <label style="display: block; font-size: 11.5px; font-weight: 600; color: #475569; margin-bottom: 5px;">Opsi 1: Upload File Gambar Baru</label>
                        <input type="file" id="image_file_input" name="image_file" accept="image/*" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; background: #fff;">
                        <span style="display: block; font-size: 10.5px; color: #94a3b8; margin-top: 4px;">Biarkan kosong jika tidak ingin mengganti file</span>
                    </div>
                    <div>
                        <label style="display: block; font-size: 11.5px; font-weight: 600; color: #475569; margin-bottom: 5px;">Opsi 2: Tautan URL Gambar</label>
                        <input type="text" id="image_url_input" name="image" value="{{ old('image', $event->image) }}" placeholder="https://images.unsplash.com/..." style="width: 100%; padding: 9px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 12px; font-family: 'Poppins', sans-serif; background: #fff;">
                        <span style="display: block; font-size: 10.5px; color: #94a3b8; margin-top: 4px;">Link gambar eksternal (Unsplash, CDN, dll)</span>
                    </div>
                </div>

                {{-- Live / Current Preview --}}
                <div id="preview_wrapper" style="display: {{ $event->image ? 'flex' : 'none' }}; align-items: center; gap: 14px; background: #fff; padding: 12px; border-radius: 10px; border: 1px solid #e2e8f0;">
                    <img id="image_preview" src="{{ $event->image ?? '' }}" alt="Preview" style="width: 110px; height: 68px; object-fit: cover; border-radius: 8px; border: 1px solid #e2e8f0;">
                    <div>
                        <span style="display: block; font-size: 12px; font-weight: 700; color: #0f172a;">Gambar Banner Saat Ini</span>
                        <span style="display: block; font-size: 11px; color: #059669;">Siap ditampilkan di kartu event & halaman detail</span>
                    </div>
                </div>
            </div>

            {{-- Tags --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Tags (Pisahkan dengan koma)</label>
                <input type="text" name="tags" value="{{ old('tags', is_array($event->tags) ? implode(', ', $event->tags) : '') }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
            </div>

            {{-- Excerpt --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Ringkasan Singkat (Excerpt)</label>
                <textarea name="excerpt" rows="2" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; resize: vertical;">{{ old('excerpt', $event->excerpt) }}</textarea>
            </div>

            {{-- Description --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Deskripsi Lengkap *</label>
                <textarea name="description" rows="6" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; resize: vertical;">{{ old('description', $event->description) }}</textarea>
            </div>

            {{-- Checkboxes --}}
            <div style="display: flex; gap: 24px; padding: 12px 0;">
                <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; color: #1e293b; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $event->is_featured) ? 'checked' : '' }} style="width: 16px; height: 16px; border-radius: 4px; accent-color: #2563eb;">
                    Jadikan Event Unggulan (Featured ⭐)
                </label>
                <label style="display: inline-flex; align-items: center; gap: 8px; font-size: 13px; color: #1e293b; font-weight: 600; cursor: pointer;">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $event->is_published) ? 'checked' : '' }} style="width: 16px; height: 16px; border-radius: 4px; accent-color: #2563eb;">
                    Publikasikan ke Website Langsung
                </label>
            </div>

            {{-- Submit Buttons --}}
            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
                <a href="{{ route('admin.events.index') }}" style="padding: 10px 18px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 13px; font-weight: 600; text-decoration: none;">
                    Batal
                </a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; background: #2563eb; color: #fff; border: none; font-size: 13px; font-weight: 700; cursor: pointer; box-shadow: 0 2px 6px rgba(37,99,235,0.3); font-family: 'Poppins', sans-serif;">
                    Perbarui Event
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    (function() {
        const fileInput = document.getElementById('image_file_input');
        const urlInput = document.getElementById('image_url_input');
        const previewWrapper = document.getElementById('preview_wrapper');
        const previewImg = document.getElementById('image_preview');

        function updatePreview(src) {
            if (src) {
                previewImg.src = src;
                previewWrapper.style.display = 'flex';
            } else {
                previewWrapper.style.display = 'none';
            }
        }

        if (fileInput) {
            fileInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        updatePreview(e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
        }

        if (urlInput) {
            urlInput.addEventListener('input', function() {
                if (this.value.trim().length > 8) {
                    updatePreview(this.value.trim());
                }
            });
        }
    })();
</script>
@endsection

