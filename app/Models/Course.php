<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'thumbnail',
        'demo_video',
        'excerpt',
        'description',
        'price',
        'has_installments',
        'type',
        'is_active',
        'duration',
        'next_batch_days',
        'discount_price',
        'batch_start_at',
    ];

    protected $casts = [
        'price' => 'integer',
        'discount_price' => 'integer',
        'has_installments' => 'boolean',
        'is_active' => 'boolean',
        'batch_start_at' => 'date',
    ];

    public function thumbnail(): string
    {
        return 'storage/' .  $this->thumbnail;
    }

    public function demoVideo(): string
    {
        return 'storage/' .  $this->demo_video;
    }

    public function price(): int
    {
        return $this->price / 100;
    }

    public function excerpt(): string
    {
        return Str::limit($this->excerpt, 90, '...');
    }

    public function description($limit = 90): string
    {
        return Str::limit(strip_tags($this->description), $limit, '...');
    }

    public function discountPrice(): int
    {
        return $this->discount_price / 100;
    }

    public function userBrought(): bool
    {
        if (auth()->user()) {
            foreach (auth()->user()->courseAdmissions as $courseA) {
                if ($this->id == $courseA->course_id) {
                    return true;
                }
            }
        }

        return false;
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function setDiscountPriceAttribute($value)
    {
        $this->attributes['discount_price'] = $value * 100;
    }

    public function scopeIsActive()
    {
        return $this->where('is_active', true);
    }

    public function scopeIsInActive()
    {
        return $this->where('is_active', false);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function pdfs()
    {
        return $this->hasMany(CoursePdf::class);
    }

    public function buttons()
    {
        return $this->hasMany(BatchButton::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function admissions()
    {
        return $this->hasMany(CourseAdmission::class);
    }

    public function admissionsWithTrash()
    {
        return $this->hasMany(CourseAdmission::class)->withTrashed();
    }

    public function scopes()
    {
        return $this->hasMany(CourseScope::class);
    }

    public function installment()
    {
        return $this->hasOne(Installment::class);
    }
}
