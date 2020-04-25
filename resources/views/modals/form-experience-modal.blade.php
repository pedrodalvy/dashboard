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
                <button class="btn btn-primary load">Gravar</button>
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

    let openEditModal = function (id) {
        $('.loading').show();
        getExperienceById(id);
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

    let fillInputsModal = function (data) {
        $('#job_title').val(data.job_title);
        $('#company').val(data.company);
        $('#job_resume').val(data.job_resume);
        $('#date_in').val(data.date_in);
        $('#date_out').val(data.date_out);
    }

    $('#newExperienceModal').click(function () {
        clearInputsModal();
    });

    let clearInputsModal = function () {
        $('#job_title').val('');
        $('#company').val('');
        $('#job_resume').val('');
        $('#date_in').val('');
        $('#date_out').val('');
    }

</script>
@endsection
