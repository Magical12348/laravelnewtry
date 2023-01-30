<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'course_type',
        'module_level',
        'days_of_modules',
        'timing_from',
        'timing_to',
        'is_job_guaranteed',
        'note_available',
        'provide_certificate',
        'course_fees',
        'demo_image',
        'demo_video',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
