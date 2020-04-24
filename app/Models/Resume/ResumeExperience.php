<?php

namespace App\Models\Resume;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ResumeExperience extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'job_title',
        'company',
        'job_resume',
        'date_in',
        'date_out',
    ];
}
