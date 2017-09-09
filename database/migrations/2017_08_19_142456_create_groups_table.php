<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->text('notes')->nullable();
            $table->integer('status')->default(0);
            $table->boolean('admin_status')->default(1);
            $table->string('created_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'INNODB';
        });

        DB::update("ALTER TABLE groups AUTO_INCREMENT = 100000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
