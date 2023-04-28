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
                        <h1 class="h3 mb-0 text-gray-800">Data Nilai Website</h1>
                        <!-- Tambah data -->

                        <!-- Button Tambah Data -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">
                        Tambah
                        </button>

                        <!-- Modal Tambah data-->
                        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Penilaian Website</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="/Nilai Website/store" method="post" >
                                    @csrf
                                    <div class="container">
                                    <div class="row">
                                    <div class="col-md-7">   
                                    <div class="row mb-3">
                                        <label for="">Nim Mahasiswa :</label>
                                        <select name="biodata_mahasiswas_id" id="select" class="form-control" width="10">
                                            <option value="">==Nim Mahasiswa==</option>
                                            @foreach($data as $d)
                                            <option value="{{$d->biodata_mahasiswa->nama}}">{{$d->biodata_mahasiswa->nim}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="">Nama Mahasiswa :</label>
                                    <input type="text" name="nama" id="nama" class="form-control" aria-describedby="S" value="" readonly="">
                                    </div>

                                    <div class="row mb-3">
                                        <label for="">Penulisan :</label>
                                        <input type="number" class="form-control" name="penulisan" >
                                    </div>
                                        
                                    <div class="row mb-3">
                                            <label for="">Penguasaan Project :</label>
                                            <input type="number" class="form-control" name="penguasaan_project" >
                                    </div>  
                                    </div>

                                     <div class="col-md-1"  align="center">
                                     <div style="border: 1px #009DA5 solid; height: 330px; width: 0px;"></div>
                                     </div>
                                   
                                     <div class="col-md-4">                                       
                                        <div class="row mb-3">
                                            <label for="">Konten :</label>
                                        <input type="number" class="form-control" name="konten" >
                                        </div>
                                        <div class="row mb-3">
                                            <label for="">Hosting :</label>
                                            <input type="number" class="form-control" name="hosting" >
                                        </div> 
                                        <div class="row mb-3">
                                            <label for="">Template :</label>
                                        <input type="number" class="form-control" name="template" >
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

                    <form action="/Nilai Website" method="post">
                        @csrf
                        @method('get')
                    <div class="row">
                        <div class="input-group mb-3 col-md-3">
                            <input type="text" name="search" class="form-control" placeholder="Search nim" id="search" style="height: 30px;">
                            <button type="" class="btn btn-info btn-sm" style="height: 30px;"><i class='fas fa-search' style='font-size:15px; margin:auto;'></i></button>
                        </div>
                    </div>
                    </form>

                    <div class="col-md-12">
                    <table class="table">
                    <tr style="background-color: #009DA5;">
                        <th style="color: floralwhite; width:8mm;">NO</th>
                        <th style="color: floralwhite; width:auto;">Nim</th>
                        <th style="color: floralwhite; width:auto;">Nama</th>
                        <th style="color: floralwhite; width:auto; text-align: center;">Penulisan</th>
                        <th style="color: floralwhite; width:auto; text-align: center;">Template</th>
                        <th style="color: floralwhite; width:auto; text-align: center;">Konten</th>
                        <th style="color: floralwhite; width:auto; text-align: center;">Hosting</th>
                        <th style="color: floralwhite; width:auto; text-align: center;">Penguasaan Project</th>
                        <th style="color: floralwhite; width:3cm; text-align: center;">Aksi</th>
                    </tr>

                    @if (session('pesan'))
                    <tr>
                        <td colspan="9">
                            <i><h6 style="color: red;">{{ session('pesan') }}</h6></i>
                        </td>
                    </tr>
                    @endif

                    @forelse($website as $Pagination => $a)
                    <tr>
                        <td>{{$Pagination + $website->firstItem()}}</td>
                        <td>{{$a->biodata_mahasiswa->nim}}</td>
                        <td>{{$a->biodata_mahasiswa->nama}}</td>
                        <td style="text-align: center;">{{$a->penulisan}}</td>
                        <td style="text-align: center;">{{$a->template}}</td>
                        <td style="text-align: center;">{{$a->konten}}</td>
                        <td style="text-align: center;">{{$a->hosting}}</td>
                        <td style="text-align: center;">{{$a->penguasaan_project}}</td>
                        <td>
                        <form action="/Nilai Website/{{$a->id}}" method="post">
                                <!-- Button Edit Data -->
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$a->id}}">
                                <i class='far fa-edit'></i>
                                </button>
                                |
                                <!-- Button Hapus Data -->
                                @csrf
                                @method('delete')
                                                        
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus{{$a->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                    </svg>
                                    </button>

                                    <!-- Modal hapus -->
                                    <div class="modal fade" id="hapus{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Yakin Nilai Mahasiswa a.n '{{$a->biodata_mahasiswa->nama}}' Ingin Dihapus?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-info">Yakin</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                            </form>
                        </td>
                    </tr>
                        <!-- Modal Edit data-->
                    <div class="modal fade" id="edit{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Edit Penilaian Website</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="/Nilai Website/{{$a->id}}" method="post" >
                                @method('put')
                                @csrf
                                    <div class="container">
                                    <div class="row">
                                    <div class="col-md-7">   
                                    <div class="row mb-3">
                                        <label for="">Nim Mahasiswa :</label>
                                        <input type="hidden" name="biodata_mahasiswas_id" class="form-control" aria-describedby="S" value="{{$a->biodata_mahasiswa->id}}" readonly="">
                                        <input type="text" name="" class="form-control" aria-describedby="S" value="{{$a->biodata_mahasiswa->nim}}" readonly="">
                                    </div>

                                    <div class="row mb-3">
                                        <label for="">Nama Mahasiswa :</label>
                                    <input type="text" name="" class="form-control" aria-describedby="S" readonly="" value="{{$a->biodata_mahasiswa->nama}}">
                                    </div>

                                    <div class="row mb-3">
                                        <label for="">Penulisan :</label>
                                        <input type="number" class="form-control" name="penulisan" value="{{$a->penulisan}}">
                                    </div>
                                    <div class="row mb-3">
                                            <label for="">Penguasaan Project :</label>
                                            <input type="number" class="form-control" name="penguasaan_project" value="{{$a->penguasaan_project}}">
                                    </div>                                        
                                    </div>

                                     <div class="col-md-1"  align="center">
                                     <div style="border: 1px #009DA5 solid; height: 330px; width: 0px;"></div>
                                     </div>
                                   
                                     <div class="col-md-4">
                                        
                                        <div class="row mb-3">
                                            <label for="">konten :</label>
                                        <input type="number" class="form-control" name="konten" value="{{$a->konten}}">
                                        </div>
                                        <div class="row mb-3">
                                            <label for="">Hosting :</label>
                                            <input type="number" class="form-control" name="hosting" value="{{$a->hosting}}">
                                        </div>                   
                                        <div class="row mb-3">
                                            <label for="">Template :</label>
                                        <input type="number" class="form-control" name="template" value="{{$a->template}}">
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
                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="container my-auto">
                                    <div class="copyright text-left">
                                        <span style="color: red;"> <i>Belum Ada Data Nilai Website yang Ditambah</i></span>
                                    </div>
                                </div>
                            </td>
                        </tr>     
                    @endforelse
                    </table>
                    </div>
                    {{$website->links()}}
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

    <script>
        console.log($('#select').val());
        $('#select').change(function(){
            document.getElementById("nama").value = $(this).find(':selected').val();
        });
    </script>
    
</body>

</html>