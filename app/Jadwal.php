<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    public $table = "jadwal";
    protected $primaryKey = 'id_jadwal';
    public $timestamps = false;

    protected $fillable = [
        'dosen_id',
        'matakuliah_id',
        'ruangan_id',
        'kelas_id',
        'jurusan_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];


    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan');
       // return $this->hasMany('App\Jurusan','id', 'jurusan_id');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas'::class);
        //return $this->hasMany('App\Kelas','id', 'kelas_id');
    }

    public function matakuliah()
    {
        return $this->belongsTo(\App\Matakuliah::class);
        //return $this->hasMany('App\Kelas','id', 'kelas_id');
    }
    public function ruangan()
    {
        return $this->belongsTo(\App\Ruangan::class);
        //return $this->hasMany('App\Kelas','id', 'kelas_id');
    }
/*     public function jurusan()
    {
        return $this->hasMany(\App\Jurusan::class);
    }
 */

}
