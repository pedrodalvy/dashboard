@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Cadastro de Experiências</h1>
<p class="mb-4">
    Relação com todas as experiências profissionais cadastradas.
</p>

<div class="card border-left-primary shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Experiências</h6>
    </div>


    <div class="card-body col-12" id="experienceCardBody">
        @forelse($experiences as $experience)

        <div class="card shadow mb-1" id="experience_id_{{ $experience->id }}">
            <!-- Card Header - Accordion -->
            <a href="#collapse{{ $experience->id }}" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="{{ $loop->iteration  == 1 ? 'true' : 'false' }}"
                aria-controls="collapse{{ $experience->id }}">

                <span class="font-weight-bold">Função: </span> 
                <span id="job_title_{{ $experience->id }}">{{ $experience->job_title }}</span>

            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse {{ $loop->iteration  == 1 ? 'show' : '' }}" id="collapse{{ $experience->id }}"
                style="">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-8 mb-2">
                            <span class="font-weight-bold">Empresa: </span>
                            <span id="company_{{ $experience->id }}">{{ $experience->company }}</span>
                        </div>
                        <div class="col-md-2 mb-2">
                            <span class="font-weight-bold">Entrada: </span>
                            <span id="date_in_{{ $experience->id }}">{{ date('m/Y', strtotime($experience->date_in)) }}</span>
                        </div>
                        <div class="col-md-2 mb-2">
                            <span class="font-weight-bold">Saída: </span>
                            <span id="date_out_{{ $experience->id }}">{{ date('m/Y', strtotime($experience->date_out)) }}</span>
                        </div>
                    </div>
                    <span class="font-weight-bold">Descrição da Função: </span>
                    <span id="job_resume_{{ $experience->id }}">{{ $experience->job_resume }}</span>

                    <div class="row mt-2 mr-md-2 mb-3 d-flex flex-row-reverse">

                        <button class="btn btn-sm btn-danger btn-icon-split ml-2">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Excluir</span>
                        </button>

                        <button class="btn btn-sm btn-primary btn-icon-split ml-2"
                            onclick="openEditModal({{ $experience->id }})">
                            <span class="icon text-white-50">
                                <i class="fas fa-pencil-alt"></i>
                            </span>
                            <span class="text">Editar</span>
                        </button>


                    </div>

                </div>
            </div>
        </div>

        @empty
        <h4 class="text-center">Não existem experiências cadastradas para este perfil</h4>
        @endforelse

    </div>

</div>

<div class="row">
    <div class="col text-right mb-4">
        <a href="#" class="btn btn-primary btn-icon-split btn-sm m-0" data-toggle="modal"
            data-target="#experienceModal" onclick="openNewExpModal()">
            <span class="icon text-white-50">
                <i class="fas fa-user-plus"></i>
            </span>
            <span class="text">Nova Experiência</span>
        </a>
    </div>
</div>

@include('modals.form-experience-modal')

@endsection
