@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Perfil do usuário</h1>
<p class="mb-4">
    Visualizar e alterar dados do perfil.
</p>

<div class="card border-left-primary  shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar cadastro</h6>
    </div>

    <div class="card-body">
        <form action="{{ route('user.update', $user->id)}}" method="post" id="userEditForm">
            @csrf
            <div class="row mb-2">
                <div class="col-12 col-md-2 text-md-right align-middle">
                    <span class="font-weight-bold">Nome: </span>
                </div>
                <div class="col-12 col-md-10">
                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name"/>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12 col-md-2 text-md-right align-middle">
                    <span class="font-weight-bold">E-Mail: </span>
                </div>
                <div class="col-12 col-md-10">
                    <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email"/>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12 col-md-2 text-md-right align-middle">
                    <span class="font-weight-bold">Senha: </span>
                </div>
                <div class="col-12 col-md-10">
                    <input type="password" class="form-control" name="password" id="password"/>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-12 col-md-2 text-md-right align-middle">
                    <span class="font-weight-bold">Repita a senha: </span>
                </div>
                <div class="col-12 col-md-10">
                    <input type="password" class="form-control" name="password_confirm" id="password_confirm"/>
                </div>
            </div>

            <div class="row">
                <div class="col text-right ">
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-danger" type="button">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
