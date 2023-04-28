<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LP3I College Banda Aceh</title>
    <!-- bootstrap link for css-->
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

     <!-- Custom styles for this template-->
     <link href="{{asset('style/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<body>

<div id="app">
        <nav class="navbar navbar-expand navbar-light bg-blue topbar mb-4 static-top shadow">
            <div class="container">
                <div class="col-md-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{asset('style/img/LOGO COLLEGE BANDA ACEH (PUTIH).png')}}" width="180" height="55" alt="">
                </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="col-md-8">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <img src="{{asset('style/img/Asset 4.png')}}" width="" height="65" alt="">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <img src="{{asset('style/img/Asset 5.png')}}" width="" height="65" alt="">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <img src="{{asset('style/img/Asset 6.png')}}" width="" height="65" alt="">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <img src="{{asset('style/img/Asset 7.png')}}" width="" height="70" alt="">
                    </ul>
                </div>
                </div>
            </div>
        </nav>
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center">
                    <img src="{{asset('style/img/college.png')}}" width="60" height="65">
                    <br><br>
                    <h6>Biodata Dosen</h6>
                </div>

                <div class="card-body">
                    <form action="/Biodata Dosen/store" method="post">
                        @csrf                            
                        <div class="row mb-3">
                            <label for="kd_instruktur" class="col-md-4 col-form-label text-md-end">{{ __('Kode Instruktur') }}</label>
                            <div class="col-md-6">
                                <input type="hidden" name="users_id" class="form-control" aria-describedby="S" value="{{auth()->user()->id}}">
                                <input id="kd_instruktur" type="text" name="kd_instruktur" class="form-control @error('kd_instruktur') is-invalid @enderror" aria-describedby="S">

                                @error('kd_instruktur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                            <input id="nama" type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" aria-describedby="S">

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tempat_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                            <input id="tempat_lahir" type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" aria-describedby="S">

                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tgl_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir ') }}</label>

                            <div class="col-md-6">
                            <input id="tgl_lahir" type="date" name="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" aria-describedby="S">

                                @error('tgl_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-md-4 col-form-label text-md-end">{{ __('Alamat ') }}</label>

                            <div class="col-md-6">
                            <textarea name="alamat" id="alamat" rows="3" class="form-control @error('alamat') is-invalid @enderror"></textarea>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-end">{{ __('No HP ') }}</label>

                            <div class="col-md-6">
                            <input id="no_hp" type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" aria-describedby="S">

                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$email_dosen}}" required autocomplete="email" readonly>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin') }}</label>
                                    <div class="col-md-6">
                                      <input type="radio" id="lk" name="jenis_kelamin" value="Laki Laki">
                                      <label for="lk">Laki Laki</label><br>
                                      <input type="radio" id="pr" name="jenis_kelamin" value="Perempuan">
                                      <label for="pr">Perempuan</label><br>
                                      </div>
                                    </div> 

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-10">
                                <button type="submit" class="btn btn-info btn-sm">
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
    </div>                       

    <!-- bootstrap link for js-->
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>