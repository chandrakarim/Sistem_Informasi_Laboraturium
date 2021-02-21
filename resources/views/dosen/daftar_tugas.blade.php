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
                        <a href="{{ route('daftar.nilai') }}" type="button" class="list-group-item list-group-item-action">Daftar Nilai</a>
                        <a href="{{route('daftar.tugas')}}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.tugas') == 0) ? 'active' : '' }}">Daftar Tugas</a>
                        <a href="{{route('create.view.tugas')}}" type="button" class="list-group-item list-group-item-action">Upload Soal</a>
                        <a href="{{route('create.view.modul')}}" type="button" class="list-group-item list-group-item-action">Upload Modul</a>
                        <a href="{{route('create.view.nilai')}}" type="button" class="list-group-item list-group-item-action">Upload Nilai</a>
                        <a href="{{route('daftar.laporan')}}" type="button" class="list-group-item list-group-item-action">Lihat Laporan</a>
                        <a href="{{route('create.view.pengaturanpassword')}}" type="button" class="list-group-item list-group-item-action">Pengaturan Password</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Daftar Tugas</button>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                @if(session('successMsg'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('successMsg') }}
                                    </div>
                                    @endif
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col">No</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">MataKuliah</th>
                                <th scope="col">Pertemuan</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($soals as $m)
                                <tr>
                                    <td>{{ $m->id_soal }}</td>
                                    <td>{{ $m->nama_kelas }}</td>
                                    <td>{{ $m->nama_matkul }}</td>
                                    <td>{{ $m->pertemuan }}</td>
                                    <td>{{ $m->nama_jurusan }}</td>
                                    <td>
                                        <a href="{{ route('edit.tugas', $m->id_soal) }}" class="btn btn-primary" type="button">Edit</a>
                                        <a href="{{ route('delete.tugas', $m->id_soal) }}" class="btn btn-danger" type="button">Delete</a>
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