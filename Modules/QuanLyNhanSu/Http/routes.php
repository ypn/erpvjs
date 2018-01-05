<?php

Route::group(['middleware' => 'web', 'prefix' => 'quanlynhansu', 'namespace' => 'Modules\QuanLyNhanSu\Http\Controllers'], function()
{
    Route::group(['prefix'=>'vitri-capbac'],function(){
      Route::get('list','ViTriCapBacController@list');
      Route::post('create','VitriCapBacController@create');
      Route::post('destroy','ViTriCapBacController@destroy');

      Route::group(['prefix'=>'api'],function(){
        Route::get('list','ViTriCapBacController@apiList');
      });
    });
    Route::group(['prefix'=>'bophan-phongban'],function(){
      Route::get('list','BoPhanPhongBanController@list');
      Route::post('create','BoPhanPhongBanController@create');
      Route::post('destroy','BoPhanPhongBanController@destroy');
      Route::get('edit/{id}','BoPhanPhongBanController@edit');
    });
    Route::group(['prefix'=>'nhansu'],function(){
      Route::get('list','NhanSuController@list');
      Route::get('add','NhanSuController@add');
      Route::post('create','NhanSuController@create');
      Route::group(['prefix'=>'api'],function(){
        Route::get('list','NhanSuController@apiList');
      });
    });
});
