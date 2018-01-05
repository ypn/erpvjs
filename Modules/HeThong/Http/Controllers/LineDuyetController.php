<?php

namespace Modules\HeThong\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\HeThong\Entities\QuyTrinh;

class LineDuyetController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function list()
    {
      $lsQuytrinh = QuyTrinh::list();
      return view('hethong::layouts.lineduyet.list',[
        'title'=>'Danh sách line duyệt',
        'lsQuytrinh' =>$lsQuytrinh
      ]);
    }

    /*
    * Hiển thị form thêm mới line duyệt
    *
    */
    public function showAddViewer(){
      return view('hethong::layouts.lineduyet.add',[
        'title'=>'Thêm mới line duyệt'
      ]);
    }

}
