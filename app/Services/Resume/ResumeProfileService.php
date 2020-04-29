<?php

namespace App\Services\Resume;

use App\Models\Resume\ResumeProfile;
use Illuminate\Http\Request;

class ResumeProfileService
{
    public function getProfile()
    {
        $resume = $this->getProfileData();

        return view('resume.profile')
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
        $profile->email = $request->email;
        $profile->fone = $request->fone;
        $profile->address = $request->address;
        $profile->function = $request->function;
        $profile->pricing = $request->pricing;
        $profile->linkedin = $request->linkedin;
        $profile->github = $request->github;
        $profile->site = $request->site;
        $profile->skills = $request->skills;

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
            'email' => 'required|email',
            'fone' => 'required|string',
            'address' => 'required|string',
            'function' => 'required|string',
            'pricing' => 'required|money',
            'linkedin' => 'nullable|url',
            'github' => 'nullable|url',
            'site' => 'nullable|url',
            'skills' => 'string|nullable',
        ];
        $messages = [
            'name.required' => 'O nome precisa ser informado',
            'name.string' => 'Digite um nome válido',

            'description.required' => 'É necessário informar uma descrição',

            'resume.file' => 'Envie um currículo válido',
            'resume.max' => 'O currículo não pode exceder 25MB',
            'resume.mimes' => 'O formato do currículo deve ser PDF',

            'email.required' => 'É necessário informar o email',
            'email.email' => 'Informe um e-mail válido',

            'fone.required' => 'É necessário informar o telefone',
            'fone.string' => 'Informe um telefone válido',

            'address.required' => 'É necessário informar o endereço',
            'address.string' => 'Informe um endereço válido',

            'function.required' => 'É necessário informar a profissão',
            'function.string' => 'Informe uma profissão válida',

            'pricing.required' => 'É necessário informar a pretensão salarial',
            'pricing.money' => 'Informe uma pretensão salarial válida',

            'linkedin.url' => 'O endereço do Linkedin está inválido',
            'github.url' => 'O endereço do Github está inválido',
            'site.url' => 'O endereço do site está inválido',

            'skills.string' => 'Informe uma skill válida.'
        ];

        return $request->validate($rules, $messages);
    }
}
