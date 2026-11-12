<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'badge',
        'summary',
        'summary_en',
        'steps',
        'outcome',
        'outcome_en',
        'read_time',
        'order',
        'status',
    ];

    protected $casts = [
        'steps' => 'array',
        'order' => 'integer',
    ];

    public const CATEGORIES = [
        'performance' => [
            'key'   => 'performance',
            'id'    => 'Performa Web & Speed',
            'en'    => 'Web Performance & Speed',
            'badge' => 'bg-amber-50 text-amber-700 border-amber-200',
        ],
        'security' => [
            'key'   => 'security',
            'id'    => 'Keamanan Siber & Data',
            'en'    => 'Cybersecurity & Data Hardening',
            'badge' => 'bg-rose-50 text-rose-700 border-rose-200',
        ],
        'architecture' => [
            'key'   => 'architecture',
            'id'    => 'Arsitektur & Cloud',
            'en'    => 'Architecture & Cloud',
            'badge' => 'bg-blue-50 text-blue-700 border-blue-200',
        ],
        'product' => [
            'key'   => 'product',
            'id'    => 'Strategi Produk & MVP',
            'en'    => 'Product & MVP Strategy',
            'badge' => 'bg-purple-50 text-purple-700 border-purple-200',
        ],
        'seo' => [
            'key'   => 'seo',
            'id'    => 'SEO Teknis & Konversi',
            'en'    => 'Technical SEO & Conversion',
            'badge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        ],
        'database' => [
            'key'   => 'database',
            'id'    => 'Database & Migrasi ERP',
            'en'    => 'Database & ERP Migration',
            'badge' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
        ],
    ];

    public function getCategoryMetaAttribute()
    {
        return self::CATEGORIES[$this->category] ?? [
            'key'   => $this->category,
            'id'    => ucfirst($this->category),
            'en'    => ucfirst($this->category),
            'badge' => 'bg-slate-50 text-slate-700 border-slate-200',
        ];
    }
}

