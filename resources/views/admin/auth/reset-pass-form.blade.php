@extends('admin.auth.layout')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row row-card-body">
                        <div class="col-lg-6 d-none d-lg-block bg-reset-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">

                                @include('admin.auth.alert')

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Redefinição de Senha</h1>
                                    <p class="mb-4">Informe sua nova senha nos campos abaixo para redefiní-la</p>
                                </div>

                                <form method="POST" action="{{ route('admin.password.reset') }}"
                                      autocomplete="off" class="user">

                                    @csrf

                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('password') is-invalid @enderror"
                                               type="password" id="password" name="password" aria-describedby="password"
                                               placeholder="Informe a senha">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('email') is-invalid @enderror"
                                               type="password" id="password_confirm" name="password_confirm" aria-describedby="password_confirm"
                                               placeholder="Repita a senha">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Atualizar Senha</button>

                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ route('admin.login') }}">Ir para tela de login</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection