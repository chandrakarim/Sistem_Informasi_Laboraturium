<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    public $table = "ruangan";
    protected $primaryKey = 'id_ruangan';
    protected $fillable = [
        'nama_ruangan',
    ];

}
