@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Cadastro de Formações</h1>
<p class="mb-4">
    Relação com todas as formações cadastradas.
</p>

<div class="card border-left-primary shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Formações</h6>
    </div>


    <div class="card-body col-12 ">
        <div class="table-responsive">


            <table class="table table-hover table-resume-education">
                <thead>
                    <tr>
                        <th scope="col" class="course">Curso</th>
                        <th scope="col" class="establishment">Instituição</th>
                        <th scope="col" class="text-center date_in">Inicio</th>
                        <th scope="col" class="text-center date_out">Fim</th>
                        <th scope="col" class="text-center actions">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($educations as $education)
                    <tr>
                        <td>{{ $education->course }}</td>
                        <td>{{ $education->establishment }}</td>
                        <td>{{ formatDateBr($education->date_in) }}</td>
                        <td>{{ formatDateBr($education->date_out) }}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('education.show', $education->id)}}" title="Visualizar"
                                    class="btn btn-circle btn-sm btn-info load">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                                <button type="submit" class="btn btn-circle btn-sm btn-danger load" title="Remover"
                                    form="remove_{{$education->id}}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <form action="{{ route('education.destroy', $education->id)}}"
                                id="remove_{{$education->id}}" method="POST" hidden>
                                @method('DELETE')
                                @csrf
                            </form>
                        </td>
                    </tr>
                    @empty
                    <h3 class="text-center">Não existem formações cadastradas para este perfil</h3>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<div class="row">
    <div class="col text-right mb-4">
        <a href="{{ route('education.create')}}" class="btn btn-primary btn-icon-split btn-sm m-0">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Adicionar formação</span>
        </a>
    </div>
</div>

@endsection
