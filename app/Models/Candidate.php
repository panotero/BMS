<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidate_form_table';
    protected $guarded = []; // Accept all fields

    // OR more secure:
    protected $fillable = [
        'candidate_name',
        'dementia_experience',
        'hospice_experience',
        'bedbound_experience',
        'incontinence_experience',
        'auto_insurance',
        'drivers_license',
        'okay_transport',
        'okay_with_gender',
        'okay_with_smokers',
        'okay_with_pets',
        'slide_board',
        'gait_belt_experience',
        'hoyer_lift_experience',
        'preferred_location',
        'referral_source',
        'couples_care',
        'salary',
        'meal_prep',
        'covid_vaccinated',
        'certificates',
        'interested_pca_certification',
        'availability',
        'background_disclosure',
        'others'
    ];
}
