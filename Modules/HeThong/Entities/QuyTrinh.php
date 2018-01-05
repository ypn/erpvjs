<?php

namespace Modules\HeThong\Entities;

use Illuminate\Database\Eloquent\Model;

class QuyTrinh extends Model
{
    protected $fillable = [];
    protected $table = 'quytrinh';


    /*created: ypn - ypn@vijagroup.com.vn
    *desc: Liệt kê danh sách các quy trình
    */
    protected function list(){
      return $this->get();
    }

    /*
    *created: ypn - ypn@vijagroup.com.vn
    *desc : Tạo quy trình mới
    */
    protected function create($data){
      try{
        $ten = isset($data['name'])? $data['name'] :'';
        $this->ten = $ten;
        $this->slug = str_slug($ten,'-');
        $this->diengiai = isset($data['desc']) ? $data['desc'] :'';
        $this->save();
        //Thực hiện thêm mới thành công.
        $result = [
          'status'=>1,
          'name'=>$ten
        ];
      }catch(\Illuminate\Database\QueryException $ex){        
        $result =  array(
          'status'=>0,
          'code'=>$ex->getCode()
        );
      }

      return $result;
    }
}
