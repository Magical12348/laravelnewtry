<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    const UNVERIFIED = 1;
    const VERIFYING = 2;
    const FAILED_VERIFICATION = 3;
    const VERIFIED = 4;

    protected $fillable = [
        'user_id',
        'is_verified',
        'qualification',
        'is_experienced',
        'experienced_in_online',
        'experienced_in_offline',
        'certification',
        'preferred_mode',
        'total_experience',
        'teaching_experience',
        'no_case_study',
        'research_project',
        'other_experience',
        'companies_linked_to_you',
        'linkedin_link',
        'provide_document_aadhar',
        'provide_document_photo',
        'provide_document_pan',
        'provide_document_bank',
        'provide_document_marksheet',
        'provide_document_experience_letter',
        'provide_document_certificate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function failMessages()
    {
        return $this->hasOne(FailedMessage::class);
    }

    public function isVerified(): string
    {
        if ($this->is_verified == 1) {
            return 'Unverified';
        } elseif ($this->is_verified == 2) {
            return 'Verifying';
        } elseif ($this->is_verified == 3) {
            return 'Verification Failed';
        } elseif ($this->is_verified == 4) {
            return 'Verified';
        }
    }
}
