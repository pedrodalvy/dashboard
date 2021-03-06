<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Resume\ResumeProfileService;
use Exception;

class ResumeProfileController extends Controller
{
    private $resumeProfile;

    public function __construct(ResumeProfileService $resumeProfile)
    {
        $this->resumeProfile = $resumeProfile;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return $this->resumeProfile->getProfile();
    }

    public function update(Request $request)
    {
        $request->pricing = formatMoney($request->pricing);
        
        $this->resumeProfile->validateInputProfile($request);

        try {
            return $this->resumeProfile->updateProfileData($request);

        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível realizar a alteração.');
        }
    }
}
