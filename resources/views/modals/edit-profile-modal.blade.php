<div class="modal fade" id="editProfile" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="editProfile" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfile">Editar Perfil</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ route('resume.profile.update') }}" autocomplete="off"
                    enctype="multipart/form-data" id="editProfileForm" class="load-afterValidate">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Nome Completo</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                value="{{ $data->name }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">E-Mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder=""
                                value="{{ $data->email }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fone">Telefone</label>
                            <input type="text" class="form-control fone" name="fone" id="fone" placeholder=""
                                value="{{ $data->fone }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder=""
                                value="{{ $data->address }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="function">Profissão</label>
                            <input type="text" class="form-control" name="function" id="function" placeholder=""
                                value="{{ $data->function }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pricing">Pretensão salarial</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="cifrao">R$</span>
                                </div>
                                <input type="text" class="form-control money" name="pricing" id="pricing" placeholder=""
                                    value="{{ $data->pricing }}" required aria-describedby="cifrao">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" class="form-control" name="linkedin" id="linkedin" placeholder=""
                                value="{{ $data->linkedin }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="github">Github</label>
                            <input type="text" class="form-control" name="github" id="github" placeholder=""
                                value="{{ $data->github }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="site">Site</label>
                            <input type="text" class="form-control" name="site" id="site" placeholder=""
                                value="{{ $data->site }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="resume">Currículo</label>
                            <div class="custom-file cursor-pointer">
                                <input type="file" class="custom-file-input cursor-pointer" id="resume" name="resume"
                                    hidden>
                                <label class="custom-file-label cursor-pointer" for="resume" data-browse="Buscar">
                                    Fazer upload do arquivo
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="description">Descrição pessoal</label>
                                <textarea class="form-control" id="description" rows="3" name="description"
                                    required>{{ $data->description }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="skills">Skills</label>
                                <input class="form-control"  type="text" name="skills" id="skills" data-role="tagsinput"
                                    value="{{ $data->skills }}">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button type="submit" form="editProfileForm" class="btn btn-primary" 
                    href="javascript:void(0)">Gravar</button>
            </div>
        </div>
    </div>
</div>