<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Retorna um JSON com todas as informações cadastradas para o currículo
    Route::get('resume-info/{id}', 'Site\ResumeSiteController@allResumeData');

    // Recebe os dados do formulário para api de email.
    Route::post('send-message', 'Site\ResumeSiteController@sendMessage');

});
