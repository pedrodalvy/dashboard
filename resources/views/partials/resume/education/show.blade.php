@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Detalhes da formação</h1>
<p class="mb-4">
    Visualização do cadastro da formação {{ $education->course }}.
</p>

<div class="card border-left-primary shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detalhes</h6>
    </div>


    <div class="card-body col-12">

        <div class="row">
            <div class="col-12 col-md-2 text-md-right">
                <span class="font-weight-bold">Curso: </span>
            </div>
            <div class="col-12 col-md-10">
                <span>{{ $education->course }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-2 text-md-right">
                <span class="font-weight-bold">Instituição: </span>
            </div>
            <div class="col-12 col-md-10">
                <span>{{ $education->establishment }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-2 text-md-right">
                <span class="font-weight-bold">Inicio: </span>
            </div>
            <div class="col-12 col-md-10">
                <span>{{ formatDateBR($education->date_in) }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-2 text-md-right">
                <span class="font-weight-bold">Fim: </span>
            </div>
            <div class="col-12 col-md-10">
                <span>{{ formatDateBR($education->date_out) }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-2 text-md-right">
                <span class="font-weight-bold">Descrição do Curso: </span>
            </div>
            <div class="col-12 col-md-10">
                <span>{{ $education->course_resume }}</span>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col text-left mb-4">
        <a href="{{ route('education.edit', $education->id)}}"
            class="btn btn-primary btn-icon-split btn-sm m-0">
            <span class="icon text-white-50">
                <i class="fas fa-pencil-alt"></i>
            </span>
            <span class="text">Editar</span>
        </a>

        <button class="btn btn-danger btn-icon-split btn-sm m-0">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">Remover</span>
        </button>
    </div>


    <div class="col text-right mb-4">
        <a href="{{ route('education.index') }}" class="btn btn-primary btn-icon-split btn-sm m-0">
            <span class="icon text-white-50">
                <i class="fas fa-arrow-alt-circle-left"></i>
            </span>
            <span class="text">Voltar</span>
        </a>
    </div>
</div>

@endsection
