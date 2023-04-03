<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenXe');
            $table->unsignedInteger('idLoaiXe');
            $table->foreign('idLoaiXe')->references('id')->on('type_cars')->onDelete('CASCADE');
            $table->unsignedInteger('idNhaCungCap');
            $table->foreign('idNhaCungCap')->references('id')->on('owners')->onDelete('CASCADE');
            $table->string('DoiXe');
            $table->string('BienSo');
            $table->string('MauSon');
            $table->unsignedInteger('idThuongHieu');
            $table->foreign('idThuongHieu')->references('id')->on('car_brands')->onDelete('CASCADE');
            $table->string('GiaThueNgay', 100);
            $table->string('GiaThueThang', 100);
            $table->string('TinhTrang', 1);
            $table->string('HinhAnh');
            $table->string('AnhMoTa');
            $table->unsignedInteger('idChoThue')->nullable();
            $table->foreign('idChoThue')->references('id')->on('leases')->onDelete('CASCADE');
            $table->unsignedInteger('idCheck')->nullable();
            $table->foreign('idCheck')->references('id')->on('check')->onDelete('CASCADE');
            $table->string('SoCho', 100);
            $table->string('DungTich', 100);
            $table->string('SoKhung', 100);
            $table->string('SoMay', 100);
            $table->string('DangKyLanDau');
            $table->string('HetDangKiem');
            $table->string('HetHanBaoHiem');
            $table->string('GhiChu')->nullable();
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
        Schema::dropIfExists('cars');
    }
}
