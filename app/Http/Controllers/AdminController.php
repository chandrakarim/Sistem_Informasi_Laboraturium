<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Kelas;
use App\Admin;
use App\Dosen;
use App\Mahasiswa;
use App\Ruangan;
use App\Jurusan;
use App\Matakuliah;
use App\Jadwal;

class AdminController extends Controller
{
    public function getKelas()
    {
        $kelas = Kelas::all();
        return view('/admin/index', compact('kelas'));
    }

    public function postKelas(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        try {
            $kelas->save();
            return redirect(route('create.view.kelas'))->with('successMsg', 'Data Berhasil di Tambahkan');        
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
               return back()->with('errorMsg', 'Maaf,Data Gagal di Tambahkan');
            }
            else{
             return back()->with('errorMsg', $e->getMessage());
            }
        }
    } 
//daftar Ruangan
public function getRuangan(){
        $ruangans = Ruangan::all();
        return view('/admin/daftar_ruangan', compact('ruangans'));
    }
public function postRuangan(Request $request) 
{
    $ruangan = new Ruangan;
    $ruangan->id_ruangan = $request->id_ruangan;
    $ruangan->nama_ruangan = $request->nama_ruangan;
    //$ruangan->save();
    try {
        $ruangan->save();
        return redirect(route('create.view.ruangan'))->with('successMsg', 'Data Berhasil di Tambahkan');
    } catch(\Illuminate\Database\QueryException $e){
        $errorCode = $e->errorInfo[1];
        if($errorCode == '1062'){
           return back()->with('errorMsg', 'Maaf,Data Gagal di Tambahkan');
        }
        else{
         return back()->with('errorMsg', $e->getMessage());
        }
    }
}
// daftar Jurusan
public function getJurusan(){
    $jurusans = Jurusan::all();
    return view('/admin/daftar_jurusan', compact('jurusans'));
}
public function postJurusan(Request $request) 
{
$jurusan = new Jurusan;
$jurusan->id_jurusan = $request->id_jurusan;
$jurusan->nama_jurusan = $request->nama_jurusan;
//$jurusan->save();
try {
    $jurusan->save();
    return redirect(route('create.view.jurusan'))->with('successMsg', 'Data Berhasil di Tambahkan');
} catch(\Illuminate\Database\QueryException $e){
    $errorCode = $e->errorInfo[1];
    if($errorCode == '1062'){
       return back()->with('errorMsg', 'Maaf,Data Gagal di Tambahkan');
    }
    else{
     return back()->with('errorMsg', $e->getMessage());
    }
}
}
//daftar matakuliah
public function getMatakuliah(){
    $matakuliahs = Matakuliah::all();
    return view('/admin/daftar_matakuliah', compact('matakuliahs'));
}
public function postMatakuliah(Request $request) 
{
$matakuliah = new Matakuliah;
$matakuliah->id_matkul = $request->id_matkul;
$matakuliah->kode_matkul = $request->kode_matkul;
$matakuliah->nama_matkul = $request->nama_matkul;
$matakuliah->sks = $request->sks;
//$matakuliah->save();
try {
    $matakuliah->save();
    return redirect(route('create.view.matakuliah'))->with('successMsg', 'Data Berhasil di Tambahkan');
} catch(\Illuminate\Database\QueryException $e){
    $errorCode = $e->errorInfo[1];
    if($errorCode == '1062'){
       return back()->with('errorMsg', 'Maaf,Data Gagal di Tambahkan');
    }
    else{
     return back()->with('errorMsg', $e->getMessage());
    }
}
}
//daftar jadwal (lanjut join) 21-01-2021
//Alert Duplikat Belum di Buat 04-02-2021
public function getJadwal(){
    $jadwal = Jadwal::join('dosen', 'jadwal.dosen_id', '=', 'dosen.id_dosen')
    ->join('matakuliah', 'jadwal.matakuliah_id', '=', 'matakuliah.id_matkul')
    ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id_ruangan')
    ->join('kelas', 'jadwal.kelas_id', '=', 'kelas.id_kelas')
    ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
    ->select('jadwal.*', 'dosen.*', 'matakuliah.*', 'ruangan.*', 'kelas.*', 'jurusan.*')
    ->paginate(25);
    //$jadwal = Jadwal::all();
    return view('/admin/daftar_jadwal', compact('jadwal'));
}
public function postJadwal(Request $request) 
{
$jadwal = new Jadwal;
$jadwal->id_jadwal = $request->id_jadwal;
$jadwal->dosen_id = $request->dosen_id;
$jadwal->matakuliah_id = $request->matakuliah_id;
$jadwal->ruangan_id = $request->ruangan_id;
$jadwal->kelas_id = $request->kelas_id;
$jadwal->jurusan_id = $request->jurusan_id;
$jadwal->hari = $request->hari;
$jadwal->jam_mulai = $request->jam_mulai;
$jadwal->jam_selesai = $request->jam_selesai;

try {
    $jadwal->save();
    return redirect(route('create.view.jadwal'))->with('successMsg', 'Data Berhasil di Tambahkan');
} catch(\Illuminate\Database\QueryException $e){
    $errorCode = $e->errorInfo[1];
    if($errorCode == '1062'){
       return back()->with('errorMsg', 'Maaf,Data Gagal di Tambahkan');
    }
    else{
     return back()->with('errorMsg', $e->getMessage());
    }
}
}

