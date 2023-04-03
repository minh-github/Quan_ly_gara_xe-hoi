<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('LyDo');
            $table->string('Thu');
            $table->string('Chi');
            $table->string('Tong');
            $table->unsignedInteger('idChoThue')->nullable();
            $table->foreign('idChoThue')->references('id')->on('leases')->onDelete('set null');
            $table->string('GhiChu')->nullable();
            $table->unsignedInteger('idBaoDuong')->nullable();
            $table->foreign('idBaoDuong')->references('id')->on('maintenances')->onDelete('set null');
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
        Schema::dropIfExists('transactions');
    }
}
