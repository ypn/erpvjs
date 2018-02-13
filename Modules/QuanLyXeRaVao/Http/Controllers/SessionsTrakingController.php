<?php

namespace Modules\QuanLyXeRaVao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\QuanLyXeRaVao\Entities\SessionsTraking;
use DB;

class SessionsTrakingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function list()
    {    
        return SessionsTraking::list()->toJson();
    }

    public function checking($id){
      $result = DB::table('positions_tracking')->select(DB::raw('COUNT(status) as total'))->whereRaw('type=1')->whereRaw("JSON_EXTRACT(status,'$[$id].status') =1")->first();
      return $result->total;
    }

}
