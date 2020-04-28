<?php

namespace App\Models\Resume;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ResumeEducation extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'course',
        'establishment',
        'course_resume',
        'date_in',
        'date_out',
    ];
}
