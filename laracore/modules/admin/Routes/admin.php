<?php

$namespace = 'Modules\Admin\Http\Controllers\Admin';

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web']
], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
    // Password Reset Routes...
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('register');
});


Route::group([
    'namespace' => $namespace,
    'middleware' => ['web', 'auth:admin'],
    'prefix' => config('cms.admin_prefix')
], function () {
    Route::resource('admins', 'AdminController');
});
