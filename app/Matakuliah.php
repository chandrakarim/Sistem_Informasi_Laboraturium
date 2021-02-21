<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    // public $table = "matakuliah";
    // protected $fillable = [
    //     'name',
    // ];

    public $table = "matakuliah";
    protected $primaryKey = 'id_matkul';
    protected $fillable = [
        'nama_matkul',
    ];
/*
    public function kelas()
    {
        return $this->belongsTo('App\Kelas'::class);
    }

    public function dosen()
    {
        return $this->belongsTo('App\Dosen'::class);
    } */
}
