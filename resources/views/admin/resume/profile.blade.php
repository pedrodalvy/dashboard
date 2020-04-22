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

    <div class="card-body">

    <form method="POST" action="{{ route('resume.profile.update') }}" autocomplete="off" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name">Nome Completo</label>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="" value="{{ $data->name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="resume">Currículo</label>
                    <div class="custom-file cursor-pointer">
                        <input type="file" class="custom-file-input cursor-pointer" id="resume" name="resume" hidden>
                        <label class="custom-file-label cursor-pointer" for="resume" data-browse="Buscar">
                            Fazer upload do arquivo
                        </label>
                      </div>
                </div>

            </div>
            <div class="form-group mb-3">
                <label for="description">Descrição pessoal</label>
                <textarea class="form-control" id="description" rows="3" name="description"
                    required>{{ $data->description }}</textarea>
            </div>

            <button class="btn btn-primary load" type="submit">Gravar</button>
        </form>

    </div>
</div>

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
