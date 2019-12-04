<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('tempatlahir');
            $table->string('tgllahir');
            $table->string('gender');
            $table->string('status');
            $table->string('pekerjaan');
            $table->string('nomerhp');
            $table->string('alamat');
            $table->string('kedereferal');
            $table->string('no_agent');
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
        Schema::dropIfExists('agent');
    }
}
