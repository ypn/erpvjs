<?php

Route::group(['middleware' => 'web', 'prefix' => 'hethong', 'namespace' => 'Modules\HeThong\Http\Controllers'], function()
{
    Route::group(['prefix'=>'line-duyet'],function(){
      Route::get('/list','LineDuyetController@list');
      Route::get('/add','LineDuyetController@showAddViewer');
    });
    Route::group(['prefix'=>'quan-ly-quy-trinh'],function(){
      Route::get('/list','QuanlyQuyTrinhController@list');
      Route::post('/create','QuanlyQuyTrinhController@create');
    });
});
