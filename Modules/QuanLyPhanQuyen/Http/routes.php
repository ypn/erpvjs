<?php

Route::group(['middleware' => 'web', 'prefix' => 'quanlyphanquyen', 'namespace' => 'Modules\QuanLyPhanQuyen\Http\Controllers'], function()
{
    Route::group(['prefix'=>'nhom-nguoi-dung'],function(){
      Route::get('list','NhomNguoiDungController@list');
      Route::post('create','NhomNguoiDungController@create');
    });

    Route::group(['prefix'=>'quyen-nguoi-dung'],function(){
      Route::get('list','QuyenNguoiDungController@list');
      Route::post('create','QuyenNguoiDungController@create');
    });

});
