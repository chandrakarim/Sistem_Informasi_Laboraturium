<?php

namespace App\Http\Controllers;
use App\Dosen;

use Illuminate\Http\Request;

class PengaturanPassword extends Controller
{
    public function getPassword(){
        return view('/dosen/pengaturan_password');
    }

    public function update(Request $request, $id_dosen){
        $dosen = Dosen::find($id_dosen);
        $dosen->password = $request->password_baru;
        $dosen->save();

        return redirect(route('create.view.pengaturanpassword'))->with('successMsg', 'Password Berhasil di Update');
    }
}
