<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function ($table)
        {
            $table->increments('id');
            $table->text('description');
            $table->int('user_id')->unsigned();
            $table->int('post_id')->unsigned();
            $table->timestamps()->default(DB::raw('CURRENT_TIMESTAMP'));
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments')
	}

}
