<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use App\Dosen;
use App\Matakuliah;
use App\Mahasiswa;
use App\Kelas;
use App\Jurusan;

class LaporanController extends Controller
{
    public function getDataFilter(){
        $kelas = Kelas::all();
        $matakuliahs = Matakuliah::all();
        return view('/dosen/lihat_laporan', compact('laporan','kelas','matakuliahs'));
    }

    public function filter(Request $request){
        $laporan = Laporan::join('matakuliah', 'laporan.matakuliah_id', '=', 'matakuliah.id_matkul')
        ->join('mahasiswa', 'laporan.mahasiswa_id', '=', 'mahasiswa.id_mahasiswa')
        ->join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
        ->join('jurusan', 'laporan.jurusan_id', '=', 'jurusan.id_jurusan')
        ->select('matakuliah.*','jurusan.*','laporan.*','mahasiswa.*','kelas.*')
        ->where('matakuliah.id_matkul', $request->matakuliah_id)->where('mahasiswa.id_mahasiswa', $request->mahasiswa_id)
        ->paginate(25);
        return view('/dosen/filter_laporan', compact('laporan'));
    }

    public function getData(){
        $dosens = Dosen::all();
        $matakuliahs = Matakuliah::all();
        $kelas = Kelas::all();
        $mahasiswas = Mahasiswa::all();
        $jurusans = Jurusan::all();
        return view('/mahasiswa/upload_laporan', compact('matakuliahs','mahasiswas','kelas','jurusans','dosens'));
    }

    public function downloadLaporan($file){
        return response()->download(public_path()."/". "laporan/". $file);
    }

    public function postLaporan(Request $request){
        $this->validate($request, [
			'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        
		$file = $request->file('file');
		$nama_file = time()."_".$file->getClientOriginalName();
		$tujuan_upload = 'laporan';
        $file->move($tujuan_upload, $nama_file);

        $laporan = new Laporan;
        $laporan->pertemuan = $request->pertemuan;
        $laporan->file = $nama_file;
        $laporan->dosen_id = $request->dosen_id;           
        $laporan->matakuliah_id = $request->matakuliah_id;
        $laporan->jurusan_id = $request->jurusan_id;
        $laporan->mahasiswa_id = $request->mahasiswa_id;
        $laporan->save();

        return redirect(route('view.laporan'))->with('successMsg', 'Data Berhasil di Tambahkan');
    }
}
