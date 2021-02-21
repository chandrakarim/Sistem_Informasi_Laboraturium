<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class login_mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';

}
