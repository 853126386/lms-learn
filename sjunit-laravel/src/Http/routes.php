<?php

Route::get('/', 'SJunitController@index');
Route::post('/', 'SJunitController@store')->name('junit.store');

Route::get('test', 'TestController@index');
