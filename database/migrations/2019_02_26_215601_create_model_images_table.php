<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO: Track views, description
        Schema::create('model_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('server_id');
            $table->integer('model_id');
            $table->integer('width');
            $table->integer('height');
            $table->string('file_name')->unique();
            $table->text('description')->nullable();
            $table->boolean('listed')->default(false);
            $table->boolean('vip')->default(false);
            $table->string('tags')->nullable();
            $table->boolean('for_message')->default(false);
            $table->boolean('for_avatar')->default(false);
            $table->boolean('for_banner')->default(false);
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
        Schema::dropIfExists('model_images');
    }
}
