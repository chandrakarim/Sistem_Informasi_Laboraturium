<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Kelas;
use App\Jurusan;
use App\Mahasiswa;

class RegisterMahasiswaController extends Controller
{
    public function RegisterMahasiswa(){
        $mahasiswa = Mahasiswa::all();
        // $jurusans = Jurusan::all();
        // $kelas =Kelas::all();
        return view('/register/mahasiswa', compact('mahasiswa'));
    }
    public function postRegisterMahasiswa(Request $request){
        //dd('postRegisterMahasiswa');
        $mahasiswa = new Mahasiswa;
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->nim_mhs = $request->nim_mhs;
        $mahasiswa->username = $request->username;
        $mahasiswa->password = $request->password;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->save();
       // dd($mahasiswa);
        return redirect(route('/register/mahasiswa'))->with('successMsg', 'Data Berhasil di Tambahkan');
    }
    public function getRegisterMahasiswa(){
        $mahasiswa = Mahasiswa::all();
        $jurusans = Jurusan::all();
        $kelas =Kelas::all();
        return view('/register/mahasiswa', compact('mahasiswa','jurusans','kelas'));
    }
}
