<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsCheckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_check', function (Blueprint $table) {
            $table->increments('id');
            $table->string('TenThietBi', 100);
            $table->string('TrangThai', 100);
            $table->string('XuLy', 100);
            $table->string('Gia', 100);
            $table->unsignedInteger('idCheck');
            $table->foreign('idCheck')->references('id')->on('check')->onDelete('CASCADE');
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
        Schema::dropIfExists('details_check');
    }
}
