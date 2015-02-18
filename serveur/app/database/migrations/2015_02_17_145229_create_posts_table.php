<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table){
			$table->increments('id');
			$table->string('titre',255);
			$table->text('description');
			$table->string('path',255)->unique();
			$table->int('privacy')->unsigned();
			$table->int('user_id')->unsigned();
			$table->int('note_totale');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