//jadwal dosen
public function getJadwaldosen(){
    $jadwal = Jadwal::join('dosen', 'jadwal.dosen_id', '=', 'dosen.id_dosen')
    ->join('matakuliah', 'jadwal.matakuliah_id', '=', 'matakuliah.id_matkul')
    ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id_ruangan')
    ->join('kelas', 'jadwal.kelas_id', '=', 'kelas.id_kelas')
    ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
    ->select('jadwal.*', 'dosen.*', 'matakuliah.*', 'ruangan.*', 'kelas.*', 'jurusan.*')
    ->paginate(25);
    //$jadwal = Jadwal::all();
    return view('/dosen/daftar_jadwal', compact('jadwal'));
}
// tambah dosen
public function postDosen(Request $request) 
{
$dosen = new Dosen;
$dosen->id_dosen = $request->id_dosen;
$dosen->nip = $request->nip;
$dosen->nama_dosen = $request->nama_dosen;
$dosen->username = $request->username;
$dosen->email = $request->email;
$dosen->no_telp = $request->no_telp;
$dosen->jk = $request->jk;
$dosen->password = $request->password;
//$dosen->save();
try {
    $dosen->save();
    return redirect(route('create.view.dosen'))->with('successMsg', 'Data Berhasil di Tambahkan');
} catch(\Illuminate\Database\QueryException $e){
    $errorCode = $e->errorInfo[1];
    if($errorCode == '1062'){
       return back()->with('errorMsg', 'Maaf,Data Gagal di Tambahkan');
    }
    else{
     return back()->with('errorMsg', $e->getMessage());
    }
}
}

//tambah kelas
    public function getViewCreate(){
        $kelas = Kelas::all();      
        return view('/admin/create_class', compact('kelas'));
    }

    //tambah ruangan
    public function getViewCreateRuangan(){
        $ruangans = Ruangan::all();
        return view('/admin/create_ruangan', compact('ruangans'));
    }
    //tambah jurusan
    public function getViewCreateJurusan(){
        $jurusans = Jurusan::all();
        return view('/admin/create_jurusan', compact('jurusans'));
    }
//tambah matakuliah
public function getViewCreateMatakuliah(){
    $matakuliahs = Admin::all();
    return view('/admin/create_matakuliah', compact('matakuliahs'));
}
//tambah jadwal
public function getViewCreateJadwal(){
    $jadwal = Jadwal::all();
    $dosens = Dosen::all();
    $matakuliahs = Matakuliah::all();
    $ruangans = Ruangan::all();
    $jurusans = Jurusan::all();
    $kelas = Kelas::all();
   
    return view('/admin/create_jadwal', compact('jadwal','dosens','matakuliahs','ruangans','jurusans','kelas'));
}
//tambah jadwal dosen
public function getViewCreateJadwaldosen(){
    $jadwal = Jadwal::all();
    $dosens = Dosen::all();
    $matakuliahs = Matakuliah::all();
    $ruangans = Ruangan::all();
    $jurusans = Jurusan::all();
    $kelas = Kelas::all();
   
    return view('/dosen/create_jadwal', compact('jadwal','dosens','matakuliahs','ruangans','jurusans','kelas'));
}
//mahasiswa baru-----------------------------
public function getViewCreateMahasiswa(){
    $mahasiswa = Mahasiswa::all();
    $jurusans = Jurusan::all();
    $kelas =Kelas::all();
   
    return view('/admin/create_mahasiswa', compact('mahasiswa','jurusans','kelas'));
}
/////////////////////////////////////////////////////

