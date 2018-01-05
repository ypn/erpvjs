<?php

namespace Modules\QuanLyNhanSu\Entities;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Model;
use Config;

class VitriCapBac extends Model
{
    protected $fillable = [];
    protected $table = 'vitri_capbac';


    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Tạo mới vị trí - cấp bậc
     */
    protected function create($data){
      try{
        $ten = isset($data['ten']) ? $data['ten'] :'';
        $this->ten = $ten;
        $this->ten_viet_tat = isset($data['ten_viet_tat']) ? $data['ten_viet_tat']:null;
        $this->slug = str_slug($ten,'-');
        $this->diengiai = isset($data['diengiai']) ? $data['diengiai'] :null;
        $this->save();

        return [
          'status'=>Config::get('constants.HANDLE_SUCCESS'),
          'name'=>$ten

        ];
      }catch(QueryException $ex){
        //Log lỗi
        return[
          'status'=>Config::get('constants.ERROR_QUERY'),
          'code'=>$ex->getCode()
        ];
      }
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Hiển thị danh sách vị trí cấp bậc.
     */
    protected function list(){
      return $this->get();
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc : Xóa danh vị trí cấp bậc đã tạo.
     */
    protected function del($ids){
      try{
        $this->destroy($ids);
        return 1;
      }
      catch(QueryException $ex){
        return 0;
      }
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: lấy tên vị trí cấp bậc theo id
     */
    protected function getName($id){
      $ten =  $this->select('ten')->where('id',$id)->first();
      return ( !empty($ten) ? $ten->ten :'Chưa xác định');
    }
}
