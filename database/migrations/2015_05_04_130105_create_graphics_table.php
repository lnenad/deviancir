<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('graphics', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id');
			$table->string('title');
			$table->string('graphic_url');
			$table->integer('likes');
			$table->text('description');
			$table->string('tags');
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
		Schema::drop('graphics');
	}

}
