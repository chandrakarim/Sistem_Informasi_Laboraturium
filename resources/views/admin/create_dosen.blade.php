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
                        <a href="{{ route('daftar.kelas') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.kelas')) ? 'active' : '' }}">Daftar Kelas</a>
                        <a href="{{ route('daftar.ruangan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.ruangan')) ? 'active' : '' }}">Daftar Ruangan</a>
                        <a href="{{ route('daftar.jurusan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.jurusan')) ? 'active' : '' }}">Daftar Jurusan</a>
                        <a href="{{ route('daftar.matakuliah') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.matakuliah')) ? 'active' : '' }}">Daftar Matakuliah</a>
                        
                        <a href="{{ route('create.view.kelas') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.kelas')) ? 'active' : '' }}">Buat Kelas Baru</a>                  
                        <a href="{{ route('create.view.ruangan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.ruangan')) ? 'active' : '' }}">Buat Ruangan Baru</a>
                        <a href="{{ route('create.view.jurusan') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.jurusan')) ? 'active' : '' }}">Buat Jurusan Baru</a>
                        <a href="{{ route('create.view.matakuliah') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.matakuliah')) ? 'active' : '' }}">Buat Matakuliah Baru</a>
                        <a href="{{ route('create.view.jadwal') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.jadwal')) ? 'active' : '' }}">Buat Jadwal Baru</a> 
                        <a href="{{ route('create.view.dosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'create.view.dosen') == 0) ? 'active' : '' }}">Buat Dosen Baru</a>
                        <a href="{{ route('daftar.mahasiswa') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.mahasiswa')) ? 'active' : '' }}">Kelola Data Mahasiswa</a>
                        <a href="{{ route('daftar.dosen') }}" type="button" class="list-group-item list-group-item-action {{ (strpos(Route::currentRouteName(), 'daftar.dosen')) ? 'active' : '' }}">Kelola Data Dosen</a>
                  </div>
                </div>
                
                <div class="col-md-9">
                  <div class="list-group">
                      <button type="button" class="list-group-item list-group-item-action active">Tambah Kelas</button>
                      <form method="POST" action="{{ route('create.postDosen') }}" enctype="multipart/form-data">
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
                            @if(session('errorMsg'))
                              <div class="alert alert-danger" role="alert">
                                  {{ session('errorMsg') }}
                              </div>
                            @endif
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama_dosen" type="text" class="form-control{{ $errors->has('nama_dosen') ? ' is-invalid' : '' }}" name="nama_dosen" value="{{ old('nama_dosen') }}" required autofocus>

                                @if ($errors->has('nama_dosen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_dosen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nip" class="col-md-4 col-form-label text-md-right">{{ __('NIP') }}</label>

                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}" name="nip" value="{{ old('nip') }}" required autofocus>

                                @if ($errors->has('nip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_telp" class="col-md-4 col-form-label text-md-right">{{ __('No Telpon') }}</label>

                            <div class="col-md-6">
                                <input id="no_telp" type="text" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" value="{{ old('no_telp') }}" required>

                                @if ($errors->has('no_telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jk" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <div class="col-md-6">
                                <select name="jk" id="jk" class="form-control">
                                <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <button type="submit" class="btn btn-danger">Batal</button>
                        </div>
                        </div>

                      </form>
                  </div>
              </div>

            </div>
        </section>
    </div>
@endsection