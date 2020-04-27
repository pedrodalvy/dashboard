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
                            <span
                                id="date_in_{{ $experience->id }}">{{ date('m/Y', strtotime($experience->date_in)) }}</span>
                        </div>
                        <div class="col-md-2 mb-2">
                            <span class="font-weight-bold">Saída: </span>
                            <span
                                id="date_out_{{ $experience->id }}">{{ date('m/Y', strtotime($experience->date_out)) }}</span>
                        </div>
                    </div>
                    <span class="font-weight-bold">Descrição da Função: </span>
                    <span id="job_resume_{{ $experience->id }}">{{ $experience->job_resume }}</span>

                    <div class="row mt-2 mr-md-2 mb-3 d-flex flex-row-reverse">

                        <button class="btn btn-sm btn-danger btn-icon-split ml-2"
                            onclick="openRemoveModal({{ $experience->id }}, '{{ $experience->job_title }}')">
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
        <a href="#" class="btn btn-primary btn-icon-split btn-sm m-0" data-toggle="modal" data-target="#experienceModal"
            onclick="openNewExpModal()">
            <span class="icon text-white-50">
                <i class="fas fa-user-plus"></i>
            </span>
            <span class="text">Nova Experiência</span>
        </a>
    </div>
</div>

@include('modals.remove-experience-modal')
@include('modals.form-experience-modal')

@endsection

