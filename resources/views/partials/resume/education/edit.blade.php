@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Editar formação</h1>
<p class="mb-4">
    Editar cadastro da formação {{ $education->course }}.
</p>
<div class="card border-left-primary shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
    </div>


    <div class="card-body col-12">
        <form action="{{ route('education.update', $education->id )}}" method="POST" id="formEducation">
            @method('PUT')
            @csrf
            @include('partials.resume.education._form')

            <div class="row">
                <div class="col text-right ">
                    <a href="{{ route('education.show', $education->id) }}" class="btn btn-danger" type="button">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </form>
        
    </div>

</div>

@endsection
