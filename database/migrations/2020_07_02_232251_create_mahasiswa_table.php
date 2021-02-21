<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('full_name', 100);
            // $table->string('username', 15);
            // $table->string('password', 255);
            // $table->bigInteger('nim');
           // $table->tinyInteger('status');
            $table->bigIncrements('id_mahasiswa');
            $table->string('username', 15);
            $table->string('password');
            $table->string('nama_mhs', 100);
            $table->integer('nim_mhs', false)->length(10)->unique();
            $table->string('jk', 50);
            $table->rememberToken();
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas');
            $table->unsignedBigInteger('jurusan_id');
            $table->foreign('jurusan_id')->references('id_jurusan')->on('jurusan');
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
        Schema::dropIfExists('mahasiswa');
    }
}
