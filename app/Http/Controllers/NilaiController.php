<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use App\Matakuliah;
use App\Mahasiswa;
use App\Kelas;
use App\Jurusan;

class NilaiController extends Controller
{
    public function index(){      
        $nilais = Nilai::join('matakuliah', 'nilai.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'nilai.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
       ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
       ->join('jurusan', 'nilai.jurusan_id', '=', 'jurusan.id_jurusan')
       ->select('matakuliah.*','jurusan.*','nilai.*','mahasiswa.*','kelas.*')
       ->paginate(25);
        return view('/dosen/daftar_nilai', compact('nilais'));
    }

    public function getViewUpload(){
        $matakuliahs = Matakuliah::all();
        $kelas = Kelas::all();
        $mahasiswas = Mahasiswa::all();
        $jurusans = Jurusan::all();
        return view('/dosen/upload_nilai', compact('matakuliahs','mahasiswas','kelas','jurusans'));
    }

    public function edit($id_nilai){
        $nilais = Nilai::join('matakuliah', 'nilai.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'nilai.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
       ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
       ->join('jurusan', 'nilai.jurusan_id', '=', 'jurusan.id_jurusan')
       ->select('matakuliah.*','jurusan.*','nilai.*','mahasiswa.*','kelas.*')
     ->find($id_nilai);
        
     $matakuliahs = Matakuliah::all();
     $kelas = Kelas::all();
     $mahasiswas = Mahasiswa::all();
     $jurusans = Jurusan::all();
        return view('/dosen/edit_nilai', compact('matakuliahs','mahasiswas','kelas','jurusans','nilais'));
    }

    public function getNilai(){
        $nilais = Nilai::join('matakuliah', 'nilai.matakuliah_id', '=', 'matakuliah.id_matkul')
       ->join('mahasiswa', 'nilai.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
       ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
       ->join('jurusan', 'nilai.jurusan_id', '=', 'jurusan.id_jurusan')
       ->select('matakuliah.*','jurusan.*','nilai.*','mahasiswa.*','kelas.*')
       ->paginate(25);   
        return view('/mahasiswa/lihat_nilai', compact('nilais'));
    }

    public function downloadNilai($file){
        return response()->download(public_path()."/". "nilai/". $file);
    }

    public function postNilai(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'nilai';
        $file->move($tujuan_upload, $nama_file);

        $nilai = new Nilai;
        $nilai->file = $nama_file;
        $nilai->pertemuan = $request->pertemuan;
        $nilai->matakuliah_id = $request->matakuliah_id;
        $nilai->jurusan_id = $request->jurusan_id;
        $nilai->mahasiswa_id = $request->mahasiswa_id;
        $nilai->save();

        return redirect(route('create.view.nilai'))->with('successMsg', 'Data Berhasil di Tambahkan');

    }

    public function putNilai(Request $request, $id_nilai){
        $this->validate($request, [
			'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'nilai';
        $file->move($tujuan_upload, $nama_file);

        $nilai = Nilai::find($id_nilai);
        $nilai->file = $nama_file;
        $nilai->pertemuan = $request->pertemuan;
        $nilai->matakuliah_id = $request->matakuliah_id;
        $nilai->jurusan_id = $request->jurusan_id;
        $nilai->mahasiswa_id = $request->mahasiswa_id;
        $nilai->save();

        return redirect(route('daftar.nilai'))->with('successMsg', 'Data Berhasil di Update');

    }

    public function deleteNilai($id_nilai){
        $nilai = Nilai::find($id_nilai);
        $nilai->delete();
        return redirect(route('daftar.nilai'))->with('successMsg', 'Data Berhasil di hapus');

    }
}
