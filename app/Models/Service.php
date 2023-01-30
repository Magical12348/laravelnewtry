<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'services'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
