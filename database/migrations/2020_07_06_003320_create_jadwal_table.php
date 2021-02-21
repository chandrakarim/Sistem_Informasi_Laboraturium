<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id_jadwal');
            $table->unsignedBigInteger('dosen_id')->index();
            $table->unsignedBigInteger('matakuliah_id')->index();
            $table->unsignedBigInteger('ruangan_id')->index();
            $table->unsignedBigInteger('kelas_id')->index();
            $table->unsignedBigInteger('jurusan_id')->index();
            $table->string('hari', 30);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('matakuliah_id')->references('id_matkul')->on('matakuliah')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('id_ruangan')->on('ruangan')->onDelete('cascade');
            $table->foreign('kelas_id')->references('id_kelas')->on('kelas')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
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
        Schema::dropIfExists('jadwal');
    }
}
