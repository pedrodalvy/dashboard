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
        $education = $this->findEducation($id);

        return view('partials.resume.education.show')
            ->with('education', $education);
    }

    public function editEducationById($id) {
        $education = $this->findEducation($id);

        return view('partials.resume.education.edit')
            ->with('education', $education);
    }

    public function updateEducation(Request $request, $id)
    {
        $education = $this->findEducation($id);
        
        $education->course = $request->course;
        $education->establishment = $request->establishment;
        $education->course_resume = $request->course_resume;
        $education->date_in = unshapedDate($request->date_in);
        $education->date_out = unshapedDate($request->date_out);

        if($education->save()) {
            return redirect(route('education.show', $id))
                ->with('success', 'Cadastro alterado com sucesso.');
        }

        return back()->with('error', 'Não foi possível realizar esta operação.');
    }

    public function createEducation()
    {
        $education = new ResumeEducation;
        return view('partials.resume.education.create')
            ->with('education', $education);
    }


    protected function findEducation($id)
    {
        return ResumeEducation::findOrFail($id);
    }

    public function validateEducation(Request $request)
    {
        $rules = [
            'course' => 'required|string',
            'establishment' => 'required|string',
            'course_resume' => 'required|string',
            'date_in' => 'required',
            'date_out' => 'required',
        ];

        $messages = [
            'course.required' => 'É necessário informar o nome do curso.',
            'course.string' => 'Informe um curso válido.',

            'establishment.required' => 'É necessário informar o nome da instituição.',
            'establishment.string' => 'Informe uma instituição válida.',

            'course_resume.required' => 'É necessário informar a descrição do curso.',
            'course_resume.string' => 'Informe uma descrição válida.',

            'date_in' => 'É necessário informar a data de inicio.',
            'date_out' => 'É necessário informar a data de finalização.',
        ];

        return $request->validate($rules, $messages);
    }
}