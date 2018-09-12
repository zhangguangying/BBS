<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration 
{
	public function up()
	{
		Schema::create('topics', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->text('body');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('category_id')->index()->unsigned();
            $table->integer('reply_count')->index()->unsigned()->default(0);
            $table->integer('view_count')->index()->unsigned()->default(0);
            $table->integer('last_reply_user_id')->index()->unsigned()->default(0);
            $table->integer('order')->default(0);
            $table->text('excerpt')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
        });
	}

	public function down()
	{
		Schema::drop('topics');
	}
}
