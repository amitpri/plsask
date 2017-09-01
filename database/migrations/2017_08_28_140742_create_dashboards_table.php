<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('feedbacktotal')->unsigned();
            $table->integer('feedbacktoday')->unsigned();
            $table->integer('visittotal')->unsigned();
            $table->integer('visittoday')->unsigned();
            $table->integer('topics')->unsigned();
            $table->integer('profiles')->unsigned();
            $table->timestamps();
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
        Schema::dropIfExists('dashboards');
    }
}
