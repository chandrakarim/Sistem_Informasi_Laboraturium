<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    public $table = "modul"; 
    protected $primaryKey = 'id_modul';
    public $timestamps = true;

    protected $fillable = [
        'pertemuan', 
        'file', 
        'matakuliah_id',
        'mahasiswa_id',
        'jurusan_id'
    ];
}
