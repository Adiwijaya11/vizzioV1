<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'category',
        'category_label_id',
        'category_label_en',
        'title_id',
        'title_en',
        'desc_id',
        'desc_en',
        'content_id',
        'content_en',
        'image',
        'icon',
        'views',
        'published_at',
        'status',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}
