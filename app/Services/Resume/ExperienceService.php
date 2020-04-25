<?php

namespace App\Services\Resume;

use App\Models\Resume\ResumeExperience;

class ExperienceService
{
    public function showExperiences()
    {
        $experiences = ResumeExperience::all();
        return view('resume.experience')
            ->with('experiences', $experiences);
    }

    public function editExeperience($id)
    {
        $exeperience = ResumeExperience::findOrFail($id);

        return $exeperience->toJson();
    }
}