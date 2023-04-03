<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenPhieuBaoDuong', 100);
            $table->unsignedInteger('idXe');
            $table->foreign('idXe')->references('id')->on('cars')->onDelete('CASCADE');
            $table->string('LoaiBaoDuong');
            $table->string('ChiTietBaoDuong');
            $table->unsignedInteger('idDonVi')->nullable();
            $table->foreign('idDonVi')->references('id')->on('units')->onDelete('set null');
            $table->string('DonGia');
            $table->unsignedInteger('idUser')->nullable();
            $table->foreign('idUser')->references('id')->on('users')->onDelete('set null');
            $table->string('status', 1);
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
        Schema::dropIfExists('maintenances');
    }
}
