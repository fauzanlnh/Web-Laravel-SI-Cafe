<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('menu_id');
            $table->unsignedInteger('price');
            $table->unsignedInteger('qty');
            $table->string('order_detail_status', 15);
            $table->unsignedInteger('detail_total');
            $table->timestamps();
            //$table->foreign('id_pemesanan')->references('id_pemesanan')->on('table_pemesanan');
            //$table->foreign('id_menu')->references('id_menu')->on('table_menu');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
