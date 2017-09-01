<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('topic_id')->unsigned()->nullable(); 
            $table->string('topic')->nullable();
            $table->integer('profile_id')->unsigned()->nullable(); 
            $table->text('review')->nullable();
            $table->integer('published')->unsigned()->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('feedback');
    }
}
