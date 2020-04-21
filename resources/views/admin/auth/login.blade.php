@extends('admin.auth.layout')

@section('content')

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row row-card-body" >
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">

                                @include('admin.auth.alert')

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem Vindo</h1>
                                </div>

                                <form method="POST" action="{{ route('admin.login.submit') }}"
                                      autocomplete="off" class="user">
                                    @csrf

                                    <div class="form-group">
                                        <input class="form-control form-control-user @error('user') is-invalid @enderror"
                                               type="text" id="user" name="user" aria-describedby="user"
                                               placeholder="Informe o usuário" value="{{ old('user') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               id="password" name="password" placeholder="Senha" value="{{ old('password') }}">
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small ml-1">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="remember" name="remember" {!! old('remember') ? 'checked' : '' !!}>
                                            <label class="custom-control-label" for="remember">Lembrar</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block load">Login</button>

                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small load" href="{{ route('admin.password.form') }}">Esqueceu a senha?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
