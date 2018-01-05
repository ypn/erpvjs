<?php

namespace Modules\HeThong\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Modules\HeThong\Entities\QuyTrinh;
use Validator,Redirect;

class QuanlyQuyTrinhController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function list()
    {
        $list = QuyTrinh::list();
        return view('hethong::layouts.quanlyquytrinh.list',[
          'list'=>$list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
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

}
