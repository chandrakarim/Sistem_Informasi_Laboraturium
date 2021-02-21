<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('id_nilai');
            $table->char('pertemuan', 50);
            $table->string('file');
            $table->unsignedBigInteger('matakuliah_id');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('mahasiswa_id');  
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
        Schema::dropIfExists('nilai');
    }
}
