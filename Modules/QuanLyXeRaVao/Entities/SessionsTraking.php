<?php

namespace Modules\QuanLyXeRaVao\Entities;

use Illuminate\Database\Eloquent\Model;

class SessionsTraking extends Model
{
    protected $fillable = [];
    protected $table = 'positions_tracking';

    protected function list(){
      return $this->select('id','bienso','status','type')->where('type',1)->get();
    }

    protected function alll(){
        return $this->select('id','bienso','created_at')->get();
    }

    protected function get($id){
      return($this->where('id',$id)->first());
    }
}
