<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Installment extends Model
{
    use HasFactory;

    const STATUS_HALF = 'half';
    const STATUS_FULL = 'full';

    protected $fillable = [
        'user_id',
        'course_id',
        'r_amount',
        'payment_status',
        'due_date'
    ];

    protected $casts = [
        'due_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
