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
                        <a href="{{ route('view.tugas') }}" type="button" class="list-group-item list-group-item-action">Lihat Soal</a>
                        <a href="{{ route('view.modul') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'view.modul') == 0) ? 'active' : '' }}">Lihat Modul</a>
                        <a href="{{ route('view.laporan') }}" type="button" class="list-group-item list-group-item-action">Upload Laporan</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Daftar Modul</button>
                        <table class="table table-bordered">
                            <thead>
                            <th scope="col">No</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Matakuliah</th>
                            <th scope="col">Pertemuan</th>    
                            <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($moduls as $modul)
                                <tr>
                                    <td>{{ $modul->id_modul }}</td>
                                    <td>{{ $modul->nama_kelas }}</td>
                                    <td>{{ $modul->nama_jurusan }}</td>  
                                    <td>{{ $modul->nama_matkul }}</td>                               
                                    <td>{{ $modul->pertemuan }}</td>
                                                              
                                    <td>
                                        <a href="{{ route('download.modul', $modul->file) }}" class="btn btn-primary" type="button">Download</a>
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