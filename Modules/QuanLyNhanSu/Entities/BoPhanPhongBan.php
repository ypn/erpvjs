<?php

namespace Modules\QuanLyNhanSu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Config;

class BoPhanPhongBan extends Model
{
    protected $fillable = [''];
    protected $table = 'bophan_phongban';

    /*
    * created:ypn - ypn@vijagroup.com.vn
    * desc: Hiển thị danh sách bộ phận - phòng ban.
    */
    protected function list(){
      return $this->get();
    }

    /*
    * created:ypn - ypn@vijagroup.com.vn
    * desc: Tạo mới phòng ban
    */
    protected function create($data){
      try{
        $ten = isset($data['ten']) ? $data['ten'] :'';
        $this->ten = $ten;
        $this->ten_viet_tat = isset($data['ten_viet_tat']) ? $data['ten_viet_tat']:'';
        $this->slug = str_slug($ten,'-');
        $this->diengiai = isset($data['diengiai']) ? $data['diengiai'] :'';
        $this->save();
        return [
          'status'=>Config::get('constants.HANDLE_SUCCESS'),
          'name'=>$ten
        ];
      }catch(QueryException $ex){
        //Log loi
        return  [
          'status'=>0,
          'code'=>$ex->getCode()
        ];
      }
    }

    /**
     * created by: ypn - ypn@vijagroup.com.vn
     * desc: Xóa phòng ban đã tạo.
     */
    protected function del($ids){
      try{
        $this->destroy($ids);
        return 1;
      }catch(QueryException $ex){
        return 0;
      }
    }

    /**
     * created by: ypn-ypn@vijagroup.com.vn
     * desc: lấy tên phòng ban theo id
     */
    protected function getName($id){
      $ten =  $this->select('ten')->where('id',$id)->first();
      return ( !empty($ten) ? $ten->ten :'Chưa xác định');

    }
}
