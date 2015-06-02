<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagToPostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('tag_to_post', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('post_id', false, true);
            $table->integer('tag_id', false, true);

            $table
                ->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade')
            ;

            $table
                ->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade')
            ;
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tag_to_post');
	}

}
