<?php

$namespace = 'Modules\Widget\Http\Controllers\Admin';

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web', 'auth:admin'],
    'prefix' => config('cms.admin_prefix')
], function () {
    Route::resource('widgets', 'WidgetController');
});
