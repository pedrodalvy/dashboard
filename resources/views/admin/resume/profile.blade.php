@extends('admin.layouts.admin-dashboard')

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Perfil do currículo</h1>
<p class="mb-4">
    Visualização do perfil do currículo.
</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Alterar dados do perfil</h6>
    </div>

    <div class="card-body col-12">

        <table class="table table-borderless table-hover table-responsive-md">
            <tbody>
                <tr>
                    <th scope="row" class="text-right ">Nome</th>
                    <td>{{ $data->name }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">E-Mail</th>
                    <td>{{ $data->email }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Telefone</th>
                    <td>{{ $data->fone }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Endereço</th>
                    <td>{{ $data->address }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Profissão</th>
                    <td>{{ $data->function }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right text-nowrap">Pretensão salarial</th>
                    <td>{{ $data->pricing }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Linkedin</th>
                    <td>{{ $data->linkedin ?? 'Não informado' }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Github</th>
                    <td>{{ $data->github ?? 'Não informado' }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Site</th>
                    <td>{{ $data->site ?? 'Não informado' }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Descrição</th>
                    <td>{{ $data->description }}</td>
                </tr>

                <tr>
                    <th scope="row" class="text-right">Currículo</th>
                    <td>Criar botão de download</td>
                </tr>
            </tbody>
        </table>

        <div class="col mb-0 mt-3 ml-0 p-0">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm m-0" data-toggle="modal"
                data-target="#editProfile">
                <span class="icon text-white-50">
                    <i class="fas fa-pen"></i>
                </span>
                <span class="text">Editar</span>
            </a>
        </div>
    </div>
</div>

@include('modals.edit-profile-modal')

@endsection

@section('script')
<script>
    // Add the following code if you want the name of the file appear on select
    $("#resume").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
@endsection
