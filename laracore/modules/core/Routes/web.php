<?php 

$namespace = 'Modules\Core\Http\Controllers\Web';

Route::group([
    'namespace' => $namespace
], function () {
    Route::get('{name}', 'SluggableController@index')->where('name', '[a-zA-Z0-9-_]+')->name('sluggable');
});