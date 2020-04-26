<!-- Experience Modal-->
<div class="modal fade" id="experienceModal" tabindex="-1" role="dialog" aria-labelledby="experienceModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Editar cadastro</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <form>
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="job_title">Função</label>
                                <input type="text" class="form-control form-control-sm mb-0" id="job_title"
                                    name="job_title" placeholder="Informe a função exercida">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="company">Empresa</label>
                                <input type="text" class="form-control form-control-sm mb-0" id="company" name="company"
                                    placeholder="Empresa">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="date_in">Data de entrada</label>
                                <input type="text" class="form-control form-control-sm mb-0" id="date_in" name="date_in"
                                    placeholder="00/0000">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="date_out">Data de Saída</label>
                                <input type="text" class="form-control form-control-sm mb-0" id="date_out"
                                    name="date_out" placeholder="00/0000">
                            </div>
                        </div>
                        <div class="col-md-4 d-flex align-items-center pt-md-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="date_out_chek">
                                <label class="custom-control-label" for="date_out_chek">Trabalho atual?</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="job_resume">Descrição da função</label>
                                <textarea class="form-control form-control-sm" id="job_resume" name="job_resume"
                                    rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </form>



            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary load" id="send">Gravar</button>
            </div>

        </div>
    </div>
</div>

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
        console.log('{{ route("experience.index") }}/' + id);
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
        let formatted_date = new Date(date);
        console.log(formatted_date);
        console.log(date);
        return formatted_date.getMonth() + '/' + formatted_date.getFullYear();
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

                        <button class="btn btn-sm btn-danger btn-icon-split ml-2">
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

</script>
@endsection
