<?php

Route::group(['middleware' => 'web', 'prefix' => 'quanlyxeravao', 'namespace' => 'Modules\QuanLyXeRaVao\Http\Controllers'], function()
{
    Route::get('/', 'QuanLyXeRaVaoController@entry');
    Route::get('report','QuanLyXeRaVaoController@report');
    Route::group(['prefix'=>'report'],function(){
      Route::get('detail','QuanLyXeRaVaoController@getReportDetail');
    });
    Route::group(['prefix'=>'checkpoints'],function(){
      Route::get('list','CheckPoinController@list');
      Route::get('add','CheckPoinController@add');
      Route::post('create','CheckPoinController@create');
      Route::get('edit/{id}','CheckPoinController@edit');
      Route::post('update/{id}','CheckPoinController@update');
      Route::post('delete/{id}','CheckPoinController@delete');
      Route::group(['prefix'=>'api'],function(){
        Route::get('list','CheckPoinController@apiList');
        Route::get('list-tracking-car','CheckPoinController@listTrackingCar');
      });
    });

    Route::group(['prefix'=>'session-tracking'],function(){
      Route::get('list','SessionsTrakingController@list');
      Route::get('checking/{id}','SessionsTrakingController@checking');
    });

    Route::group(['prefix'=>'object-tracking'],function(){
      Route::get('{id}','ObjectTrackingController@getTypeInfo');
      Route::get('{type_id}/{objec_id}','ObjectTrackingController@getObjectInfo');
    });

});
