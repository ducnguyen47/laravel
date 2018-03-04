<?php

$namespace = 'Modules\Core\Http\Controllers\Admin';

Route::group([
    'prefix' => config('admin.url_prefix'),
    'namespace' => $namespace,
    'middleware' => ['web', 'auth:admin'],
    'as' => 'admin.'
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
});