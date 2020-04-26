<!-- Experience Modal-->
<div class="modal fade" id="removeExperienceModal" tabindex="-1" role="dialog" aria-labelledby="removeExperienceModal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Deseja remover este cadastro?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <form>
                    @csrf
                    <input type="hidden" name="id" id="id_remove">
                    <div class="row">
                        <p>Para remover o cadastro <span class="font-weight-bold" id="contentRemoveModal"></span>, clique em Remover, caso contrário clique em Cancelar.</p>
                    </div>

                </form>

            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger load" id="delete">Remover</button>
            </div>

        </div>
    </div>
</div>
