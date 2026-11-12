@extends('layouts.admin.app')

@section('title', 'Edit Playbook — ' . $tip->title . ' — VizzioCraft')
@section('page_title', 'Edit Playbook')

@section('content')
<div style="max-width: 860px; display: flex; flex-direction: column; gap: 20px;">

    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <h1 style="font-size: 20px; font-weight: 800; color: #0f172a; margin: 0 0 4px 0;">Perbarui Playbook: {{ $tip->title }}</h1>
            <p style="font-size: 13px; color: #64748b; margin: 0;">Perbarui butir checklist teknis, ringkasan, dan target hasil panduan ini.</p>
        </div>
        <a href="{{ route('admin.tips.index') }}" style="display: inline-flex; align-items: center; gap: 6px; padding: 8px 14px; border-radius: 10px; background: #f1f5f9; color: #475569; font-size: 12px; font-weight: 600; text-decoration: none;">
            &larr; Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
        <div style="padding: 14px 18px; border-radius: 14px; background: #fef2f2; border: 1px solid #fecaca; color: #dc2626; font-size: 12px;">
            <div style="font-weight: 700; margin-bottom: 6px;">Harap perbaiki kesalahan berikut:</div>
            <ul style="margin: 0; padding-left: 18px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div style="background: #ffffff; border: 1px solid #e8edf5; border-radius: 20px; padding: 28px; box-shadow: 0 1px 4px rgba(0,0,0,0.03);">
        <form action="{{ route('admin.tips.update', $tip->id) }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
            @csrf
            @method('PUT')

            {{-- Row 1: Judul & Kategori --}}
            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Judul Playbook / Checklist *</label>
                    <input type="text" name="title" value="{{ old('title', $tip->title) }}" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Kategori Topik *</label>
                    <select name="category" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        @foreach($categories as $cKey => $cMeta)
                            <option value="{{ $cKey }}" {{ old('category', $tip->category) === $cKey ? 'selected' : '' }}>
                                {{ $cMeta['id'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Row 2: Badge & Waktu Baca --}}
            <div style="display: grid; grid-template-columns: 1.5fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Badge / Label Header</label>
                    <input type="text" name="badge" value="{{ old('badge', $tip->badge) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Estimasi Waktu Baca</label>
                    <input type="text" name="read_time" value="{{ old('read_time', $tip->read_time) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Row 3: Ringkasan --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Ringkasan Panduan (Bahasa Indonesia) *</label>
                    <textarea name="summary" rows="3" required style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; line-height: 1.5;">{{ old('summary', $tip->summary) }}</textarea>
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Ringkasan (English - Opsional)</label>
                    <textarea name="summary_en" rows="3" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; line-height: 1.5;">{{ old('summary_en', $tip->summary_en) }}</textarea>
                </div>
            </div>

            {{-- Row 4: Langkah-Langkah Checklist --}}
            <div>
                <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 4px;">Daftar Langkah Teknis / Checklist * (Satu langkah per baris baru)</label>
                @php
                    $stepsText = is_array($tip->steps) ? implode("\n", $tip->steps) : $tip->steps;
                @endphp
                <textarea name="steps" rows="6" required style="width: 100%; padding: 12px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 12px; font-family: 'Poppins', sans-serif; line-height: 1.6;">{{ old('steps', $stepsText) }}</textarea>
            </div>

            {{-- Row 5: Hasil / Outcome & SLA --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Hasil Teknis / Target Output</label>
                    <input type="text" name="outcome" value="{{ old('outcome', $tip->outcome) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Hasil Teknis (English - Opsional)</label>
                    <input type="text" name="outcome_en" value="{{ old('outcome_en', $tip->outcome_en) }}" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
            </div>

            {{-- Row 6: Order & Status --}}
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $tip->order) }}" min="0" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif;">
                </div>
                <div>
                    <label style="display: block; font-size: 12px; font-weight: 700; color: #1e293b; margin-bottom: 6px;">Status Publikasi *</label>
                    <select name="status" style="width: 100%; padding: 10px 14px; border: 1px solid #cbd5e1; border-radius: 10px; font-size: 13px; font-family: 'Poppins', sans-serif; background: #fff; cursor: pointer;">
                        <option value="active" {{ old('status', $tip->status) === 'active' ? 'selected' : '' }}>Aktif</option>
                        <option value="inactive" {{ old('status', $tip->status) === 'inactive' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>
            </div>

            {{-- Actions --}}
            <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 20px; margin-top: 10px;">
                <a href="{{ route('admin.tips.index') }}" style="padding: 10px 20px; border-radius: 10px; border: 1px solid #cbd5e1; background: #ffffff; color: #475569; font-size: 13px; font-weight: 600; text-decoration: none;">
                    Batal
                </a>
                <button type="submit" style="padding: 10px 24px; border-radius: 10px; border: none; background: #2563eb; color: #ffffff; font-size: 13px; font-weight: 700; cursor: pointer; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

</div>
@endsection

