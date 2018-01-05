<?php

namespace Modules\QuanLyPhanQuyen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\QuanLyPhanQuyen\Entities\Permissions;
use Sentinel,Validator,Redirect,Config;

class QuyenNguoiDungController extends Controller
{
    /**
     * created by: ypn ypn@vijagroup.com.vn.
     * desc: Hiển thị danh sách quyền người dùng.
     */
    public function list()
    {
        $list = Permissions::list();
        return view('quanlyphanquyen::quyennguoidung.list',[
          'title'=>'Quyền người dùng',
          'list'=>$list
        ]);
    }

    /**
     * created by: ypn ypn@vijagroup.com.vn
     * desc: Tạo quyền mới
     */
    public function create(){
      $input = Input::all();
      $rules = [
        'ten'=>'required|min:3|max:255',
        'alias'=>'required|min:3|max:255'
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()){
        Redirect::back()->with([
          'status'=>Config::get('constants.VALIDATOR_FAILS')
        ]);
      }

      $result = Permissions::create($input);

      return Redirect::back()->with($result);
    }

}
