<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration {

    public function up() {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sender_id');
            $table->integer('receiver_id');
            $table->string('message');
            $table->boolean('read')->default(false);
            $table->integer('img_id')->nullable();
            $table->integer('tip')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('messages');
    }
}
