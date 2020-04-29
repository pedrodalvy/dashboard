<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('resume.page'));
})->name('resume');


Route::prefix('resume')->group(function () {
    Route::get('resume', function() {
        return 'reserved for resume page';
    })->name('resume.page');

    // Retorna o link para download do currículo
    Route::get('download', function () {
       return redirect('uploads/' . 'currículo.pdf');
    })->name('resume.download');
});


Route::prefix('admin')->group(function () {
    // Tela inicial do usuário
    Route::get('/', 'Admin\AdminController@index')
        ->name('admin.home');

    Route::prefix('user')->group(function () {
        Route::get('show/{id}', 'User\UserController@show')
            ->name('user.show');
    });

    

        
    // Rotas para manutenção do currículo
    Route::prefix('resume')->group(function () {
        Route::get('profile', 'Resume\ResumeProfileController@index')
            ->name('resume.profile');

        Route::post('profile', 'Resume\ResumeProfileController@update')
            ->name('resume.profile.update');

        // Rotas para visualização e manutenção das experiencias
        Route::resource('experience', 'Resume\ResumeExperienceController');

        // Rotas para visualização e manutenção da formação
        Route::resource('education', 'Resume\ResumeEducationController');
    });


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
