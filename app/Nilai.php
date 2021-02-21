<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    public $table = "nilai"; 
    protected $primaryKey = 'id_nilai';
    public $timestamps = true;

    protected $fillable = [
        'pertemuan', 
        'file', 
        'id_dosen',
    ];
}
