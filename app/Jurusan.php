<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // public $table = "jurusan";
    // protected $fillable = [
    //     'name',
    // ];

    public $table = "jurusan";
    protected $primaryKey = 'id_jurusan';
    protected $fillable = [
        'nama_jurusan',
    ];
    // public function kelas()
    // {
    //     return $this->morphedByMany(\App\Kelas::class, 'rrrrrrrrrrrr','dfghdfgd');
    // }
}
