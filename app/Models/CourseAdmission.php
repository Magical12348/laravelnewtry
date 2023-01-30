<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseAdmission extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'course_id',
        'payment_id',
        'batch',
        'is_online',
        'batch_button_id'
    ];

    protected $casts = [
        'is_online' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userWithSelect()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function batchbutton()
    {
        return $this->belongsTo(BatchButton::class, 'batch_button_id');
    }

    public function batchbuttonWithTrash()
    {
        return $this->belongsTo(BatchButton::class, 'batch_button_id')->withTrashed();
    }
}
