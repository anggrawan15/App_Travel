<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jumlah');
            
            $table->unsignedBIgInteger('hotel_id');
            $table->unsignedBIgInteger('paket_id');
            
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
        Schema::dropIfExists('hotel_items');
    }
}
