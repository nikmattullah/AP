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
                        <h1 class="h3 mb-0 text-gray-800">Data bimbingan</h1>

                        <!-- Button Tambah Data -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah
                        </button>

                        <!-- Modal Tambah data-->
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bimbingan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="/Bimbingan/store" method="post">
                                    @csrf
                                    <div class="container">
                                    <div class="row">
                                    
                                    <div class="col-md-5">
                                        <div class="row mb-3">
                                            <input type="date" class="form-control" name="tanggal" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <textarea name="materi_konsultasi" class="form-control" id="" rows="5" placeholder="Materi Konsultasi" required></textarea>
                                    </div>

                                    <div class="row mb-3">
                                        <textarea name="revisi" id="" rows="5" class="form-control"  placeholder="Revisi" required></textarea>
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
                    
                    <form action="/Bimbingan" method="post">
                        @csrf
                        @method('get')
                    <div class="row">
                        <div class="col-md-3 mb-3">
                           <input type="date" name="date" class="form-control" style="height: 30px; width: auto;" onchange="this.form.submit()">
                        </div>
                    </div>
                    </form>

                    <div class="col-md-12">
                    <table class="table">
                    <tr align="center" style="background-color: #009DA5;">
                        <th style="color: floralwhite; width:8mm;">NO</th>
                        <th style="color: floralwhite;width:4cm;">Tanggal</th>
                        <th style="color: floralwhite;width:auto;">Materi Konsultasi</th>
                        <th style="color: floralwhite;width:auto;">Revisi</th>
                        <th style="color: floralwhite;width:auto;">Aksi</th>
                    </tr>
                    
                    @if (session('pesan'))
                    <tr>
                        <td colspan="5">
                            <i><h6 style="color: red;">{{ session('pesan') }}</h6></i>
                        </td>
                    </tr>
                    @endif
                     
                @forelse($data as $Pagination => $d)
                    <tr style="text-align:justify">
                        <td>{{$Pagination + $data->firstItem()}}</td>
                        <td>{{$d->tanggal}}</td>
                        <td>{{$d->materi_konsultasi}}</td>
                        <td>{{$d->revisi}}</td>
                        <td>
                                  <!-- Button Edit Data -->
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$d->id}}">
                                <i class='far fa-edit'></i>
                                </button>
                                
                                <!-- Modal Edit data-->
                        <div class="modal fade" id="edit{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Bimbingan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="/Bimbingan/{{$d->id}}" method="post">
                                    @method('put')
                                    @csrf
                            <div class="container">
                                <div class="row">
                                    
                                    <div class="col-md-6">                                        
                                        <div class="row mb-3">
                                            <input type="date" class="form-control" name="tanggal" value="{{$d->tanggal}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <textarea name="materi_konsultasi" class="form-control" id="" rows="5" placeholder="Materi Konsultasi">{{$d->materi_konsultasi}}</textarea>
                                    </div>

                                    <div class="row mb-3">
                                        <textarea name="revisi" id="" rows="5" class="form-control"  placeholder="Revisi">{{$d->revisi}}</textarea>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-info">Simpan</button>
                               </form>
                            </div>
                        </td>                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="container my-auto">
                                <div class="copyright text-left">
                                    <span style="color: red;"> <i>Belum Ada Data Bimbingan</i></span>
                                </div>
                            </div>
                        </td>
                    </tr>                      
                @endforelse
                    </table>
                    </div>
                {{ $data->links() }}
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