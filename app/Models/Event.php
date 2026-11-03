<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'description', 'image',
        'type', 'format', 'location', 'location_url',
        'event_date', 'start_time', 'end_time',
        'organizer', 'speaker', 'capacity', 'registered',
        'price', 'registration_url', 'status',
        'is_featured', 'is_published', 'tags',
    ];

    protected $casts = [
        'event_date'   => 'date',
        'price'        => 'decimal:0',
        'is_featured'  => 'boolean',
        'is_published' => 'boolean',
        'tags'         => 'array',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('event_date', '>=', now()->toDateString());
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOfFormat($query, $format)
    {
        return $query->where('format', $format);
    }

    public function getIsFreeAttribute(): bool
    {
        return $this->price <= 0;
    }

    public function getSpotsLeftAttribute(): ?int
    {
        if (!$this->capacity) return null;
        return max(0, $this->capacity - $this->registered);
    }

    public function getIsFullAttribute(): bool
    {
        if (!$this->capacity) return false;
        return $this->registered >= $this->capacity;
    }

    public function getFormattedPriceAttribute(): string
    {
        if ($this->price <= 0) return 'Gratis';
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }
}

