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
                    <a href="{{route('create.view.tugas')}}" type="button" class="list-group-item list-group-item-action">Upload Soal</a>
                    <a href="{{route('create.view.modul')}}" type="button" class="list-group-item list-group-item-action ">Upload Modul</a>
                    <a href="{{route('create.view.nilai')}}" type="button" class="list-group-item list-group-item-action">Upload Nilai</a>
                    <a href="{{route('daftar.laporan')}}" type="button" class="list-group-item list-group-item-action">Lihat Laporan</a>
                    <a href="{{route('create.view.pengaturanpassword', Auth::guard('dosen')->user()->id_dosen )}}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.modul') == 0) ? 'active' : '' }}">Pengaturan Password</a>
                  </div>
                </div>
                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Pengaturan Password</button>
                        <form method="POST" action="{{ route('update.pengaturanpassword', Auth::guard('dosen')->user()->id_dosen) }}" enctype="multipart/form-data">
                          @csrf
                          {{ method_field('POST') }}

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
                              <label for="password_lama">Password Lama</label>
                              <input type="text" class="form-control" name="#" id="password_lama">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12 mt-3">
                              <label for="password_baru">Password Baru</label>
                              <input type="password" class="form-control" name="password_baru" id="password_baru">
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12 mt-3">
                              <label for="confirm_password">Confirm Password</label>
                              <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                            </div>
                          </div>
                          
                          <br>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection