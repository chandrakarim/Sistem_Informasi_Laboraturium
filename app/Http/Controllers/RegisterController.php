<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Kelas;
use App\Jurusan;

class RegisterController extends Controller
{
    public function postRegisterMahasiswa(Request $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->nim_mhs = $request->nim_mhs;
        $mahasiswa->username = $request->username;
        $mahasiswa->password = $request->password;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->save();
       return redirect('/')->with('success', 'Selamat Anda Telah Berhasil Melakukan Registrasi!,Silahkan Login!');
    }
    public function getRegisterMahasiswa(){
        $jurusans = Jurusan::all();
        $kelas =Kelas::all();
        return view('/auth_form/mahasiswa_register', compact('jurusans','kelas'));
    }
    public function RegisterMahasiswa(){
        $mahasiswa = Mahasiswa::all();
        return view('form/auth_form/mahasiswa_register', compact('mahasiswa'));
    }
}
