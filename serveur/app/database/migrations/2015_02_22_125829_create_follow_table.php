<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('follow', function ($table)
        {
            $table->integer('user_id')->unsigned();
            $table->integer('follow_id')->unsigned();
            $table->timestamps()->default('0000-00-00 00:00:00');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('follow');
	}

}