public function getViewCreateDosen(){
    $dosens = Dosen::all();
    return view('/admin/create_dosen', compact('dosens'));
}

    public function getDosen(){
        $dosens = Dosen::all();
        return view('/admin/data_dosen', compact('dosens'));
    }
//data mahasiswa 
    public function getMahasiswa(){
        $mahasiswas = Mahasiswa::join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
        ->join('jurusan', 'mahasiswa.jurusan_id', '=', 'jurusan.id_jurusan')
        ->select('mahasiswa.*', 'kelas.*', 'jurusan.*')
        ->paginate(25);
        return view('/admin/data_mahasiswa', compact('mahasiswas'));
    }
//edit kelas
    public function getViewEdit($id_kelas){
        $kelas = Kelas::find($id_kelas);
        return view('/admin/edit_kelas', compact('kelas'));
    }
    //edit ruangan
    public function getViewEditRuangan($id_ruangan){
        $ruangan = Ruangan::find($id_ruangan);
        return view('/admin/edit_ruangan', compact('ruangan'));
    }
    //edit jurusan
    public function getViewEditJurusan($id_jurusan){
        $jurusan = Jurusan::find($id_jurusan);
        return view('/admin/edit_jurusan', compact('jurusan'));
    }
    //edit matakuliah
    public function getViewEditMatakuliah($id_matkul){
        $matakuliah = Matakuliah::find($id_matkul);
        return view('/admin/edit_matakuliah', compact('matakuliah'));
    }
    //edit jadwal
    public function getViewEditJadwal($id_jadwal){
      // $jadwal = Jadwal::find($id_jadwal);
       $jadwal = Jadwal::join('dosen', 'jadwal.dosen_id', '=', 'dosen.id_dosen')
       ->join('matakuliah', 'jadwal.matakuliah_id', '=', 'matakuliah.id_matkul')
       ->join('ruangan', 'jadwal.ruangan_id', '=', 'ruangan.id_ruangan')
       ->join('kelas', 'jadwal.kelas_id', '=', 'kelas.id_kelas')
       ->join('jurusan', 'jadwal.jurusan_id', '=', 'jurusan.id_jurusan')
       ->select('jadwal.*', 'dosen.*', 'matakuliah.*', 'ruangan.*', 'kelas.*', 'jurusan.*')
       ->find($id_jadwal);
       $dosens = Dosen::all();
       $matakuliahs = Matakuliah::all();
       $ruangans = Ruangan::all();
       $jurusans = Jurusan::all();
       $kelas = Kelas::all();
        return view('/admin/edit_jadwal', compact('jadwal','dosens','matakuliahs','ruangans','jurusans','kelas'));
    }
    //edit mahasiswa
    public function getViewEditMhs($id_mahasiswa){
        //$mahasiswa = Mahasiswa::find($id_mahasiswa);
        $mahasiswa = Mahasiswa::join('kelas', 'mahasiswa.kelas_id', '=', 'kelas.id_kelas')
        ->join('jurusan', 'mahasiswa.jurusan_id', '=', 'jurusan.id_jurusan')
        ->select('mahasiswa.*', 'kelas.*', 'jurusan.*')
        ->find($id_mahasiswa);
        $jurusans = Jurusan::all();
        $kelas =Kelas::all();
        return view('/admin/edit_mahasiswa', compact('mahasiswa','jurusans','kelas'));
    }
    //edit dosen
    public function getViewEditDosen($id_dosen){
        $dosen = Dosen::find($id_dosen);
        return view('/admin/edit_dosen', compact('dosen'));
    }
    //edit kelas
    public function putKelas(request $request, $id_kelas){
        $kelas = Kelas::find($id_kelas);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->save();
        return redirect(route('daftar.kelas'))->with('successMsg', 'Data Berhasil di Update');
    }

    //ruangan
    public function putRuangan(request $request, $id_ruangan){
        $ruangan = Ruangan::find($id_ruangan);
        $ruangan->id_ruangan = $request->id_ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->save();
        return redirect(route('daftar.ruangan'))->with('successMsg', 'Data Berhasil di Update');
    }
    //jurusan
    public function putJurusan(request $request, $id_jurusan){
        $jurusan = Jurusan::find($id_jurusan);
        $jurusan->id_jurusan = $request->id_jurusan;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();
        return redirect(route('daftar.jurusan'))->with('successMsg', 'Data Berhasil di Update');
    }
    //matakuliah
    public function putMatakuliah(request $request, $id_matkul){
        $matakuliah = Matakuliah::find($id_matkul);
        $matakuliah->id_matkul = $request->id_matkul;
        $matakuliah->kode_matkul = $request->kode_matkul;
        $matakuliah->nama_matkul = $request->nama_matkul;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();
        return redirect(route('daftar.matakuliah'))->with('successMsg', 'Data Berhasil di Update');
    }
    //jadwal
    public function putJadwal(request $request, $id_jadwal){
        $jadwal = Jadwal::find($id_jadwal);
        $jadwal->id_jadwal = $request->id_jadwal;
        $jadwal->dosen_id = $request->dosen_id;
        $jadwal->matakuliah_id = $request->matakuliah_id;
        $jadwal->ruangan_id = $request->ruangan_id;
        $jadwal->kelas_id = $request->kelas_id;
        $jadwal->jurusan_id = $request->jurusan_id;
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->save();
        return redirect(route('daftar.jadwal'))->with('successMsg', 'Data Berhasil di Update');
    }
    //mahasiswa
    public function putMahasiswa(request $request, $id_mahasiswa){
        $mahasiswa = Mahasiswa::find($id_mahasiswa);
        $mahasiswa->nama_mhs = $request->nama_mhs;
        $mahasiswa->nim_mhs = $request->nim_mhs;
        $mahasiswa->jk = $request->jk;
        $mahasiswa->jurusan_id = $request->jurusan_id;
        $mahasiswa->kelas_id = $request->kelas_id;
        $mahasiswa->save();
        return redirect(route('daftar.mahasiswa'))->with('successMsg', 'Data Berhasil di Update');
    }
    //dosen
    public function putDosen(request $request, $id_dosen){
        $dosen = Dosen::find($id_dosen);
        $dosen->nama_dosen = $request->nama_dosen;
        $dosen->nip = $request->nip;
        $dosen->email = $request->email;
        $dosen->no_telp = $request->no_telp;
        $dosen->jk = $request->jk;
        $dosen->save();
        return redirect(route('daftar.dosen'))->with('successMsg', 'Data Berhasil di Update');
    }
