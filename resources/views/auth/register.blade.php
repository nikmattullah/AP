@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">
                    <img src="{{asset('style/img/college.png')}}" width="60" height="65">
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <input type="hidden" name="level" id="" value="mahasiswa">    
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>                  
                </div>
            </div><br>
                        <div class="card">
                            <div class="card-body">
                                    <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nim') }}</label>
                                    <div class="col-md-6">
                                    <input type="number" name="nim" class="form-control @error('nim') is-invalid @enderror" aria-describedby="S" value="{{ old('nim') }}">
                                    @error('nim')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tempat Lahir') }}</label>
                                    <div class="col-md-6">
                                    <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" aria-describedby="S" value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir') }}</label>
                                    <div class="col-md-6">
                                    <input type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" aria-describedby="S" value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Alamat') }}</label>
                                    <div class="col-md-6">
                                        <textarea name="alamat" id=""  rows="3" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('NO HP') }}</label>
                                    <div class="col-md-6">
                                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" aria-describedby="S" value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>
                                    <div class="col-md-6">
                                      <div align="left">
                                      <input type="radio" id="lk" name="jenis_kelamin" value="Laki Laki" >
                                      <label for="lk">Laki Laki</label><br>
                                      <input type="radio" id="pr" name="jenis_kelamin" value="Perempuan">
                                      <label for="pr">Perempuan</label><br>
                                      </div>
                                    </div>
                                    </div>

                                    <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Kelas') }}</label>
                                    <div class="col-md-6">
                                    <input type="number" name="kelas" class="form-control @error('kelas') is-invalid @enderror" aria-describedby="S" value="{{ old('kelas') }}">
                                    @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                    </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn btn-info btn-sm">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                            </div>
                        </div>                
                            </form>
        </div>
    </div>
</div>
@endsection
