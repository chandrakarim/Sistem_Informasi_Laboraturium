<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public $table = "laporan";
    protected $primaryKey = 'id_laporan';
    public $timestamps = false;
}
