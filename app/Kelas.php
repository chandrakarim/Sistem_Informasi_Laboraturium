<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $table = "kelas";
    protected $primaryKey = 'id_kelas';
    public $timestamps = true;

    protected $fillable = [
        'kode_kelas',
        'nama_kelas', 
        'id_admin', 
    ];
}
