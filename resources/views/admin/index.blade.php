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
                        <a href="{{ route('daftar.kelas') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.kelas') == 0) ? 'active' : '' }}">Daftar Kelas</a>
                        <a href="{{ route('daftar.ruangan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.ruangan')) ? 'active' : '' }}">Daftar Ruangan</a>
                        <a href="{{ route('daftar.jurusan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.jurusan')) ? 'active' : '' }}">Daftar Jurusan</a>
                        <a href="{{ route('daftar.matakuliah') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.matakuliah')) ? 'active' : '' }}">Daftar Matakuliah</a>
                       
                        <a href="{{ route('create.view.kelas') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.kelas')) ? 'active' : '' }}">Buat Kelas Baru</a>                  
                        <a href="{{ route('create.view.ruangan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.ruangan')) ? 'active' : '' }}">Buat Ruangan Baru</a>
                        <a href="{{ route('create.view.jurusan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.jurusan')) ? 'active' : '' }}">Buat Jurusan Baru</a>
                        <a href="{{ route('create.view.matakuliah') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.matakuliah')) ? 'active' : '' }}">Buat Matakuliah Baru</a>
                        <a href="{{ route('create.view.jadwal') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.jadwal')) ? 'active' : '' }}">Buat Jadwal Baru</a> 
                        <a href="{{ route('create.view.dosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.dosen')) ? 'active' : '' }}">Buat Dosen Baru</a>
                        <a href="{{ route('daftar.mahasiswa') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.mahasiswa')) ? 'active' : '' }}">Kelola Data Mahasiswa</a>
                        <a href="{{ route('daftar.dosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.dosen')) ? 'active' : '' }}">Kelola Data Dosen</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">Daftar Kelas</button>
                        
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
                                <th scope="col">Nama Kelas</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $k)
                                <tr>
                                    <td>{{ $k->id_kelas }}</td>
                                    <td>{{ $k->nama_kelas }}</td>
                                    <td>
                                        <a href="{{ route('edit.view.kelas', $k->id_kelas) }}" class="btn btn-primary" type="button">Edit</a>
                                        <a href="{{ route('delete.kelas', $k->id_kelas) }}" class="btn btn-danger" type="button">Delete</a>
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