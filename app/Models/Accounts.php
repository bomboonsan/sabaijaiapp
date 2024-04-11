<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'apply_id',
        'line_profile',
        'gender',
        'first_name',
        'last_name',
        'id_card',
        'education_level',
        'education_lavel_year',
        'education_sublevel',
        'education_year',
        'faculty',
        'university',
        'amount',
        'number_installments',
        'telephone',
        'telOtp',
        'email',
        'email-otp',
        'consent',
        'consent_time',
        'address',
        'address_present',
        'address_delivery',
        'accommodation_type',
        'residence_status',
        'main_occupation',
        'nature_employment',
        'type_business',
        'main_income_per_month',
        'additional_career',
        'additional_career_income_per_month',
        'number_institutions',
        'debt_burden_per_month',
        'marital_status',
        'person_under_patronage',
        'occupation_detail',
        'reference_name',
        'reference_type',
        'reference_tel',
        'documents',
        'promotional_interest',
        'normal_interest',
        'apply_status',

    ];
}
