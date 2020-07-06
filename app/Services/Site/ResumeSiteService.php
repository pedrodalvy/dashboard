<?php

namespace App\Services\Site;

use App\Models\Resume\ResumeEducation;
use App\Models\Resume\ResumeExperience;
use App\Models\Resume\ResumeProfile;

class ResumeSiteService
{
    public function getAllInfos($id)
    {
        $allInfo = [
            'education' => $this->getEducation($id),
            'experience' => $this->getExperience($id),
            'profile' => $this->getProfile($id),
            'url_cv' => $this->getUrlCv($id),
        ];

        return json_encode($allInfo);
    }

    protected function getEducation($id)
    {
        return ResumeEducation::all()->toArray();
    }

    protected function getExperience($id)
    {
        return ResumeExperience::all()->sortByDesc('date_in')->toArray();
    }

    protected function getProfile($id)
    {
        return ResumeProfile::findOrFail($id)->toArray();
    }

    protected function getUrlCv($id)
    {
        $profile = ResumeProfile::findOrFail($id);

        if ($profile->resume) {
            return ['cv_link' => route('resume.download')];
        }

        return ['cv_link' => null];
    }

}
