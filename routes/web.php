<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return 'resume';
})->name('resume');



Route::prefix('admin')->group(function () {
    // Tela inicial do usuário
    Route::get('/', 'Admin\AdminController@index')
        ->name('admin.home');

    Route::get('users', 'User\UserController@index')
        ->name('admin.users');



    // Rotas para manutenção do currículo
    Route::prefix('resume')->group(function () {
        Route::get('profile', 'Resume\ResumeProfileController@index')
            ->name('resume.profile');

        Route::post('profile', 'Resume\ResumeProfileController@update')
            ->name('resume.profile.update');
    });
    

    // Rotas para visualização e manutenção das experiencias
    Route::resource('experience', 'Resume\ResumeExperienceController');


    // Abre o formulário de login
    Route::get('login', 'Auth\AdminLoginController@index')
        ->name('admin.login');

    // Rota para envio dos dados do formulário de login
    Route::post('login', 'Auth\AdminLoginController@login')
        ->name('admin.login.submit');

    // Faz logout e redireciona para tela de login
    Route::get('logout', 'Auth\AdminLoginController@logout')
        ->name('admin.logout');



    // Rotas para reset de senha
    Route::prefix('password')->group(function () {
        Route::get('reset', 'Auth\AdminResetPasswordController@showForm')
            ->name('admin.password.form');

        Route::post('reset', 'Auth\AdminResetPasswordController@reset')
            ->name('admin.password.reset');

        Route::get('reset/{token}', 'Auth\AdminResetPasswordController@showUpdatePassForm')
            ->name('admin.password.reset-form');

        Route::put('reset', 'Auth\AdminResetPasswordController@updatePassword')
            ->name('admin.password.update');
    });

});
