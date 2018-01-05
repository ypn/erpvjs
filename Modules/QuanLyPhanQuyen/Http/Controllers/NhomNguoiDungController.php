<?php

namespace Modules\QuanLyPhanQuyen\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\QuanLyPhanQuyen\Entities\Permissions;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\QueryException;
use Sentinel,Validator,Redirect,Config;

class NhomNguoiDungController extends Controller
{
    /**
     * created by: ypn - ypn@vijagroup.com.vn.
     * desc: Hiển thị danh sách vai trò người dùng.
     */
    public function list()
    {
        $list =Sentinel::getRoleRepository()->get();
        $lsPermission = Permissions::list();
        return view('quanlyphanquyen::nhomnguoidung.list',[
          'title'=>'Vai trò người dùng',
          'list'=>$list,
          'lsPermissions'=>$lsPermission
        ]);
    }

    /**
     *  created by: ypn - ypn@vijagroup.com.vn
     *  desc: Tạo nhóm người dùng mới.
     */
    public function create(){
      $input = Input::all();
      $rules = [
        'ten'=>'required|min:3|max:255'
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()){
        return Redirect::back()->with([
            'status'=>Config::get('constants.VALIDATOR_FAILS')
        ]);
      }

      $permissions = Permissions::listSlugs($input['ids_permission']);

      try{

        $role = Sentinel::getRoleRepository()->createModel()->create([
            'name' => $input['ten'],
            'slug' => str_slug($input['ten'],'-')
        ]);

        $role->permissions = array_column($permissions,'alias');
        $role->save();

        return Redirect::back()->with([
          'status'=>Config::get('constants.HANDLE_SUCCESS')
        ]);

      }catch(QueryException $ex){
        //Log lỗi
        return Redirect::back()->with([
          'status'=>Config::get('constants.ERROR_QUERY'),
          'code'=>$ex->getCode()
        ]);
      }
    }

}
