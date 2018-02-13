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
        $current_tracking_cars = SessionsTraking::getCurrentCarPosition();

        //echo $current_tracking_cars;die;
        return view('quanlyxeravao::realtime_tracking',[
          'pathCheckPoints' =>  json_encode (Checkpoints::getPathCheckPoints()),
          'current_tracking_cars' => $current_tracking_cars
        ]);
    }

    public function entry(){
      return view('quanlyxeravao::entry');
    }

    public function report(){
      $list = SessionsTraking::alll();

      $report = SessionsTraking::getReport();
      $char_data =  array($report['name']);
      foreach ($report['result'] as $r) {
        array_push($char_data, $r);
      }
      return view('quanlyxeravao::report.report',[
        'list'=>$list,
        'chart_data'=>json_encode($char_data)
      ]);
    }

    public function getReportDetail(){
      $input = Input::all();
      $result = SessionsTraking::get($input['sessionId']);
      $status = json_decode($result->status);
      foreach($status as $s){
        $name = Checkpoints::getName($s->checkpointId);
        if($name){
            $s->name = $name->name;
        }else{
          $s->name = 'Chưa xác định';
        }

      }
      $result->status = $status;

      return $result;
    }
}
