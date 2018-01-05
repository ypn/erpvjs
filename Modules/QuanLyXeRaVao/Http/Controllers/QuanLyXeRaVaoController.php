<?php

namespace Modules\QuanLyXeRaVao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\QuanLyXeRaVao\Entities\CheckPoints;

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
}
