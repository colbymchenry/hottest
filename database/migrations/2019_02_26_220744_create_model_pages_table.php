<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unique();
            $table->integer('avatar')->nullable();
            $table->integer('banner')->nullable();
            $table->string('greeting')->nullable();
            $table->string('preview_images')->nullable();
            $table->integer('messages_setting')->default(0);
            $table->integer('snapchat_setting')->default(0);
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
        Schema::dropIfExists('model_pages');
    }
}
