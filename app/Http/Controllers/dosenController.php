<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dosenController extends Controller
{
    public function data_dosen(){
        return view('admin/data_dosen');
    }
}
