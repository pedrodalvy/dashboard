<?php

namespace App\Services\Resume;

use App\Models\Resume\ResumeEducation;
use Illuminate\Http\Request;

class EducationService
{
    public function showEducations()
    {
        $educations = ResumeEducation::all();

        return $educations;
    }
}