@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session()->has('success'))
                    <div class="alert alert-success">
                        <span>{{ session()->get('success') }}</span>
                    </div>
                @endif
            <div class="card">
                <div class="card-header">{{ __('Register Mahasiswa') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('create.postMahasiswa') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="nama_mhs" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="nama_mhs" type="text" class="form-control{{ $errors->has('nama_mhs') ? ' is-invalid' : '' }}" name="nama_mhs" value="{{ old('nama_mhs') }}" required autofocus>

                                @if ($errors->has('nama_mhs'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_mhs') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nim_mhs" class="col-md-4 col-form-label text-md-right">{{ __('Nim Mahasiswa') }}</label>

                            <div class="col-md-6">
                                <input id="nim_mhs" type="text" class="form-control{{ $errors->has('nim_mhs') ? ' is-invalid' : '' }}" name="nim_mhs" value="{{ old('nim_mhs') }}" required autofocus>

                                @if ($errors->has('nim_mhs'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nim_mhs') }}</strong>
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
                            <label for="jurusan_id" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan') }}</label>
                            <div class="col-md-6">
                            <select name="jurusan_id" id="jurusan_id" class="form-control">
                              <option selected disabled>Pilih Jurusan</option>
                            @foreach ($jurusans as $jurusan)
                             <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                             @endforeach
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="kelas_id" class="col-md-4 col-form-label text-md-right">{{ __('Kelas') }}</label>
                            <div class="col-md-6">
                            <select name="kelas_id" id="kelas_id" class="form-control">
                              <option selected disabled>Pilih Kelas</option>
                                     @foreach ($kelas as $k)
                                <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                              @endforeach
                              </select>
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
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection