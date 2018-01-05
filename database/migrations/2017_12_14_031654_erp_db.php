<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ErpDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Bảng quy trình
        Schema::create('quytrinh',function(Blueprint $table){
          $table->increments('id');
          $table->string('ten');//tên quy trình
          $table->string('slug')->unique();
          $table->string('diengiai');//diễn giải quy trình
          $table->timestamps();
        });

        //Bảng line duyệt
        Schema::create('lineduyet',function(Blueprint $table){
          $table->increments('id');
          $table->string('ten');//tên line duyệt
          $table->string('slug')->unique();//slug tham chiếu
          $table->text('mota');//mô tả ngắn gọn về line duyệt.
          $table->text('nhom_duyet');//danh sách những người tham gia vào line duyệt
          $table->timestamps();
        });

        //Bảng vị trí - cấp bậc
        Schema::create('vitri_capbac',function(Blueprint $table){
          $table->increments('id');
          $table->string('ten');//Tên vị trí của nhân sự (nhân viên, trưởng phòng);
          $table->string('slug')->unique();//Slug tham chiếu;
          $table->string('ten_viet_tat');//Tên viết tắt của vị trí
          $table->text('diengiai');//mô tả ngắn gọn về chức năng, mục đích
          $table->timestamps();
        });

        //Bảng bộ phận - phòng ban
        Schema::create('bophan_phongban',function(Blueprint $table){
          $table->increments('id');
          $table->string('ten');
          $table->string('slug')->unique();
          $table->string('ten_viet_tat');//tên viết tắt của phòng ban;
          $table->text('diengiai');//mô tả ngắn gọn về chức năng mục đích;
          $table->timestamps();
        });

        //Bảng mặt hàng - vật tư
        Schema::create('vattu',function(Blueprint $table){
          $table->increments('id');
          $table->string('mavt')->unique();//mã vật tư
          $table->string('ten');//tên vật tư
          $table->tinyInteger('type');//loại vật tư
          $table->string('dvt');//đơn vị tính
          $table->string('xuatxu');//xuất xứ
          $table->float('ton');//số lượng vật tư tồn
          $table->text('diengiai');//Diễn giải ngắn gọn về vật tư
          $table->timestamps();
        });

        //Bảng phiếu nhu cầu
        Schema::create('phieu_nhu_cau',function(Blueprint $table){
          $table->increments('id');
          $table->string('maso')->unique();
          $table->integer('nguoilap');//id người lập
          $table->tinyInteger('type');//loại phiếu nhu câu: sửa chữa - nhu cầu
          $table->tinyInteger('trangthai');//trạng thái phiếu.
          $table->tinyInteger('mucdo');// mức độ phiếu nhu cầu. bình thường - ưu tiên - khẩn cấp.
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
