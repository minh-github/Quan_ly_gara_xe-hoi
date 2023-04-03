<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsLeasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars_leases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('idXe')->nullable();
            $table->foreign('idXe')->references('id')->on('car_brands')->onDelete('set null');
            $table->unsignedInteger('idChoThue')->nullable();
            $table->foreign('idChoThue')->references('id')->on('leases')->onDelete('CASCADE');
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
        Schema::dropIfExists('cars_leases');
    }
}
