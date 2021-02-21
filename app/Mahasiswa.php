<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    public $table = "mahasiswa"; 
    protected $primaryKey = 'id_mahasiswa';
    public $timestamps = false;

    protected $fillable = [
        'nama_mhs',
        'nim_mhs',
        'username', 
        'jk',
        'password',
        'kelas_id',
        'jurusan_id'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function setPasswordAttribute($val)
    {
        return $this->attributes['password'] = md5($val);
    }
}
