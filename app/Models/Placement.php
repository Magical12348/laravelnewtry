<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'company_name',
        'job_title',
        'location',
        'package',
        'placement_date',
        'image',
    ];
    public function image(): string
    {
        return 'storage/' .  $this->image;
    }
}
