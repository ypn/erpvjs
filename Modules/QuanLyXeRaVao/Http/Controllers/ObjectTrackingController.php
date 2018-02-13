<?php

namespace Modules\QuanLyXeRaVao\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ObjectTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getTypeInfo($id)
    {
        return json_encode([
          'title'=>'Quản lý bảo vệ',
          'entry_text'=>'Chọn bảo vệ',
          'listObject'=>[
            [
              'id'=>1,
              'ma_so'=>'Nguyen Van Long'
            ],
            [
              'id'=>2,
              'ma_so'=>'Pham Tuan Dat'
            ],
            [
              'id'=>3,
              'ma_so'=>'Pham Nhu Y'
            ],
            [
              'id'=>4,
              'ma_so'=>'Tran Dung Manh'
            ],
            [
              'id'=>5,
              'ma_so'=>'Phan Dinh Tung'
            ],
            [
              'id'=>6,
              'ma_so'=>'Ung Hoang Phuc'
            ]
          ]
      ]);
    }

    function getObjectInfo($type_id,$object_id){

      $object = [];

      switch ($object_id) {
        case 1:
          $object =[
            'name'=>'Nguyen Van Long',
            'don_vi'=>'VJS',
            'sdt'=>'0128.934.1568',
            'cmt'=>'03172765'
          ];
          break;
        case 2:
          $object =[
            'name'=>'Pham Tuan Dat',
            'don_vi'=>'VJS',
            'sdt'=>'0128.934.1568',
            'cmt'=>'031742765'
          ];
          break;
        case 3:
          $object =[
            'name'=>'Pham Nhu Y',
            'don_vi'=>'LCC',
            'sdt'=>'0128.934.1568',
            'cmt'=>'03172765'
          ];
          break;

        case 4:
          $object =[
            'name'=>'Tran Dung Manh',
            'don_vi'=>'LCC',
            'sdt'=>'0128.934.1568',
            'cmt'=>'03172765'
          ];
          break;

        default:
        case 4:
          $object =[
            'name'=>'Ung Hoang Phuc',
            'don_vi'=>'LCC',
            'sdt'=>'0128.934.1568',
            'cmt'=>'03172765'
          ];
          break;
      }

        return json_encode($object);
    }
}
