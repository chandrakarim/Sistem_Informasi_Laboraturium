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
                        <a href="{{ route('view.nilai') }}" type="button" class="list-group-item list-group-item-action">Lihat Nilai Laporan</a>
                        <a href="{{ route('view.tugas') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'view.tugas') == 0) ? 'active' : '' }}">Lihat Soal</a>
                        <a href="{{ route('view.modul') }}" type="button" class="list-group-item list-group-item-action">Lihat Modul</a>
                        <a href="{{ route('view.laporan') }}" type="button" class="list-group-item list-group-item-action">Upload Laporan</a>
                    </div>
                </div>
                {{-- <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Lihat Tugas</button>
                        <form method="GET" action="{{ route('get.pertemuan') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" name="id_mahasiswa" value="{{ Auth::guard('mahasiswa')->user()->id_mahasiswa }}" placeholder="Judul">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                              <label for="pertemuan">Pertemuam</label>
                              <select name="pertemuan" id="pertemuan" class="form-control">
                                <option value="#">Pertemuam</option>
                                  @foreach ($soals as $soal)
                                    <option value={{ $soal->pertemuan }}>{{ $soal->pertemuan }}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="row">
                            <button type="submit" class="btn btn-primary">Upload</button>
                          </div>                        
                        </form>
                            <p>{!! $soal->soal !!}</p>
                    </div>
                </div> --}}

                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Lihat Soal</button>
                        <table class="table table-bordered">
                          <thead>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Pertemuan</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($soals as $soal)
                            <tr>
                                <td>{{ $soal->id_soal }}</td>
                                <td>{{ $soal->nama_kelas }}</td>
                                <td>{{ $soal->nama_jurusan }}</td>
                                <td>{{ $soal->pertemuan }}</td>
                                <td>{{  substr(strip_tags($soal->judul), 0, 150)  }}{{ strlen(strip_tags($soal->judul)) > 150 ? '...' : "" }}</td>
                                <td>
                                    <a href="{{ route('details.tugas', $soal->id_soal) }}" type="button" class="btn btn-primary">Download</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection