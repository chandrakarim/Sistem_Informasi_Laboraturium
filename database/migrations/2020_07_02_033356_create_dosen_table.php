<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->bigIncrements('id_dosen');
            $table->bigInteger('nip')->unique();
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('nama_dosen', 255);
            $table->string('email', 255);
            $table->string('no_telp', 15);
            $table->string('jk', 50);
            $table->rememberToken();
            $table->timestamps(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosen');
    }
}
