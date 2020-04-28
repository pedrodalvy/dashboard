<?php

namespace App\Services\Resume;

use App\Models\Resume\ResumeEducation;
use Illuminate\Http\Request;

class EducationService
{
    public function showEducations()
    {
        $educations = ResumeEducation::all();

        return view('resume.education')
            ->with('educations', $educations);
    }

    public function showEducationById($id) {
        $education = ResumeEducation::findOrFail($id);

        return view('partials.resume.education.show')
            ->with('education', $education);
    }
}