<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('group_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->string('emailid')->nullable();
            $table->string('phone')->nullable();
            $table->integer('status')->nullable();
            $table->boolean('admin_status')->default(1);
            $table->timestamps();
            $table->engine = 'INNODB';
        });

        DB::update("ALTER TABLE group_profiles AUTO_INCREMENT = 100000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_profiles');
    }
}