@section('script')
<script>
    $('#date_out_chek').click(function () {
        if ($('#date_out_chek').is(':checked')) {
            $('#date_out').val('');
            $('#date_out').prop('disabled', true);
        } else {
            $('#date_out').prop('disabled', false);
        }
    })

    $('#send').click(function () {
        if ($('#id').val()) {
            updateExperience($('#id').val());
        } else {
            createExperience();
        }
    })

    let openEditModal = function (id) {
        $('.loading').show();
        updateTitleModal('Editar cadastro');
        getExperienceById(id);
    }

    let openNewExpModal = function () {
        updateTitleModal('Novo Cadastro');
        clearInputsModal();
    }

    let updateTitleModal = function (title) {
        $('#titleModal').text(title);

    }

    let fillInputsModal = function (data) {
        $('#id').val(data.id);
        $('#job_title').val(data.job_title);
        $('#company').val(data.company);
        $('#job_resume').val(data.job_resume);
        $('#date_in').val(data.date_in);
        $('#date_out').val(data.date_out);
    }

    let clearInputsModal = function () {
        $('#id').val('');
        $('#job_title').val('');
        $('#company').val('');
        $('#job_resume').val('');
        $('#date_in').val('');
        $('#date_out').val('');
    }

    let getFormVaules = function () {
        return {
            job_title: $('#job_title').val(),
            company: $('#company').val(),
            job_resume: $('#job_resume').val(),
            date_in: $('#date_in').val(),
            date_out: $('#date_out').val(),
        }
    }

    let getExperienceById = function (id) {
        return $.get(
            '{{ route("experience.index") }}/' + id + '/edit'

        ).done(function (data) {
            $('#experienceModal').modal('show');
            fillInputsModal(JSON.parse(data));
            $('.loading').hide();

        }).fail(function () {
            alert('erro');

        });
    }

    let updateExperience = function (id) {
        $('#experienceModal').modal('hide');

        $.ajax({
            url: '{{ route("experience.index") }}/' + id,
            method: 'PUT',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').attr('value')
            },
            data: getFormVaules()
        }).done(function (data) {
            $('.loading').hide();

            data = JSON.parse(data);

            if (data.id) {
                updateExperienceView(data);
                showNotification('Cadastro alterado com sucesso.', 'success');
            } else {
                showNotification('Houve um erro ao tentar atualizar o cadastro.', 'error');
            }
        });
    }

    let createExperience = function () {
        $('#experienceModal').modal('hide');
        $.ajax({
            url: '{{ route("experience.store") }}',
            method: 'POST',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').attr('value')
            },
            data: getFormVaules()
        }).done(function (data) {
            $('.loading').hide();

            data = JSON.parse(data);

            if (data.id) {
                addExperienceView(data);
                showNotification('Cadastro criado com sucesso.', 'success');
            } else {
                showNotification('Houve um erro ao tentar fazer o cadastro.', 'error');
            }
        });
    }

    let updateExperienceView = function (data) {
        let id = data.id;

        $('#job_title_' + id).text(data.job_title);
        $('#company_' + id).text(data.company);
        $('#job_resume_' + id).text(data.job_resume);
        $('#date_in_' + id).text(experienceDateFormat(data.date_in));
        $('#date_out_' + id).text(experienceDateFormat(data.date_out));
    }


    let experienceDateFormat = function (date) {

        return moment(date).format('MM/YYYY');
    }


    let addExperienceView = function (data) {
        let html = `
        <div class="card shadow mb-1" id="experience_id_${ data.id }">
            <!-- Card Header - Accordion -->
            <a href="#collapse${ data.id }" class="d-block card-header py-3" data-toggle="collapse"
                role="button" aria-expanded="false"
                aria-controls="collapse${ data.id }">

                <span class="font-weight-bold">Função: </span> 
                <span id="job_title_${ data.id }">${ data.job_title }</span>

            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapse${ data.id }"
                style="">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-8 mb-2">
                            <span class="font-weight-bold">Empresa: </span>
                            <span id="company_${ data.id }">${ data.company }</span>
                        </div>
                        <div class="col-md-2 mb-2">
                            <span class="font-weight-bold">Entrada: </span>
                            <span id="date_in_${ data.id }"> ${ experienceDateFormat(data.date_in) } </span>
                        </div>
                        <div class="col-md-2 mb-2">
                            <span class="font-weight-bold">Saída: </span>
                            <span id="date_out_${ data.id }">${ experienceDateFormat(data.date_out) }</span>
                        </div>
                    </div>
                    <span class="font-weight-bold">Descrição da Função: </span>
                    <span id="job_resume_${ data.id }">${ data.job_resume }</span>

                    <div class="row mt-2 mr-md-2 mb-3 d-flex flex-row-reverse">

                        <button class="btn btn-sm btn-danger btn-icon-split ml-2"
                            onclick="openRemoveModal(${ data.id }, '${ data.job_title }')">
                            <span class="icon text-white-50">
                                <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Excluir</span>
                        </button>

                        <button class="btn btn-sm btn-primary btn-icon-split ml-2"
                            onclick="openEditModal(${ data.id })">
                            <span class="icon text-white-50">
                                <i class="fas fa-pencil-alt"></i>
                            </span>
                            <span class="text">Editar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>`;

        $('#experienceCardBody').append(html);
    };


    $('#delete').click(function () {
        removeExperience($('#id_remove').val());
    })

    let openRemoveModal = function (id, title) {
        $('#removeExperienceModal').modal('show');
        updateContentModal(id, title);
    }


    let updateContentModal = function (id, title) {
        $('#contentRemoveModal').text(title);
        $('#id_remove').val(id);
    }

    let removeExperienceview = function (id) {
        $('#experience_id_' + id).remove();
    }

    let removeExperience = function (id) {
        $('#removeExperienceModal').modal('hide');
        $.ajax({
            url: '{{ route("experience.index") }}/' + id,
            method: 'DELETE',
            headers: {
                'X-CSRF-Token': $('input[name="_token"]').attr('value')
            }
        }).done(function (data) {
            $('.loading').hide();

            data = JSON.parse(data);

            if (data.type == 'success') {
                $('#experience_id_' + id).remove();
                showNotification(data.message, data.type);
            } else {
                showNotification(data.message, data.type);
            }
        });
    }

    let showNotification = function (message, type) {
        PNotify.alert({
            text: message,
            type: type,
            textTrusted: true,
            modules: {
                Buttons: {
                    closer: false,
                    sticker: false
                }
            },
            width: screenWidth,
            stack: window.stackTopCenter
        })
    }

    showNotification.on('click', function () {
        showNotification.close();
    });




</script>
@endsection
