<?php

$namespace = 'Modules\Core\Http\Controllers\Admin';

Route::group([
    'prefix' => config('admin.url_prefix'),
    'namespace' => $namespace,
    'middleware' => ['web', 'auth:admin'],
    'as' => 'admin.'
], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('settings/template', 'SettingController@template')->name('settings.template');
    Route::get('settings', 'SettingController@index')->name('settings');
    Route::post('settings/update', 'SettingController@update')->name('settings.update');

    Route::get('navigation', 'MenuController@index')->name('navigation');
});
