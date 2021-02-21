<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal', function (Blueprint $table) {
            $table->bigIncrements('id_soal');
            $table->text('judul', 50);
            $table->longText('soal');
            $table->unsignedBigInteger('matakuliah_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('pertemuan', 50);
            $table->foreign('matakuliah_id')->references('id_matkul')->on('matakuliah');
            $table->foreign('jurusan_id')->references('id_jurusan')->on('jurusan');
            $table->foreign('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa');
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
        Schema::dropIfExists('soal');
    }
}
