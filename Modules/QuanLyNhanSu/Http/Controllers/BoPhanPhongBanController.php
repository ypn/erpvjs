<?php

namespace Modules\QuanLyNhanSu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\QuanLyNhanSu\Entities\BoPhanPhongBan;
use Config;
use Validator,Redirect;

class BoPhanPhongBanController extends Controller
{
    /**
     * created by: ypn - ypn@vijagroup@gmail.com
     * Hiển thị danh sách phòng ban
     * @return Response
     */
    public function list()
    {
        $list = BoPhanPhongBan::list();
        return view('quanlynhansu::bophan_phongban.list',[
          'title'=>'Danh sách bộ phận - phòng ban',
          'list'=>$list
        ]);
    }

    /*
    * created by: ypn - ypn@vijagroup.com.vn
    * desc: Tạo mới phòng ban
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

      $result = BoPhanPhongBan::create($input);

      return Redirect::back()->with($result);
    }

    /*
    * created by: ypn - ypn@vijagroup.com.vn
    * desc: Xóa 1 phòng ban đã tạo.
    */
    public function destroy(){
      $input = Input::all();

      $result = BoPhanPhongBan::del($input['items']);

      return $result;

    }

    /*
    * created by: ypn - ypn@vijagroup.com.vn
    * desc: cập nhật - chỉnh sửa phòng ban đã tạo.
    */
    public function update(){

    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn.
     * desc: Form chỉnh sửa bộ phận phòng ban đã tạo.
     */
    public function edit (){    
      return view ('quanlynhansu::bophan_phongban.update');
    }


    public function uber(){

    }
}
