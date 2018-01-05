<?php

namespace Modules\QuanLyNhanSu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Database\QueryException;
use Modules\QuanLyNhanSu\Entities\BoPhanPhongBan;
use Modules\QuanLyNhanSu\Entities\VitriCapBac;
use Sentinel,Config,Redirect,Input,Validator;

class NhanSuController extends Controller
{
    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Hiển thị danh sách nhân sự.
     */
    public function list()
    {
        $list = $users = Sentinel::getUserRepository()->get();

        if(!empty($list->toArray())){
          foreach($list as $l){
            $l->bophan_phongban = BoPhanPhongBan::getName($l->deparment);
            $l->vitri_capbac = VitriCapBac::getName($l->position);
          }
        }

        return view('quanlynhansu::nhansu.list',[
          'title'=>'Danh sách nhân sự.',
          'list'=>$list
        ]);
    }

    /**
     * created by: ypn-ypn@vijagroup.com.vn
     * desc: Hiển thị form thêm nhân sự mới.
     */
    public function add(){

      return view('quanlynhansu::nhansu.add',[
        'title'=>'Thêm nhân sự mới.',
        'lsPhongban' =>  BoPhanPhongBan::list(),
        'lsVitri' =>  VitriCapBac::list()
      ]);
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Tạo nhân sự mới ở trạng thái chưa active
     */
    public function create(){
      $input = Input::all();

      $rules=[
        'ho'=>'required|min:3|max:255',
        'ten'=>'required|min:3|max:255',
        'ten_hien_thi'=>'required|min:3|max:255',
        'email'=>'required|email'
      ];

      $messages=[
        'ho.required'=>'Tên không thể trống',
        'ten.required'=>'Tên không thể trống',
        'ten_hien_thi.required'=>'Định dạng tên hiển thị không hợp lệ',
        'email.required'=>'Cần nhập email'
      ];

      $validator = Validator::make($input,$rules,$messages);

      if($validator->fails()){
        //print_r($validator->messages());
        return Redirect::back()->with([
          'status'=>Config::get('constants.VALIDATOR_FAILS')
        ]);
      }

      $credentials = [
        'email'=>$input['email'],
        'first_name'=>$input['ho'],
        'last_name'=>$input['ten'],
        'password'=>'@123456',
        'deparment'=>$input['phong_ban'],
        'position'=>$input['position'],
        'display_name'=>$input['ten_hien_thi']
      ];

      try{
          $user = Sentinel::register($credentials);
          return Redirect::back()->with([
            'status'=>Config::get('constants.HANDLE_SUCCESS'),
            'name'=>$input['ten_hien_thi']
          ]);
      }catch(QueryException $ex){
        return Redirect::back()->with([
          'status'=>Config::get('constants.ERROR_QUERY'),
          'code'=>$ex->getCode()
        ]);
      }

    }

    public function apiList(){
      $list = $users = Sentinel::getUserRepository()->get();

      if(!empty($list->toArray())){
        foreach($list as $l){
          $l->bophan_phongban = BoPhanPhongBan::getName($l->deparment);
          $l->vitri_capbac = VitriCapBac::getName($l->position);
        }
      }

      return $list->toArray();

    }

}
