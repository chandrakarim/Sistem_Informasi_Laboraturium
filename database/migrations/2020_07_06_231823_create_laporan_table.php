<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->bigIncrements('id_laporan');
            $table->char('pertemuan', 50);
            $table->string('file');
            $table->unsignedBigInteger('matakuliah_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('mahasiswa_id');  
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('matakuliah_id')->references('id_matkul')->on('matakuliah')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');         
            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')->onDelete('cascade');
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
        Schema::dropIfExists('laporan');
    }
}
