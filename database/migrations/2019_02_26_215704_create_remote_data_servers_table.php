<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemoteDataServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remote_data_servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip_address')->unique();
            $table->string('username');
            $table->string('password');
            $table->integer('size_gb');
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
        Schema::dropIfExists('remote_data_servers');
    }
}
