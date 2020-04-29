@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Perfil do usuário</h1>
<p class="mb-4">
    Visualizar e alterar dados do perfil.
</p>

<div class="card border-left-primary  shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastro</h6>
    </div>
    
    <div class="card-body">
        <table class="table table-borderless table-hover table-responsive-md table-resume-profile">
            <tbody>
                <tr>
                    <th scope="row" class="text-right ">Nome</th>
                    <td>{{ $user->name }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">E-Mail</th>
                    <td>{{ $user->email }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Login</th>
                    <td>{{ $user->user }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Alterado em</th>
                    <td>{{ formatDateBr($user->updated_at) }}</td>
                </tr>

            </tbody>
        </table>
        <div class="col mb-0 mt-3 ml-0 p-0">
            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-icon-split btn-sm m-0">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Editar</span>
            </a>
        </div>
    </div>
</div>

@endsection
