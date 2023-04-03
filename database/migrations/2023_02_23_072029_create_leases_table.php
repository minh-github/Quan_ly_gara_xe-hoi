<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TrangThai', 1);
            $table->string('TenNguoiThue');
            $table->string('SoDienThoai');
            $table->string('TamUng');
            $table->string('SoNgayThue', 10)->nullable();
            $table->string('NgayTra');
            $table->string('GhiChuPhuThu')->nullable();
            $table->string('ThanhTien');
            $table->string('GhiChuNhanHang')->nullable();
            $table->string('CMNDT');
            $table->string('CMNDS');
            $table->string('idKTT')->nullable();
            $table->string('idKTS')->nullable();
            $table->string('TienThue');
            $table->string('TienDenBu');
            $table->string('PhuThu');
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
        Schema::dropIfExists('leases');
    }
}
