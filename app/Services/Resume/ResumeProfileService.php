<?php

namespace App\Services\Resume;

use App\Models\Resume\ResumeProfile;
use Illuminate\Http\Request;

class ResumeProfileService
{
    public function getProfile()
    {
        $resume = $this->getProfileData();

        return view('admin.resume.profile')
            ->with('data', $resume->first());
    }

    protected function getProfileData()
    {
        $data = ResumeProfile::all();
        return $data->first();
    }

    public function updateProfileData(Request $request)
    {
        $profile = ResumeProfile::find(1);

        $profile->name = $request->name;
        $profile->description = $request->description;

        if ($request->hasFile('resume')) {
            $profile->resume = $this->saveFile($request);
        }

        if ($profile->save()) {
            return back()->with('success', 'Perfil alterado com sucesso.');
        }

        return back()->with('error', 'Não foi possível realizar a alteração.');

    }

    protected function saveFile(Request $request)
    {
        $fileName = 'currículo.pdf';
        $request->resume->move(public_path('uploads'), $fileName);

        return $fileName;
    }

    public function validateInputProfile(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'description' => 'required',
            'resume' => 'file|max:2500|mimes:pdf',
        ];
        $messages = [
            'name.required' => 'O nome precisa ser informado',
            'name.string' => 'Digite um nome válido',

            'description.required' => 'É necessário informar uma descrição',

            'resume.file' => 'Envie um currículo válido',
            'resume.max' => 'O currículo não pode exceder 25MB',
            'resume.mimes' => 'O formato do currículo deve ser PDF',
        ];

        return $request->validate($rules, $messages);
    }
}
