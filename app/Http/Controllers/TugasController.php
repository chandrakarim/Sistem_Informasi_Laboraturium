<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Dosen;
use App\Kelas;
use App\Mahasiswa;
use App\Jurusan;
use App\Matakuliah;
use PDF;
use DB;

class TugasController extends Controller
{
    public function index(){
        $soals = Soal::join('matakuliah', 'soal.matakuliah_id', '=', 'matakuliah.id_matkul')
            ->join('mahasiswa', 'soal.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
           ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
           ->join('jurusan', 'soal.jurusan_id', '=', 'jurusan.id_jurusan')
           ->select('matakuliah.*','jurusan.*','soal.*','mahasiswa.*','kelas.*')
           ->paginate(25);
        
        return view('/dosen/daftar_tugas', compact('soals'));
    } 

    public function getSoal(){
        $soals = Soal::join('matakuliah', 'soal.matakuliah_id', '=', 'matakuliah.id_matkul')
            ->join('mahasiswa', 'soal.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
           ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
           ->join('jurusan', 'soal.jurusan_id', '=', 'jurusan.id_jurusan')
           ->select('matakuliah.*','jurusan.*','soal.*','mahasiswa.*','kelas.*')
           ->paginate(25);
        return view('/mahasiswa/lihat_tugas', compact('soals'));
    }

    public function downloadSoalById($id_soal){
        $soal = Soal::join('matakuliah', 'soal.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'soal.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
        ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
        ->join('jurusan', 'soal.jurusan_id', '=', 'jurusan.id_jurusan')
        ->select('matakuliah.*','jurusan.*','soal.*','mahasiswa.*','kelas.*')
        ->find($id_soal);
        return PDF::setPaper('a4', 'portrait')->loadView('/mahasiswa/download_tugas', compact('soal'))->stream('invoice.pdf');   
    }

    public function getViewUpload(){
        $matakuliahs = Matakuliah::all();
        $jurusans = Jurusan::all();
        $mahasiswas = Mahasiswa::all();
        $kelas = Kelas::all();
   
        
        //$jadwals = Jadwal::all();
        return view('/dosen/upload_tugas', compact('matakuliahs','jurusans','mahasiswas','kelas'));
    }

    public function edit($id_soal){
        $soal = Soal::join('matakuliah', 'soal.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'soal.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
        ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
        ->join('jurusan', 'soal.jurusan_id', '=', 'jurusan.id_jurusan')
        ->select('matakuliah.*','jurusan.*','soal.*','mahasiswa.*','kelas.*')
        ->find($id_soal);

        $matakuliahs = Matakuliah::all();
        $jurusans = Jurusan::all();
        $mahasiswas = Mahasiswa::all();
        $kelas = Kelas::all();
        return view('/dosen/edit_tugas', compact('matakuliahs','jurusans','mahasiswas','kelas','soal'));
    }

    public function postSoal(Request $request){
        $soal = new Soal;
        $soal->judul = $request->judul;
        $soal->pertemuan = $request->pertemuan;
        $soal->soal = $request->soal;
        // $soal->tanggal_upload = $request->tanggal_upload;
        $soal->matakuliah_id = $request->matakuliah_id;
        $soal->jurusan_id = $request->jurusan_id;
        $soal->mahasiswa_id = $request->mahasiswa_id;
        $soal->save();

        return redirect(route('create.view.tugas'))->with('successMsg', 'Data Berhasil di Tambahkan');

    }

    public function putSoal(Request $request, $id_soal){
        $soal = Soal::find($id_soal);
        $soal->judul = $request->judul;
        $soal->pertemuan = $request->pertemuan;
        $soal->soal = $request->soal;
        // $soal->tanggal_upload = $request->tanggal_upload;
        $soal->matakuliah_id = $request->matakuliah_id;
        $soal->jurusan_id = $request->jurusan_id;
        $soal->mahasiswa_id = $request->mahasiswa_id;
        $soal->save();

        return redirect(route('daftar.tugas'))->with('successMsg', 'Data Berhasil di Update');

    }

    public function deleteSoal($id_soal){
        $soal = Soal::find($id_soal);
        $soal->delete();
        return redirect(route('daftar.tugas'))->with('successMsg', 'Data Berhasil di hapus');
    }
}
