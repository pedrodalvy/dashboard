<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\Site\Email\SendMessageService;
use App\Services\Site\ResumeSiteService;
use Exception;
use Illuminate\Http\Request;

class ResumeSiteController extends Controller
{
    protected $resumeSiteService;

    public function __construct(ResumeSiteService $resumeSiteService)
    {
        $this->resumeSiteService = $resumeSiteService;
    }

    public function allResumeData($id)
    {
        try {
            return $this->resumeSiteService->getAllInfos($id);
        } catch (Exception $ex) {
            return json_encode([
                'error' => 'Não foi possível executar a operação.',
                'message' => $ex->getMessage(),
            ]);
        }
    }

    public function sendMessage(Request $request)
    {
        $message = new SendMessageService;

        return $message->sendMessage($request);
    }
}
