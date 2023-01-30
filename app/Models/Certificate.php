<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'certificate_number',
        'course_name',
        'name',
        'type',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
