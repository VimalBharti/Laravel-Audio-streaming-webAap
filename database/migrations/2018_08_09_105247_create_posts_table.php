<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('image');
            $table->string('framework')->nullable()->default('html');
            $table->string('psd')->nullable();
            $table->text('css')->nullable();
            $table->text('coding')->nullable();
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('user_name');
            $table->string('user_slug');
            $table->integer('user_id');
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
        Schema::dropIfExists('posts');
    }
}
