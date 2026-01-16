<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpmbSetting extends Model
{
    use HasFactory;

    protected $table = 'spmb_settings';

    protected $guarded = ['id'];

    protected $casts = [
        'registration_start_date' => 'date',
        'registration_end_date' => 'date',
        'show_brochure' => 'boolean',
        'step_1_start_date' => 'date',
        'step_1_end_date' => 'date',
        'step_2_start_date' => 'date',
        'step_2_end_date' => 'date',
        'step_3_start_date' => 'date',
        'step_3_end_date' => 'date',
        'step_4_start_date' => 'date',
        'step_4_end_date' => 'date',
        'step_5_start_date' => 'date',
        'step_5_end_date' => 'date',
    ];
}
