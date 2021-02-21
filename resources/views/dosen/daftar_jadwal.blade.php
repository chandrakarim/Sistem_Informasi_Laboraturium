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
                        <a href="{{ route('daftar.jadwaldosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.jadwaldosen')== 0) ? 'active' : '' }}">Daftar Jadwal</a>
                        <a href="{{ route('daftar.modul') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.modul')) ? 'active' : '' }}">Daftar Modul</a>
                        <a href="{{ route('daftar.nilai') }}" type="button" class="list-group-item list-group-item-action">Daftar Nilai</a>
                        <a href="{{ route('daftar.tugas') }}" type="button" class="list-group-item list-group-item-action">Daftar Tugas</a>
                        <a href="{{route('create.view.tugas')}}" type="button" class="list-group-item list-group-item-action">Upload Soal</a>
                        <a href="{{route('create.view.modul')}}" type="button" class="list-group-item list-group-item-action">Upload Modul</a>
                        <a href="{{route('create.view.nilai')}}" type="button" class="list-group-item list-group-item-action">Upload Nilai</a>
                        <a href="{{route('daftar.laporan')}}" type="button" class="list-group-item list-group-item-action">Lihat Laporan</a>
                        <a href="{{route('create.view.pengaturanpassword', Auth::guard('dosen')->user()->id_dosen )}}" type="button" class="list-group-item list-group-item-action">Pengaturan Password</a>
                       
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Daftar Jadwal</button>
                        
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
                                <th scope="col">Hari</th>
                                <th scope="col">Kode Matakuliah</th>
                                <th scope="col">Matakuliah</th>
                                <th scope="col">sks</th>
                                <th scope="col">Ruangan</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Jurusan</th>                
                                <th scope="col">Jam</th>
                           
                            </thead>
                            <tbody>
                                @foreach ($jadwal as $j)
                                <tr>
                                    <td>{{ $j->id_jadwal }}</td>
                                    <td>{{ $j->hari }}</td>
                                    <td>{{ $j->kode_matkul }}</td>
                                    <td>{{ $j->nama_matkul }}</td>
                                    <td>{{ $j->sks }}</td>
                                    <td>{{ $j->nama_ruangan }}</td>
                                    <td>{{ $j->nama_kelas }}</td>
                                    <td>{{ $j->nama_jurusan }}</td>  
                                    <td>{{ $j->jam_mulai }} - {{ $j->jam_selesai }}</td>       
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