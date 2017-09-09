<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('email');
            $table->string('name')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('company')->nullable();
            $table->string('company_role')->nullable();
            $table->string('company_designation')->nullable();
            $table->text('details')->nullable(); 
            $table->string('image')->nullable(); 
            $table->string('password');
            $table->string('password_o')->nullable(); 
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->boolean('confirmed')->default(0);
            $table->boolean('admin_status')->default(1);
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->engine = 'INNODB'; 
        });

        DB::update("ALTER TABLE users AUTO_INCREMENT = 100000;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
