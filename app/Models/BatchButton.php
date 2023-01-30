<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BatchButton extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'shift',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function course_admissions()
    {
        return $this->hasMany(CourseAdmission::class);
    }
}
