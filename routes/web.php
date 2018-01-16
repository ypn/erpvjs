<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','\Modules\QuanLyXeRaVao\Http\Controllers\QuanLyXeRaVaoController@realtimeTracking');
Route::get('/login',function(){
    return view('login');
});
Route::get('/danh-sach-mua',function(){
  return view('quanlymua.danh_sach_mua');
});
Route::get('/tao-nhu-cau-mua',function(){
  return view('quanlymua.form_tao_nhu_cau_mua');
});
