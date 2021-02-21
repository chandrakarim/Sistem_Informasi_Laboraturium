<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class login_dosen extends Authenticatable
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';

}
