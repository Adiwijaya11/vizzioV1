<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'type',
        'website_url',
        'order',
        'status',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public const TYPES = [
        'client'  => [
            'key'   => 'client',
            'id'    => 'Klien Enterprise',
            'en'    => 'Enterprise Client',
            'badge' => 'bg-blue-50 text-blue-700 border-blue-200',
        ],
        'partner' => [
            'key'   => 'partner',
            'id'    => 'Mitra Teknologi',
            'en'    => 'Technology Partner',
            'badge' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        ],
    ];

    public function getTypeMetaAttribute()
    {
        return self::TYPES[$this->type] ?? [
            'key'   => $this->type,
            'id'    => ucfirst($this->type),
            'en'    => ucfirst($this->type),
            'badge' => 'bg-slate-50 text-slate-700 border-slate-200',
        ];
    }
}

