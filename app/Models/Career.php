<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name_of_course',
        'other_name_of_course',
        'course_description',
        'syllabus',
        'course_keyword',
        'have_pre_requisite',
        'tell_pre_requisite',
        'opportunity_after_course',
        'have_mock_test_interview',
        'conduct_lecture',
    ];

    public function types()
    {
        return $this->hasMany(CourseType::class);
    }
}
