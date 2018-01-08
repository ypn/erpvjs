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
}
