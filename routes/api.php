<?php

Route::group(['prefix' => 'auth', 'namespace' => 'Api', 'as' => 'authApi.'], function () {
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('refresh', 'AuthController@refresh')->name('refresh');
    Route::post('me', 'AuthController@me')->name('me');
});

Route::group([
    'prefix' => 'categories',
    'namespace' => 'Api',
    'as' => 'categories.',
    'middleware' => 'auth:api'
], function () {
    Route::get('/', 'CategoryController@index')->name('all');
    Route::post('/', 'CategoryController@add')->name('add');
    Route::get('/{category}/products', 'CategoryController@products')->name('products');
    Route::post('/{category}/update', 'CategoryController@update')->name('update');
    Route::post('/{category}/delete', 'CategoryController@delete')->name('delete');
});