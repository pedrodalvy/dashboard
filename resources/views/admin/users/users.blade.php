@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Usuários</h1>
<p class="mb-4">
    Relação com todos os usuários administradores do sistema.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lista de usuários</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th class="text-center text-nowrap">Data de Cadastro</th>
                        <th class="text-center">Ativo</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="text-nowrap">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center text-nowrap">{{ $user->created_at->format('d/m/Y à\s H:i') }}</td>
                        <td class="text-center">Sim</td>
                        <td class="text-center"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
