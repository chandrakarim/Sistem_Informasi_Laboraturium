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
                    <a href="{{ route('daftar.jadwaldosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.jadwaldosen')) ? 'active' : '' }}">Daftar Jadwal</a>
                        <a href="{{ route('daftar.modul') }}" type="button" class="list-group-item list-group-item-action">Daftar Modul</a>
                        <a href="{{ route('daftar.nilai') }}" type="button" class="list-group-item list-group-item-action">Daftar Nilai</a>
                        <a href="{{ route('daftar.tugas') }}" type="button" class="list-group-item list-group-item-action">Daftar Tugas</a>
                        <a href="{{route('create.view.tugas')}}" type="button" class="list-group-item list-group-item-action ">Upload Soal</a>
                        <a href="{{route('create.view.modul')}}" type="button" class="list-group-item list-group-item-action">Upload Modul</a>
                        <a href="{{route('create.view.nilai')}}" type="button" class="list-group-item list-group-item-action">Upload Nilai</a>
                        <a href="{{route('daftar.laporan')}}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.laporan') == 0) ? 'active' : '' }}">Lihat Laporan</a>
                        <a href="{{ route('create.view.pengaturanpassword') }}" type="button" class="list-group-item list-group-item-action">Pengaturan Password</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Lihat Laporan</button>
                        <form method="Get" action="{{ route('filter.laporan') }}" enctype="multipart/form-data">
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

                      <input type="hidden" class="form-control" name="id_dosen" value="{{ Auth::guard('dosen')->user()->id_dosen }}" placeholder="Judul"> 

                          <div class="row">
                            <div class="col-md-12 mt-3">
                              <label for="matakuliah_id">Matakuliah</label>
                              <select name="matakuliah_id" id="matakuliah_id" class="form-control">
                              <option selected disabled>Pilih Matakuliah</option>
                                @foreach ($matakuliahs as $j)
                                <option value={{ $j->id_matkul }}>{{ $j->nama_matkul }}</option>
                              @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12 mt-3">
                              <label for="mahasiswa_id"> Kelas</label>
                              <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                                <option selected disabled>Pilih Kelas</option>
                                @foreach ($kelas as $k)
                                <option value={{ $k->id_kelas }}>
                                  {{ $k->nama_kelas }}                      
                                </option>
                                @endforeach
                              </select>
                            </div>
                          </div>

                          <br>
                          <button type="submit" class="btn btn-primary">Lihat</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection