<?php

namespace App\Models\Resume;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Resume\ResumeExperience
 *
 * @property int $id
 * @property string $job_title
 * @property string $company
 * @property string $job_resume
 * @property string $date_in
 * @property string|null $date_out If is null its because its still working
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereDateIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereDateOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereJobResume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereJobTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeExperience whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
