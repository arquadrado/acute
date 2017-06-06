<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::resource('products', 'ProductController', [
    'as' => 'admin'
]);

Route::get('login', [
    'as' => 'admin.login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);

Route::post('login', [
    'as' => 'admin.login',
    'uses' => 'Auth\LoginController@login'
]);

Route::post('logout', [
    'as' => 'admin.logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'admin.register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);

Route::post('register', [
    'as' => 'admin.register',
    'uses' => 'Auth\RegisterController@register'
]);

// Password Reset Routes...
Route::get('password/reset/{token}', [
    'as' => 'admin.password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::post('password/email', [
    'as' => 'admin.password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);

Route::post('password/reset', [
    'as' => 'admin.password.reset',
    'uses' => 'Auth\ResetPasswordController@reset'
]);


Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

Route::get('/dashboard', [
    'as' => 'admin.dashboard',
    'uses' => 'DashboardController@dashboard'
]);
