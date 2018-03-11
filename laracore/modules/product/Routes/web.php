<?php

Route::group(['namespace' => 'Modules\Product\Http\Controllers\Web'], function () {
    Route::get('san-pham/tim-kiem', 'ProductController@search')->name('product.search');
});