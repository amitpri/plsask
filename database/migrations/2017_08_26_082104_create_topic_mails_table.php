<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_mails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('topic_id')->unsigned()->nullable(); 
            $table->integer('group_id')->unsigned()->nullable();
            $table->integer('profile_id')->unsigned()->nullable();
            $table->string('emailid')->nullable();
            $table->string('mailkey')->nullable();
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
        Schema::dropIfExists('topic_mails');
    }
}
