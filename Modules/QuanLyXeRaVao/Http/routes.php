<?php

Route::group(['middleware' => 'web', 'prefix' => 'quanlyxeravao', 'namespace' => 'Modules\QuanLyXeRaVao\Http\Controllers'], function()
{
    Route::get('/', 'QuanLyXeRaVaoController@realtimeTracking');
    Route::group(['prefix'=>'checkpoints'],function(){
      Route::get('list','CheckPoinController@list');
      Route::get('add','CheckPoinController@add');
      Route::post('create','CheckPoinController@create');
      Route::get('edit/{id}','CheckPoinController@edit');
      Route::post('update/{id}','CheckPoinController@update');
      Route::group(['prefix'=>'api'],function(){
        Route::get('list','CheckPoinController@apiList');
      });
    });
});
