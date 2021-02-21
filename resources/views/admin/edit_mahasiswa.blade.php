@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="menu">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <a href="{{ url('/auth/logout') }}" class="btn btn-outline-danger">Logout</a>
                </div>
            </nav>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                  <div class="list-group">
                  <a href="{{ route('daftar.jadwal') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.jadwal')) ? 'active' : '' }}">Daftar Jadwal</a>
                  <a href="{{ route('daftar.ruangan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.ruangan')) ? 'active' : '' }}">Daftar Ruangan</a>
                        <a href="{{ route('daftar.jurusan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.jurusan')) ? 'active' : '' }}">Daftar Jurusan</a>
                        <a href="{{ route('daftar.matakuliah') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.matakuliah')) ? 'active' : '' }}">Daftar Matakuliah</a>
                       
                        <a href="{{ route('create.view.kelas') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.kelas')) ? 'active' : '' }}">Buat Kelas Baru</a>                  
                        <a href="{{ route('create.view.ruangan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.ruangan')) ? 'active' : '' }}">Buat Ruangan Baru</a>
                        <a href="{{ route('create.view.jurusan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.jurusan')) ? 'active' : '' }}">Buat Jurusan Baru</a>
                        <a href="{{ route('create.view.matakuliah') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.matakuliah')) ? 'active' : '' }}">Buat Matakuliah Baru</a>
                        <a href="{{ route('create.view.jadwal') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.jadwal')) ? 'active' : '' }}">Buat Jadwal Baru</a> 
                        <a href="{{ route('create.view.dosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.dosen')) ? 'active' : '' }}">Buat Dosen Baru</a>
                        <a href="{{ route('daftar.mahasiswa') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.mahasiswa') ==0) ? 'active' : '' }}">Kelola Data Mahasiswa</a>
                        <a href="{{ route('daftar.dosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.dosen')) ? 'active' : '' }}">Kelola Data Dosen</a>
                </div>
                </div>
                
                <div class="col-md-9">
                  <div class="list-group">
                      <button type="button" class="list-group-item list-group-item-action active">Update Mahasiswa</button>
                      <form method="POST" action="{{ route('edit.putMahasiswa', $mahasiswa->id_mahasiswa) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                          <div class="col-md-12 mt-3">
                            @if(session('successMsg'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('successMsg') }}
                              </div>
                            @endif
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 mt-3">
                            <label for="nama_mhs">Nama</label>
                            <input type="text" class="form-control" name="nama_mhs" id="nama_mhs" value="{{ $mahasiswa->nama_mhs }}">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 mt-3">
                            <label for="nim_mhs">NIM</label>
                            <input type="text" class="form-control" name="nim_mhs" id="nim_mhs" value="{{ $mahasiswa->nim_mhs }}">
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12 mt-3">
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-control">
                        <option selected value="{{ $mahasiswa->id_mahasiswa }}">{{ $mahasiswa->jk }}</option>
                          <option value="Laki-laki">Laki-laki</option>
                          <option value="Perempuan">Perempuan</option>
                          </select>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 mt-3">
                            <label for="jurusan_id">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="form-control">
                            <option selected value ="{{ $mahasiswa->id_mahasiswa }}">{{$mahasiswa->nama_jurusan}}</option>
                              @foreach ($jurusans as $jurusan)
                                <option value={{ $jurusan->id_jurusan }}>{{ $jurusan->nama_jurusan }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 mt-3">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control">
                            <option selected value ="{{$mahasiswa->id_mahasiswa}}">{{$mahasiswa->nama_kelas}}</option>
                              @foreach ($kelas as $kelas)
                                <option value={{ $kelas->id_kelas }}>{{ $kelas->nama_kelas }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

            
                        <div class="row">
                        <div class="col-md-12 mt-3">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>

                      </form>
                  </div>
              </div>

            </div>
        </section>
    </div>
@endsection