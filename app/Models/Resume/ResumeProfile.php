<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Resume\ResumeProfile
 *
 * @property int $id
 * @property string $name Complete name
 * @property string $description Description about me
 * @property string $resume Link of resume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
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
class ResumeProfile extends Model
{
    protected $table = 'resume_profile';
}
