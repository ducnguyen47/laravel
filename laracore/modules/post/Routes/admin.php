<?php

$namespace = 'Modules\Post\Http\Controllers\Admin';

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web', 'auth:admin'],
    'prefix' => config('cms.admin_prefix')
], function () {
    Route::resource('posts', 'PostController');

    Route::group(['as' => 'post.', 'prefix' => 'post'], function () {
        Route::resource('categories', 'CategoryController');
    });
});
