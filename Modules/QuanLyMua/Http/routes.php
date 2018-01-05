<?php

Route::group(['middleware' => 'web', 'prefix' => 'muahang', 'namespace' => 'Modules\QuanLyMua\Http\Controllers'], function()
{
    Route::get('/danh-sach-phieu-nhu-cau','QuanLyMuaController@list');
    Route::get('/tao-nhu-cau-mua','QuanLyMuaController@add');
    Route::get('/', 'QuanLyMuaController@index');
});
