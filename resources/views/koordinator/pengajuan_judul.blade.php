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
                        <h1 class="h3 mb-0 text-gray-800">Data Pengajuan Judul</h1>
                        
                        <!-- Tambah data -->

                        <!-- Button Tambah Data -->
                        @if($data1 == 3)
                        @else
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">
                                Tambah
                            </button>
                        @endif
                        
                        <!-- Modal Tambah data-->
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengajuan Judul</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/Pengajuan Judul/store" method="post">
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="row mb-3">
                                                <select name="bidang_minats_id" id=""  class="form-control" style="width: 260px;">
                                                    <option hidden selected>== Bidang Minat ==</option>
                                                        @foreach($minat as $m)
                                                            <option value="{{$m->id}}">{{$m->nm_minat}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-3">
                                                <textarea name="judul" id="" rows="3" placeholder="Judul" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-3">
                                                <textarea name="deskripsi" id="" rows="8" placeholder="Deskripsi Singkat" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-3">
                                                <textarea name="masalah" id="" rows="8"  placeholder="Latar Blakang Masalah" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-2">
                                                <textarea name="solusi" id="" rows="8" placeholder="Solusi Yang Ditawarkan" class="form-control"></textarea>
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

                    <div class="col-md-12">
                    <table class="table">
                    <tr align="center" style="background-color: #009DA5;"    >
                        <th style="color: floralwhite; width:8mm;">NO</th>
                        <th style="color: floralwhite; width:auto;">Bidang Minat</th>
                        <th style="color: floralwhite; width:auto;">Judul</th>
                        <th style="color: floralwhite; width:auto;">Status</th>
                        <th style="color: floralwhite; width:3cm;">Aksi</th>
                    </tr>

                  @forelse($data as $d)
                    <tr align="center">
                        <td>{{$no++}}</td>
                        <td>{{$d->bidang_minat->nm_minat}}</td>
                        <td>{{$d->judul}}</td>
                        <td>
                        @if($d->status == 0)
                                <Label style="color:#00426D;"><b> On Progress </b></Label>
                            @elseif($d->status == 1)
                                <Label style="color:#009DA5;"><b> Diterima </b></Label>
                            @else
                                <Label style="color:#F15B67;"><b> Ditolak </b></Label>
                            @endif
                        </td>
                        <td>
                            <div class="row">
                                <!-- Button Modal detil-->
                            <div class="col-md-4">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detail{{$d->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </button>
                            </div>
                            
                                <!-- Button Edit Data -->
                            @if($d->status == 0)
                            <div class="col-md-3">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$d->id}}">
                                <i class='far fa-edit'></i>
                            </button>
                            </div>
                            @else

                            @endif 
                            </div>
                            <!-- Modal Detail -->
                            <div class="modal fade" id="detail{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Judul</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <td><b>Bidang Minat :</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{$d->bidang_minat->nm_minat}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Judul :</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{$d->judul}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Deskripsi :</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{$d->deskripsi}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Latar Belakang Masalah :</b></td>                                            
                                        </tr>
                                        <tr>
                                            <td>{{$d->masalah}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Solusi :</b></td>                                            
                                        </tr>
                                        <tr>
                                            <td>{{$d->solusi}}</td>
                                        </tr>
                                    </table>
                                    </div>
                                    </div>
                                </div>
                                </div> 
                        </td>
                    </tr>
                                <!-- Modal Edit data-->
                                <div class="modal fade" id="edit{{$d->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Judul</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="/Pengajuan Judul/{{$d->id}}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="container">
                                        <div class="row">
                                            <div class="row mb-3">
                                                <select name="bidang_minats_id" id=""  class="form-control" style="width: 260px;">
                                                    <option value="{{$d->bidang_minat->id}}" hidden>{{$d->bidang_minat->nm_minat}}</option>
                                                        @foreach($minat as $m)
                                                            <option value="{{$m->id}}">{{$m->nm_minat}}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-3">
                                                <textarea name="judul" id="" rows="3" class="form-control">{{$d->judul}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-3">
                                                <textarea name="deskripsi" id="" rows="8" placeholder="Deskripsi Singkat" class="form-control">{{$d->deskripsi}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-3">
                                                <textarea name="masalah" id="" rows="8"  placeholder="Latar Blakang Masalah" class="form-control">{{$d->masalah}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row mb-2">
                                                <textarea name="solusi" id="" rows="8" placeholder="Solusi Yang Ditawarkan" class="form-control">{{$d->solusi}}</textarea>
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
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="container my-auto">
                                        <div class="copyright text-left">
                                            <span style="color: red;"> <i>Belum Ada Judul yang Diajukan</i></span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </table>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-left my-auto">
                        <span style="color: red;">{{$data1}} Dari 3 Maksimal Judul yang Diajukan</span>
                    </div>
                </div>
            </footer>
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