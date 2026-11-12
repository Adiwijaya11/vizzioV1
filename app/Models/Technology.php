<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'category_label_id',
        'category_label_en',
        'version',
        'role',
        'description',
        'description_en',
        'image',
        'features',
        'use_case',
        'performance_metric',
        'official_url',
        'order',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'features'    => 'array',
        'is_featured' => 'boolean',
        'order'       => 'integer',
    ];

    public const CATEGORIES = [
        'backend' => [
            'key' => 'backend',
            'id'  => 'Backend & Core API',
            'en'  => 'Backend & Core API',
            'badge_color' => 'bg-blue-50 text-blue-700 border-blue-200',
        ],
        'frontend' => [
            'key' => 'frontend',
            'id'  => 'Frontend & UI',
            'en'  => 'Frontend & UI',
            'badge_color' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        ],
        'mobile' => [
            'key' => 'mobile',
            'id'  => 'Mobile & Cross-Platform',
            'en'  => 'Mobile & Cross-Platform',
            'badge_color' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
        ],
        'database' => [
            'key' => 'database',
            'id'  => 'Database & In-Memory Cache',
            'en'  => 'Database & In-Memory Cache',
            'badge_color' => 'bg-purple-50 text-purple-700 border-purple-200',
        ],
        'devops' => [
            'key' => 'devops',
            'id'  => 'Cloud, DevOps & Containers',
            'en'  => 'Cloud, DevOps & Containers',
            'badge_color' => 'bg-amber-50 text-amber-700 border-amber-200',
        ],
        'security' => [
            'key' => 'security',
            'id'  => 'Security & Gateway',
            'en'  => 'Security & Gateway',
            'badge_color' => 'bg-rose-50 text-rose-700 border-rose-200',
        ],
        'ai' => [
            'key' => 'ai',
            'id'  => 'AI & Data Engineering',
            'en'  => 'AI & Data Engineering',
            'badge_color' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
        ],
    ];

    public function getCategoryMetaAttribute()
    {
        return self::CATEGORIES[$this->category] ?? [
            'key' => $this->category,
            'id'  => ucfirst($this->category),
            'en'  => ucfirst($this->category),
            'badge_color' => 'bg-slate-50 text-slate-700 border-slate-200',
        ];
    }
}