//hapus kelas
    public function deleteKelas($id_kelas){
        $kelas = Kelas::find($id_kelas);
        $kelas->delete();

        return redirect(route('daftar.kelas'))->with('successMsg', 'Data Berhasil di Delete');
    }
//hapus mahasiswa
    public function deleteMahasiswa($id_mahasiswa){
        $mahasiswa = Mahasiswa::find($id_mahasiswa);
        $mahasiswa->delete();

        return redirect(route('daftar.mahasiswa'))->with('successMsg', 'Data Berhasil di Delete');
    }
//hapus dosen
    public function deleteDosen($id_dosen){
        $dosen = Dosen::find($id_dosen);
        $dosen->delete();

        return redirect(route('daftar.dosen'))->with('successMsg', 'Data Berhasil di Delete');
    }
    //hapus ruangan
    public function deleteRuangan($id_ruangan){
        $ruangan = Ruangan::find($id_ruangan);
        $ruangan->delete();

        return redirect(route('daftar.ruangan'))->with('successMsg', 'Data Berhasil di Delete');
    }
    //hapus jurusan
        public function deleteJurusan($id_jurusan){
            $jurusan = Jurusan::find($id_jurusan);
            $jurusan->delete();
    
            return redirect(route('daftar.jurusan'))->with('successMsg', 'Data Berhasil di Delete');
        }
    //hapus matakuliah
         public function deleteMatakuliah($id_matkul){
            $matakuliah = Matakuliah::find($id_matkul);
            $matakuliah->delete();
    
            return redirect(route('daftar.matakuliah'))->with('successMsg', 'Data Berhasil di Delete');
        }
    //hapus jadwal
           public function deleteJadwal($id_jadwal){
            $jadwal = Jadwal::find($id_jadwal);
            $jadwal->delete();
    
            return redirect(route('daftar.jadwal'))->with('successMsg', 'Data Berhasil di Delete');
        }

}
