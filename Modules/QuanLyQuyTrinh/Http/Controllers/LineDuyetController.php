<?php

namespace Modules\QuanLyQuyTrinh\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\QuanLyQuyTrinh\Entities\QuyTrinh;
use Modules\QuanLyQuyTrinh\Entities\LineDuyet;

class LineDuyetController extends Controller
{
    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Hiển thị danh sách line duyệt.
     * @return Response
     */
    public function list()
    {
        $list = LineDuyet::list();

        foreach($list as $l){
          $l->tenquytrinh = QuyTrinh::getName($l->quytrinh);
        }
        
        return view('quanlyquytrinh::lineduyet.list',[
          'title'=>'Danh sách line duyệt',
          'list'=>$list
        ]);
    }

    public function add(){
      return view('quanlyquytrinh::lineduyet.add',[
        'title'=>'Thêm mới line duyệt',
        'lsQuytrinh' =>  QuyTrinh::list()
      ]);
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Thêm line duyệt mới.
     */
    public function create(){
      $input = Input::all();
      return (LineDuyet::create($input));
    }
}
