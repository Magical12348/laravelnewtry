<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FailedMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience_id', 'failed_reasons'
    ];

    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
}
