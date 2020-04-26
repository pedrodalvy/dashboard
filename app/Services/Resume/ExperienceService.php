<?php

namespace App\Services\Resume;

use Illuminate\Http\Request;
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

    public function updateExperience(Request $request, $id)
    {
        $exeperience = ResumeExperience::findOrFail($id);

        $exeperience->job_title = $request->job_title;
        $exeperience->company = $request->company;
        $exeperience->job_resume = $request->job_resume;
        $exeperience->date_in = $request->date_in;
        $exeperience->date_out = $request->date_out;

        if ($exeperience->save()) {
            return $exeperience->toJson();
        }

        return json_encode(['error' => 'Não foi possível executar a operação.']);
    }

    public function createExperience(Request $request)
    {
        $exeperience = new ResumeExperience();

        $exeperience->job_title = $request->job_title;
        $exeperience->company = $request->company;
        $exeperience->job_resume = $request->job_resume;
        $exeperience->date_in = $request->date_in;
        $exeperience->date_out = $request->date_out;

        if ($exeperience->save()) {
            return $exeperience->toJson();
        }

        return json_encode(['error' => 'Não foi possível executar a operação.']);

    }

    public function removeExperience($id) {
        $exeperience = ResumeExperience::find($id);

        if($exeperience->delete()) {
            return json_encode(['type' => 'success', 'message' => 'Experiência removida com sucesso.']); 
        }

        return json_encode(['type' => 'error', 'message' => 'Não foi possível executar a operação.']);
    }

    public function validateExperience(Request $request)
    {
        $rules = [
            'job_title' => 'required|string',
            'company' => 'required|string',
            'job_resume' => 'required|string',
            'date_in' => 'required|date',
            'date_out' => 'date'
        ];
        $messages = [
            'job_title.required' => 'É necessário informar a função.',
            'job_title.string' => 'Informe uma função válida.',

            'company.required' => 'É necessário informar a empresa.',
            'company.string' => 'Ínforme uma empresa válida.',

            'job_resume.required' => 'É necessário informar uma descrição da função.',
            'job_resume.string' => 'Informe uma descrição válida.',

            'date_in' => 'É necessário informar a data de entrada.',
            'date_in' => 'Data de entrada inválida.',

            'date_out' => 'Data de saída inválida.',
        ];
        return $request->validate($rules, $messages);
    }
}
