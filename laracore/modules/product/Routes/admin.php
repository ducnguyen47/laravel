<?php

$namespace = 'Modules\Product\Http\Controllers\Admin';

Route::group([
    'namespace' => $namespace,
    'middleware' => ['web', 'auth:admin'],
    'prefix' => config('cms.admin_prefix')
], function () {
    Route::resource('products', 'ProductController');

    Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
        Route::resource('categories', 'CategoryController');
    });
});
