<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public $table = "dosen";
    protected $primaryKey = 'id_dosen';
    public $timestamps = false;

    protected $fillable = [
        'nip',
        'nama_dosen',
        'username', 
        'email', 
        'no_telp',
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function setPasswordAttribute($val)
    {
        return $this->attributes['password'] = md5($val);
    }
}
