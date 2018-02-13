<?php

namespace Modules\QuanLyXeRaVao\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\QuanLyXeRaVao\Entities\CheckPoints;
use DB;

class SessionsTraking extends Model
{
    protected $fillable = [];
    protected $table = 'positions_tracking';

    protected function list(){
      return $this->select('car_positions','current_position','id','bienso','status','type','created_at','path_color')->where('type',1)->get();
    }

    protected function alll(){
        return $this->select('id','bienso','created_at')->get();
    }

    protected function get($id){
      return($this->where('id',$id)->first());
    }

    protected function getCurrentCarPosition(){
      return $this->select('current_position','bienso','id')->where('type',1)->get()->toJson();
    }

    protected function getReport(){
      $chpid = CheckPoints::select('id','name')->get();
      $result= array();
      $name = array('Thời gian xe ra vào');
      foreach ($chpid as $value) {
        array_push($name,$value->name);
        $query = DB::select("select created_at , SUM(JSON_EXTRACT(status,'$[0].cp_$value->id.total_time')) as total_time from positions_tracking group by created_at");

        foreach ($query as $k=>$r) {
          if(!isset($result[$k])){
            $result[$k] = array();
            array_push($result[$k],$r->created_at);
          }
          array_push($result[$k],($r->total_time)/60);
        }
      }

    return [
      'result'=>$result,
      'name'=>$name
    ];
    }


}
