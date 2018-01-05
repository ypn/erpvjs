<?php

Route::group(['middleware' => 'web', 'prefix' => 'quanlyquytrinh', 'namespace' => 'Modules\QuanLyQuyTrinh\Http\Controllers'], function()
{
    Route::group(['prefix'=>'quan-ly-quy-trinh'],function(){
      Route::get('list', 'QuanLyQuyTrinhController@list');
      Route::post('create','QuanLyQuyTrinhController@create');

      Route::group(['prefix'=>'api'],function(){
        Route::get('list','QuanLyQuyTrinhController@apiList');
      });
    });

    Route::group(['prefix'=>'line-duyet'],function(){
      Route::get('list','LineDuyetController@list');
      Route::get('add','LineDuyetController@add');
      Route::post('create','LineDuyetController@create');
    });
});
