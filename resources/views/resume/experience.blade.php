@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Cadastro de Experiências</h1>
<p class="mb-4">
    Relação com todas as experiências profissionais cadastradas.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Experiências</h6>
    </div>


    <div class="card-body col-12">
        @forelse($experiences as $experience)

        <div class="card shadow mb-1">
            <!-- Card Header - Accordion -->
            <a href="#collapse{{ $experience->id }}" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="true" aria-controls="collapse{{ $experience->id }}">

                <span class="font-weight-bold">Função: </span> {{ $experience->job_title }}

            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapse{{ $experience->id }}" style="">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-8 mb-2">
                            <span class="font-weight-bold">Empresa: </span> {{ $experience->company }}
                        </div>
                        <div class="col-md-2 mb-2">
                            <span class="font-weight-bold">Entrada: </span>
                            {{ date('m/Y', strtotime($experience->date_in)) }}
                        </div>
                        <div class="col-md-2 mb-2">
                            <span class="font-weight-bold">Saída: </span>
                            {{ date('m/Y', strtotime($experience->date_out))  }}
                        </div>
                    </div>
                    <span class="font-weight-bold">Descrição da Função: </span>
                    {{ $experience->job_resume }}

                    <div class="row mt-2 mr-md-2 mb-2 d-flex flex-row-reverse">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-sm btn-secondary">Editar</button>
                            <button type="button" class="btn btn-sm btn-secondary">Remover</button>
                          </div>
                    </div>
                    
                </div>
            </div>
        </div>

        @empty

        @endforelse


    </div>
</div>

@endsection
