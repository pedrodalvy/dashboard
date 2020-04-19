<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return 'home';
})->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\AdminController@index')
        ->name('admin.home');

    Route::get('login', 'Auth\AdminLoginController@index')
        ->name('admin.login');

    Route::post('login', 'Auth\AdminLoginController@login')
        ->name('admin.login.submit');

    Route::get('logout', 'Auth\AdminLoginController@logout')
        ->name('admin.logout');

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

// Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
