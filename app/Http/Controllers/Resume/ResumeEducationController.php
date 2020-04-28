<?php

namespace App\Http\Controllers\Resume;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Resume\EducationService;
use Exception;

class ResumeEducationController extends Controller
{
    private $educationService;

    public function __construct(EducationService $educationService)
    {
        $this->educationService = $educationService;
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return $this->educationService->showEducations();
        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível fazer a consulta.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return $this->educationService->createEducation();
        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível realizar esta operação.');
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return $this->educationService->showEducationById($id);
        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível fazer a consulta.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            return $this->educationService->editEducationById($id);
        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível fazer a consulta.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->educationService->validateEducation($request);
        try {
            return $this->educationService->updateEducation($request, $id);
        } catch (Exception $ex) {
            return back()->with('error', 'Não foi possível realizar esta operação.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
