<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class classController extends Controller
{
    public function create_class(){
        return view('admin/create_class');
    }
}
