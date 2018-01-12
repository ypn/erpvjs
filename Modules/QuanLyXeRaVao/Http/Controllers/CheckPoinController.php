<?php

namespace Modules\QuanLyXeRaVao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\QuanLyXeRaVao\Entities\CheckPoints;
use Redirect;

class CheckPoinController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function list()
    {
        return view('quanlyxeravao::checkpoins.list',[
          'title'=>'Danh sách trạm theo dõi',
          'list'=>CheckPoints::list()
        ]);
    }

    public function add(){
      return view ('quanlyxeravao::checkpoins.add',[
        'title'=>'Thêm trạm theo dõi mới'
      ]);
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: tạo check point mới.
     */
    public function create(){
      $input = Input::all();

      $result = CheckPoints::create($input);
      return redirect('/quanlyxeravao/checkpoints/list');
    }

    public function edit($id){
      $checkpoint = CheckPoints::getCheckpoint($id);
      return view('quanlyxeravao::checkpoins.edit',[
        'checkpoint'=>$checkpoint
      ]);
    }

    public function update($id){
      $inputs = Input::all();
      $result = CheckPoints::updatee($id,$inputs);

      return Redirect::back()->with($result);
    }

    public function apiList(){
       return CheckPoints::list()->toJson();
    }

    public function delete($id){
      CheckPoints::del($id);
      return Redirect::back();
    }

}
