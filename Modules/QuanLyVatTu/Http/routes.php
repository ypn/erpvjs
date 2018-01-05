<?php

Route::group(['middleware' => 'web', 'prefix' => 'quanlyvattu', 'namespace' => 'Modules\QuanLyVatTu\Http\Controllers'], function()
{
    Route::get('/', 'QuanLyVatTuController@index');
});
