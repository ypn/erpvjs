<?php

namespace Modules\QuanLyXeRaVao\Entities;
use Illuminate\Database\QueryException;

use Illuminate\Database\Eloquent\Model;
use Config;

class CheckPoints extends Model
{
    protected $fillable = [''];
    protected $table ='checkpoints';

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Thêm checkpoint mới
     */
    protected function create($input){
      try{
        $this->name = $input['name'];
        $this->description = $input['desc'];
        $this->path = $input['checkpoints'];
        $this->maxtime = $input['maxtime'];
        $this->save();
        return[
          'status'=>Config::get('constants.HANDLE_SUCCESS')
        ];
      }catch(QueryException $ex){
        return [
          'status'=>Config::get('constants.ERROR_QUERY'),
          'code'=>$ex->getMessage()
        ];
      }
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: liệt kê danh sách checkpoint đã tạo.
     */
    protected function list(){
      return $this->get();
    }

    protected function getCheckpoint($id){
      return $this->where('id',$id)->first();
    }

    protected function updatee($id,$input){
      $checkpoint = $this->getCheckpoint($id);
      try{
        $checkpoint->name = isset($input['name']) ? $input['name'] :'';
        $checkpoint->description = isset($input['desc']) ? $input['desc'] :'';
        $checkpoint->path = isset($input['checkpoints']) ? $input['checkpoints'] :'';
        $checkpoint->maxtime = isset($input['maxtime']) ? $input['maxtime'] :'';
        $checkpoint->save();
        return[
          'status'=>Config::get('constants.HANDLE_SUCCESS')
        ];
      }catch(QueryException $ex){
        return [
          'status'=>Config::get('constants.ERROR_QUERY'),
          'code'=>$ex->getMessage()
        ];
      }
    }

    protected function getPathCheckPoints(){
      return $this->select('path')->pluck('path')->toArray();
    }

    protected function del($id){
      $this->destroy($id);
    }

    protected function getName($id){
      return $this->select('name')->where('id',$id)->first();
    }
}
