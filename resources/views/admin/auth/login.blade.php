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

                                @if ($errors->any())
                                    <div class="alert alert-danger alert-danger--form">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem Vindo</h1>
                                </div>

                                <form class="user" method="POST" action="{{ route('admin.login.submit') }}"
                                      autocomplete="off">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="user" name="user" aria-describedby="emailHelp"
                                               placeholder="Informe o usuário">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                               id="password" name="password" placeholder="Senha">
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="remember" name="remember">
                                            <label class="custom-control-label" for="remember">Lembrar</label>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                                </form>

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
