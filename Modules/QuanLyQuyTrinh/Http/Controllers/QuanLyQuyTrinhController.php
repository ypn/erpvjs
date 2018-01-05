<?php

namespace Modules\QuanLyQuyTrinh\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\QuanLyQuyTrinh\Entities\QuyTrinh;
use Illuminate\Support\Facades\Input;
use Validator,Redirect;

class QuanLyQuyTrinhController extends Controller
{
    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Hiển thị danh sách các quy trình.
     * @return Response
     */
    public function list()
    {
        $list= QuyTrinh::list();
        return view('quanlyquytrinh::quytrinh.list',[
          'title'=>'Danh sách quy trình',
          'list'=>$list
        ]);
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Tạo quy trình mới
     */
    public function create()
    {
      $input = Input::all();
      $rules=[
        'name'=>'required|min:3|max:255'
      ];

      $validator = Validator::make($input,$rules);

      if($validator->fails()){

        return Redirect::back()->with([
          'status'=>-1
        ]);
      }

      $result = QuyTrinh::create($input);

      return Redirect::back()->with($result);
    }

    /**
     * created by: ypn -ypn@vijagroup.com.vn
     * desc: Liệt kê danh sách các quy trình.
     */
    public function apiList(){
      $list = QuyTrinh::list();
      return $list->toArray();
    }

}
