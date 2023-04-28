<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LP3I College Banda Aceh</title>

    <!-- bootstrap link for css-->
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="{{asset('style/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('style/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- navbar -->
            @include('koordinator/navbar')
            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            
            <!-- header -->
            @include('koordinator/header')

            <!-- konten -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Biodata Mahasiswa</h1>
                        
                        <!-- edit data -->
                        <!-- Button Edit Data -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit">
                        <i class='far fa-edit'></i>
                        </button> 
                                                       
                                <!-- Modal Edit data-->
                                <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Ajaran</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                <form action="/Biodata Mahasiswa/{{$data->id}}" method="post">
                                            @method('put')
                                            @csrf
                                            <div class="container">
                                    <div class="row">
                                     <div class="col-md-7">   
                                    <div class="row mb-3">
                                    <input type="text" name="nim" class="form-control" aria-describedby="S" placeholder="Nim" value="{{$data->nim}}">
                                    </div>

                                    <div class="row mb-3">
                                    <input type="text" name="nama" class="form-control" aria-describedby="S" placeholder="Nama" value="{{$data->nama}}">
                                    </div>

                                    <div class="row mb-3">
                                    <input type="text" name="tempat_lahir" class="form-control" aria-describedby="S" placeholder="Tempat Lahir" value="{{$data->tempat_lahir}}">
                                    </div>

                                    <div class="row mb-3">
                                    <input type="date" name="tgl_lahir" class="form-control" aria-describedby="S" placeholder="Tanggal Lahir" value="{{$data->tgl_lahir}}">
                                    </div>

                                    <div class="row mb-3">
                                        <textarea name="alamat" id=""  rows="3"  placeholder="Alamat" class="form-control">{{$data->alamat}}</textarea>
                                    </div>

                                    <div class="row mb-3">
                                    <input type="text" name="email" class="form-control" aria-describedby="S" placeholder="Email" value="{{auth()->user()->email}}" readonly>
                                    </div>                                   
                                    
                                    </div>

                                     <div class="col-md-1"  align="center">
                                     <div style="border: 1px #009DA5 solid; height: 350px; width: 0px;"></div>
                                     </div>

                                    <div class="col-md-4">                                     
                                    <div class="row mb-3">
                                    <input type="number" name="no_hp" class="form-control" aria-describedby="S" placeholder="NO HP" value="{{$data->no_hp}}">
                                    </div>

                                    <div class="row mb-3">
                                    <p>Jenis Kelamin:</p>
                                      <div align="left">
                                      <input type="radio" id="lk" name="jenis_kelamin" value="Laki Laki">
                                      <label for="lk">Laki Laki</label><br>
                                      <input type="radio" id="pr" name="jenis_kelamin" value="Perempuan">
                                      <label for="pr">Perempuan</label><br>
                                      </div>
                                    </div>

                                    <div class="row mb-3">
                                    <input type="text" name="kelas" class="form-control" aria-describedby="S" placeholder="Kelas" value="{{$data->kelas}}">
                                    </div>

                                    </div>
                                    </div>
                                </div>
                            </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-info">Simpan</button>
                                    </form>
                                    </div>
                                    </div>
                                </div>
                                </div>



                                

                    </div>

                    <div class="col-md-6">
                    <table class="table table-hover">
                    <tr>
                        <td style="color: #999999;">Nim</td>
                        <td style="color: #999999;">{{$data->nim}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Nama</td>
                        <td style="color: #999999;">{{$data->nama}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Tempat Lahir</td>
                        <td style="color: #999999;">{{$data->tempat_lahir}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Tanggal Lahir</td>
                        <td style="color: #999999;">{{$data->tgl_lahir}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Alamat</td>
                        <td style="color: #999999;">{{$data->alamat}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Nomor Handphone</td>
                        <td style="color: #999999;">{{$data->no_hp}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Email</td>
                        <td style="color: #999999;">{{$data->email}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Jenis Kelamin</td>
                        <td style="color: #999999;">{{$data->jenis_kelamin}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Kelas</td>
                        <td style="color: #999999;">{{$data->kelas}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Jurusan</td>
                        <td style="color: #999999;">{{$data->jurusan->nm_jurusan}}</td>                    
                    </tr>
                    <tr>
                        <td style="color: #999999;">Tahun Ajaran</td>
                        <td style="color: #999999;">{{$data->tahun_ajaran->tahun_ajaran}}</td>                    
                    </tr>
                    </table>

                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

           <!-- Footer -->
           @include('koordinator/footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('style/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('style/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('style/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('style/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('style/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('style/js/demo/chart-pie-demo.js')}} "></script>

    <!-- bootstrap link for js-->
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>