@extends('admin.auth.layout')

@section('content')
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row row-card-body">
                        <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">

                                @include('admin.auth.alert')

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">Esqueceu sua senha?</h1>
                                    <p class="mb-4">Basta digitar seu usuário e endereço de e-mail nos campos abaixo e será enviado um link para redefinição da senha.</p>
                                </div>

                                <form method="POST" action="{{ route('admin.password.reset') }}"
                                      autocomplete="off" class="user">

                                    @csrf

                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('user') is-invalid @enderror"
                                               type="text" id="user" name="user" aria-describedby="user"
                                               placeholder="Informe o usuário" value="{{ old('user') }}">
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('email') is-invalid @enderror"
                                               type="email" id="email" name="email" aria-describedby="email"
                                               placeholder="Informe o e-mail" value="{{ old('email') }}">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Resetar Senha</button>

                                </form>

                                <hr>

                                <div class="text-center">
                                    <a class="small" href="{{ route('admin.login') }}">Voltar para tela de login</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection