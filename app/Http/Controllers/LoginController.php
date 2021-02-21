<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Mahasiswa;
use App\Dosen;

class LoginController extends Controller
{
    function masuk(Request $kiriman){
        $admin = Admin::where([
            'username' => $kiriman->username,
            'password' => md5($kiriman->password)
        ])->get();

        $dosen = Dosen::where([
            'username' => $kiriman->username,
            'password' => md5($kiriman->password)
        ])->get();

        $mahasiswa = Mahasiswa::where([
            'username' => $kiriman->username,
            'password' => md5($kiriman->password)
        ])->get();

        if (count($admin)>0) {
            Auth::guard('admin')->loginUsingId($admin[0]['id_admin']);
            return redirect(route('daftar.jadwal'));

        }elseif (count($dosen)>0) {
            Auth::guard('dosen')->loginUsingId($dosen[0]['id_dosen']);
            return redirect(route('daftar.jadwaldosen'));

        }elseif (count($mahasiswa)>0) {
            Auth::guard('mahasiswa')->loginUsingId($mahasiswa[0]['id_mahasiswa']);
            return redirect(route('view.nilai'));

        }else {
            return redirect(URL('/'));
        }
    }

    
    function keluar(){
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();

        }elseif (Auth::guard('dosen')->check()) {
            Auth::guard('dosen')->logout();

        }elseif (Auth::guard('mahasiswa')->check()) {
            Auth::guard('mahasiswa')->logout();

        }

        return redirect('/');
    }
}
