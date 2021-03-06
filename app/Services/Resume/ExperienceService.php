<?php

namespace App\Services\Resume;

use App\Models\Resume\ResumeExperience;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExperienceService
{
    /**
     * showExperiences
     *
     * @return Application|Factory|View
     */
    public function showExperiences()
    {
        $experiences = ResumeExperience::all()->sortByDesc('date_in');

        return view('resume.experience')
            ->with('experiences', $experiences);
    }

    /**
     * editExperience
     *
     * @param  mixed $id
     * @return void
     */
    public function editExperience($id)
    {
        $experience = ResumeExperience::findOrFail($id);

        $experience->date_in = formatDateBr($experience->date_in);

        if ($this->isCurrentJob($experience->date_out)) {
            $experience->date_out = formatDateBr($experience->date_out);
        }

        return $experience->toJson();
    }

    /**
     * updateExperience
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function updateExperience(Request $request, $id)
    {
        $experience = ResumeExperience::findOrFail($id);

        $experience->job_title = $request->job_title;
        $experience->company = $request->company;
        $experience->job_resume = $request->job_resume;

        $experience->date_in = unshapedDate($request->date_in);

        if ($this->isCurrentJob($request->date_out)) {
            $experience->date_out = unshapedDate($request->date_out);
        } else {
            $experience->date_out = null;
        }

        if ($experience->save()) {
            return $experience->toJson();
        }

        return json_encode(['error' => 'Não foi possível executar a operação.']);
    }

    /**
     * createExperience
     *
     * @param  mixed $request
     * @return void
     */
    public function createExperience(Request $request)
    {
        $experience = new ResumeExperience();

        $experience->job_title = $request->job_title;
        $experience->company = $request->company;
        $experience->job_resume = $request->job_resume;
        $experience->date_in = unshapedDate($request->date_in);

        if ($this->isCurrentJob($request->date_out)) {
            $experience->date_out = unshapedDate($request->date_out);
        }

        if ($experience->save()) {
            return $experience->toJson();
        }

        return json_encode(['error' => 'Não foi possível executar a operação.']);

    }

    /**
     * removeExperience
     *
     * @param  mixed $id
     * @return void
     */
    public function removeExperience($id)
    {
        $experience = ResumeExperience::find($id);

        if ($experience->delete()) {
            return json_encode(['type' => 'success', 'message' => 'Experiência removida com sucesso.']);
        }

        return json_encode(['type' => 'error', 'message' => 'Não foi possível executar a operação.']);
    }

    /**
     * isCurrentJob
     *
     * @param  mixed $date_out
     * @return void
     */
    protected function isCurrentJob($date_out)
    {
        return isset($date_out);
    }

    /**
     * validateExperience
     *
     * @param  mixed $request
     * @return void
     */
    public function validateExperience(Request $request)
    {
        $rules = [
            'job_title' => 'required|string',
            'company' => 'required|string',
            'job_resume' => 'required|string',
            'date_in' => 'required|date',
            'date_out' => 'date',
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
