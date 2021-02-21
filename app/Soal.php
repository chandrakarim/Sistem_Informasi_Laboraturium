<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    public $table = "soal"; 
    protected $primaryKey = 'id_soal';
    public $timestamps = true;

    protected $fillable = [
        'judul',
        'pertemuan', 
        'soal', 
        'id_dosen',
    ];
}
