<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('email1')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->string('name')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('city')->nullable();
            $table->string('locality')->nullable();
            $table->string('address')->nullable(); 
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('details')->nullable(); 
            $table->string('detailsbyadmin')->nullable();
            $table->integer('floors')->unsigned()->nullable();
            $table->integer('rooms')->unsigned()->nullable(); 
            $table->string('checkin')->nullable();
            $table->string('checkout')->nullable();
            $table->boolean('parking')->default(0);
            $table->boolean('swimmingpool')->default(0);
            $table->boolean('powerbackup')->default(0);
            $table->boolean('bar')->default(0);
            $table->boolean('hairdryer')->default(0);
            $table->boolean('conferenceroom')->default(0);
            $table->boolean('laundry')->default(0);
            $table->boolean('wheelchair')->default(0);
            $table->boolean('cardaccepted')->default(0);
            $table->boolean('geyser')->default(0);
            $table->boolean('cctv')->default(0);
            $table->boolean('freewifi')->default(0);
            $table->boolean('diningarea')->default(0);
            $table->boolean('gym')->default(0);
            $table->boolean('banquetarea')->default(0);
            $table->boolean('elevator')->default(0);
            $table->boolean('petfriendly')->default(0);
            $table->boolean('inhouserestaurant')->default(0);
            $table->boolean('airportshuttle')->default(0);
            $table->text('amenities1')->nullable();
            $table->text('amenities2')->nullable();
            $table->text('amenities3')->nullable();
            $table->text('amenities4')->nullable();
            $table->text('amenities5')->nullable();
            $table->text('rules1')->nullable();
            $table->text('rules2')->nullable();
            $table->text('rules3')->nullable();
            $table->text('rules4')->nullable();
            $table->text('rules5')->nullable();
            $table->text('rules6')->nullable();
            $table->text('rules7')->nullable();
            $table->text('rules8')->nullable();
            $table->text('rules9')->nullable();
            $table->text('rules10')->nullable();
            $table->text('nearby1')->nullable();
            $table->text('nearby2')->nullable();
            $table->text('nearby3')->nullable();
            $table->text('nearby4')->nullable();
            $table->text('nearby5')->nullable();
            $table->text('nearby6')->nullable();
            $table->text('nearby7')->nullable();
            $table->text('nearby8')->nullable();
            $table->text('nearby9')->nullable();
            $table->text('nearby10')->nullable();
            $table->boolean('admin_status')->default(1); 
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
        Schema::dropIfExists('hotels');
    }
}
