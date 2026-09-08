<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisitorLog extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'url',
        'referrer',
        'visit_date',
        'visit_count',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];
}
