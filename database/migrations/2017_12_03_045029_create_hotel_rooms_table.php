<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('hotel_id')->unsigned()->nullable();
            $table->string('room_nos')->nullable();
            $table->string('floor')->nullable();
            $table->string('name')->nullable();
            $table->string('adults')->nullable();
            $table->string('kids')->nullable();
            $table->string('beds')->nullable(); 
            $table->string('details')->nullable(); 
            $table->string('detailsbyadmin')->nullable();
            $table->boolean('ac')->default(0)->nullable();
            $table->boolean('tv')->default(0)->nullable();
            $table->boolean('inroomsafe')->default(0)->nullable();
            $table->boolean('freebreakfast')->default(0)->nullable();
            $table->boolean('minifridge')->default(0)->nullable();
            $table->boolean('roomheater')->default(0)->nullable(); 
            $table->boolean('teamaker')->default(0)->nullable();
            $table->boolean('freewater')->default(0)->nullable();
            $table->boolean('attachedbathroom')->default(0)->nullable();  
            $table->text('amenities1')->nullable();
            $table->text('amenities2')->nullable();
            $table->text('amenities3')->nullable();
            $table->text('amenities4')->nullable();
            $table->text('amenities5')->nullable(); 
            $table->boolean('admin_status')->default(1)->nullable(); 
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'INNODB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_rooms');
    }
}
