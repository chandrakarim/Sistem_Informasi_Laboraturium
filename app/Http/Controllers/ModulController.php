<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modul;
use App\Matakuliah;
use App\Mahasiswa;
use App\Kelas;
use App\Jurusan;


class ModulController extends Controller
{
    public function getModul(){
        $moduls = Modul::join('matakuliah', 'modul.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'modul.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
       ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
       ->join('jurusan', 'modul.jurusan_id', '=', 'jurusan.id_jurusan')
       ->select('matakuliah.*','jurusan.*','modul.*','mahasiswa.*','kelas.*')
       ->paginate(25);
        return view('/dosen/index', compact('moduls'));
    }

    public function getModulMahasiswa(){
        $moduls = Modul::join('matakuliah', 'modul.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'modul.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
       ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
       ->join('jurusan', 'modul.jurusan_id', '=', 'jurusan.id_jurusan')
       ->select('matakuliah.*','jurusan.*','modul.*','mahasiswa.*','kelas.*')
       ->paginate(25);
        return view('/mahasiswa/lihat_modul', compact('moduls'));
    }

    public function getViewUpload(){
        $matakuliahs = Matakuliah::all();
        $kelas = Kelas::all();
        $mahasiswas = Mahasiswa::all();
        $jurusans = Jurusan::all();
        return view('/dosen/upload_modul', compact('matakuliahs','mahasiswas','kelas','jurusans'));
    }
    public function edit($id_modul){
        $moduls = Modul::join('matakuliah', 'modul.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'modul.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
        ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
        ->join('jurusan', 'modul.jurusan_id', '=', 'jurusan.id_jurusan')
        ->select('matakuliah.*','jurusan.*','modul.*','mahasiswa.*','kelas.*')
        ->find($id_modul);

        $matakuliahs = Matakuliah::all();
        $kelas = Kelas::all();
        $mahasiswas = Mahasiswa::all();
        $jurusans = Jurusan::all();
        return view('/dosen/edit_modul', compact('moduls','matakuliahs','mahasiswas','kelas','jurusans'));
    }

    public function downloadModul($file){
        return response()->download(public_path()."/". "modul/". $file);
        //var_dump($file); die();
    }

    public function postModul(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'modul';
        $file->move($tujuan_upload,$nama_file);

        $modul = new Modul;
        $modul->file = $nama_file;
        $modul->pertemuan = $request->pertemuan;
        // $modul->tanggal_upload = $request->tanggal_upload;
        $modul->matakuliah_id = $request->matakuliah_id;
        $modul->jurusan_id = $request->jurusan_id;
        $modul->mahasiswa_id = $request->mahasiswa_id;
        $modul->save();

        return redirect(route('create.view.modul'))->with('successMsg', 'Data Berhasil di Tambahkan');
    }

    public function putModul(Request $request, $id_modul){
        $this->validate($request, [
			'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'modul';
        $file->move($tujuan_upload,$nama_file);

        $modul = Modul::find($id_modul);
       // $modul->judul = $request->judul;
        $modul->file = $nama_file;
        $modul->pertemuan = $request->pertemuan;
        // $modul->tanggal_upload = $request->tanggal_upload;
        $modul->matakuliah_id = $request->matakuliah_id;
        $modul->jurusan_id = $request->jurusan_id;
        $modul->mahasiswa_id = $request->mahasiswa_id;
        $modul->save();

        return redirect(route('daftar.modul'))->with('successMsg', 'Data Berhasil di Update');
    }

    public function deleteModul($id_modul){
        $modul = Modul::find($id_modul);
        $modul->delete();
        return redirect(route('daftar.modul'))->with('successMsg', 'Data Berhasil di Hapus');
    }
}
