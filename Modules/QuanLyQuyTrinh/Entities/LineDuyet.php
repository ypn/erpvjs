<?php

namespace Modules\QuanLyQuyTrinh\Entities;

use Illuminate\Database\Eloquent\Model;
use Config;

class LineDuyet extends Model
{
    protected $fillable = [];
    protected $table = 'lineduyet';

    protected function list(){
      return $this->select('id','ten','quytrinh','mota')->get();
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Tạo line duyệt mới
     */
    protected function create($data){
      try{
        $this->ten = $data['tenLineDuyet'];
        $this->quytrinh = $data['tenQuytrinh'];
        $this->slug = str_slug($data['tenLineDuyet'],'-');
        $this->mota = $data['diengiai'];
        $this->nhom_duyet = json_encode($data['groupApproval']);
        $this->save();
        return [
          'status'=>Config::get('constants.HANDLE_SUCCESS'),
          'name'=>$data['tenLineDuyet']
        ];
      }catch(\Illuminate\Database\QueryException $ex){
        return [
          'status'=>Config::get('constants.ERROR_QUERY'),
          'code'=>$ex->getCode()
        ];
      }
    }
}
