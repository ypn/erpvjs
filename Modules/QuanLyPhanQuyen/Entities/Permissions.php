<?php

namespace Modules\QuanLyPhanQuyen\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Config;

class Permissions extends Model
{
    protected $fillable = [];
    protected $table = 'permissions';

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Tạo quyền mới.
     */
    protected function create($data){
      try{
        $ten = isset($data['ten']) ? $data['ten'] : '';
        $this->ten = $ten;
        $this->alias = isset($data['alias'])?$data['alias']:'';
        $this->diengiai = isset($data['diengiai']) ? $data['diengiai'] :'';
        $this->save();
        return [
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
     * desc: Tạo quyền mới.
     */
    protected function list(){
      return $this->get();
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Hiển thị mảng danh sách tên quyền vơi nhóm ID
     */
    protected function listSlugs($data){
      $result = $this->select('alias')->whereIn('id',$data)->get()->toArray();
      return $result;
    }
}
