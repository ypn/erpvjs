<?php

namespace Modules\QuanLyXeRaVao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\QuanLyXeRaVao\Entities\CheckPoints;
use Modules\QuanLyXeRaVao\Entities\SessionsTraking;
use Illuminate\Support\Facades\Input;

class QuanLyXeRaVaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function realtimeTracking()
    {
        return view('quanlyxeravao::realtime_tracking',[
          'pathCheckPoints' =>  json_encode (Checkpoints::getPathCheckPoints()),
        ]);
    }

    public function report(){
      $list = SessionsTraking::alll();
      return view('quanlyxeravao::report.report',[
        'list'=>$list
      ]);
    }

    public function getReportDetail(){
      $input = Input::all();
      $result = SessionsTraking::get($input['sessionId']);
      $status = json_decode($result->status);

      foreach($status as $s){
        $name = Checkpoints::getName($s->checkpointId);
        $s->name = $name->name;
      }

      $result->status = $status;


      return $result;
    }
}
