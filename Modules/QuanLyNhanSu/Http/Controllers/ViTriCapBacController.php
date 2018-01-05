<?php

namespace Modules\QuanLyNhanSu\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Routing\Controller;
use Modules\QuanLyNhanSu\Entities\ViTriCapBac;
use Validator,Redirect,Config;

class ViTriCapBacController extends Controller
{

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Thêm mới vị trí cấp bậc.
     * @return Response
     */
    public function create()
    {
        $input = Input::all();

        $rules =[
          'ten'=>'required|min:3|max:255',
          'ten_viet_tat'=>'required|min:1|max:10'
        ];

        $validator = Validator::make($input,$rules);

        if($validator->fails()){
          return Redirect::back()->with([
            'status'=>Config::get('constants.VALIDATOR_FAILS')
          ]);
        }

        $result = ViTriCapBac::create($input);

        return Redirect::back()->with($result);    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: hiển thị danh sách vị trí cấp bậc.
     */
    public function list(){
      $list = ViTriCapBac::list();
      return view('quanlynhansu::vitri_capbac.list',[
        'title'=>'Vị trí- cấp bậc',
        'list'=>$list
      ]);
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc : xóa vị trí cấp bậc đã tạo.
     */
    public function destroy(){
      $input = Input::all();
      $result = ViTriCapBac::del($input['items']);

      return $result;
    }

    public function apiList(){
      $list = ViTriCapBac::list();
      return $list->toArray();
    }

}
