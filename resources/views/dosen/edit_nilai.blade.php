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
                        <a href="{{route('daftar.modul')}}" type="button" class="list-group-item list-group-item-action">Daftar Modul</a>
                        <a href="{{ route('daftar.nilai') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.nilai') == 0) ? 'active' : '' }}">Daftar Nilai</a>
                        <a href="{{route('daftar.tugas')}}" type="button" class="list-group-item list-group-item-action">Daftar Tugas</a>
                        <a href="{{route('create.view.tugas')}}" type="button" class="list-group-item list-group-item-action">Upload Soal</a>
                        <a href="{{route('create.view.modul')}}" type="button" class="list-group-item list-group-item-action">Upload Modul</a>
                        <a href="{{route('create.view.nilai')}}" type="button" class="list-group-item list-group-item-action">Upload Nilai</a>
                        <a href="{{route('daftar.laporan')}}" type="button" class="list-group-item list-group-item-action">Lihat Laporan</a>
                        <a href="{{route('create.view.pengaturanpassword')}}" type="button" class="list-group-item list-group-item-action">Pengaturan Password</a>
                      </div>
                </div>
                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Upload Modul</button>
                        <form method="POST" action="{{ route('update.nilai', $nilais->id_nilai) }}" enctype="multipart/form-data">
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
                            <option selected value="{{$nilais->id_nilai}}">{{$nilais->nama_matkul}}</option>
                              @foreach ($matakuliahs as $matakuliah)
                                <option value={{ $matakuliah->id_matkul }}>{{ $matakuliah->nama_matkul }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-md-12 mt-3">
                              <label for="pertemuan">Pertemuan</label>
                              <select name="pertemuan" id="pertemuan" class="form-control">
                              <option selected value="{{$nilais->id_nilai}}">{{$nilais->pertemuan}}</option>
                                <option value="Pertemuan 1">Pertemuan 1</option>
                                <option value="Pertemuan 2">Pertemuan 2</option>
                                <option value="Pertemuan 3">Pertemuan 3</option>
                                <option value="Pertemuan 4">Pertemuan 4</option>
                                <option value="Pertemuan 5">Pertemuan 5</option>
                                <option value="Pertemuan 6">Pertemuan 6</option>
                                <option value="Pertemuan 7">Pertemuan 7</option>
                                <option value="Pertemuan 8">Pertemuan 8</option>
                                <option value="Pertemuan 9">Pertemuan 9</option>
                                <option value="Pertemuan 10">Pertemuan 10</option>
                                <option value="Pertemuan 11">Pertemuan 11</option>
                                <option value="Pertemuan 12">Pertemuan 12</option>
                                <option value="Pertemuan 13">Pertemuan 13</option>
                                <option value="Pertemuan 14">Pertemuan 14</option>
                              </select>
                            </div>
                          </div>

                          <div class="row">
                          <div class="col-md-12 mt-3">
                            <label for="jurusan_id">Jurusan</label>
                            <select name="jurusan_id" id="jurusan_id" class="form-control">
                            <option selected value ="{{$nilais->id_nilai}}">{{$nilais->nama_jurusan}}</option>
                              @foreach ($jurusans as $jurusan)
                                <option value={{ $jurusan->id_jurusan }}>{{ $jurusan->nama_jurusan }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12 mt-3">
                            <label for="mahasiswa_id">Kelas</label>
                            <select name="mahasiswa_id" id="mahasiswa_id" class="form-control">
                            <option selected value ="{{$nilais->id_nilai}}">{{$nilais->nama_kelas}}</option>
                              @foreach ($kelas as $kelas)
                                <option value={{ $kelas->id_kelas }}>{{ $kelas->nama_kelas }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>      
                          <div class="row">
                            <div class="col-md-12 mt-3">
                              <label for="file">File</label>
                              <input type="file" class="form-control" name="file" id="file" value="{{$nilais->file}}">{{$nilais->file}}
                            </div>
                          </div><br>
                          <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </div>
@endsection