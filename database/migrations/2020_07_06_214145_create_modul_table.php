<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modul', function (Blueprint $table) {
            // $table->bigIncrements('id_modul');
            // $table->string('file', 255);
            // $table->unsignedBigInteger('matakuliah_id');
            // $table->foreign('matakuliah_id')->references('id_matkul')->on('matakuliah');
            // $table->timestamps(0);
            $table->bigIncrements('id_modul');
            $table->char('pertemuan', 50);
            $table->string('file');
            // $table->date('tanggal_upload');
            $table->unsignedBigInteger('matakuliah_id')->index();
            $table->unsignedBigInteger('jurusan_id')->index();
            $table->unsignedBigInteger('mahasiswa_id')->index();
            $table->foreign('matakuliah_id')->references('id_matkul')->on('matakuliah')->onDelete('cascade');
            $table->foreign('jurusan_id')->references('id_jurusan')->on('jurusan')->onDelete('cascade');
            $table->foreign('mahasiswa_id')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
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
        Schema::dropIfExists('modul');
    }
}
