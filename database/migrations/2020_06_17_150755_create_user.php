<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		Schema::dropIfExists('users');
		
		Schema::create('users', function (Blueprint $table) {
			$table->charset = 'utf8';
			$table->collation = 'utf8_unicode_ci';
			$table->engine = 'InnoDB';
			
			$table->increments('user_id');
			$table->string('user_name', 150)->default('');
			$table->string('user_email', 150)->default('');
			$table->dateTime('created_at', 0)->default('0000-00-00 00:00:00');
			$table->integer('fk_dep_id');
			
			$table->index(['fk_dep_id']);
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::dropIfExists('users');
    }
}
