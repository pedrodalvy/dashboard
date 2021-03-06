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

                <form id="experienceForm">
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
                                <input type="text" class="form-control form-control-sm mb-0 " id="date_in" 
                                    name="date_in">
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="form-group">
                                <label for="date_out">Data de Saída</label>
                                <input type="text" class="form-control form-control-sm mb-0 " id="date_out"
                                    name="date_out">
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

