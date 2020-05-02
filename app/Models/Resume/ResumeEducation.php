<?php

namespace App\Models\Resume;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Resume\ResumeEducation
 *
 * @property int $id
 * @property string $course
 * @property string $establishment
 * @property string $course_resume
 * @property string $date_in
 * @property string $date_out
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereCourse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereCourseResume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereDateIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereDateOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereEstablishment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Resume\ResumeEducation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
