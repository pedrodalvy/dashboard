<?php

namespace App\Models\Resume;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Resume\ResumeProfile
 *
 * @property int $id
 * @property string $name Complete name
 * @property string $description Description about me
 * @property string|null $resume Link of resume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile whereResume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeProfile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ResumeProfile extends Authenticatable
{
    use Notifiable;

    protected $table = 'resume_profile';
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'description', 'resume', 'skills',
    ];

}
