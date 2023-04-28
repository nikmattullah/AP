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
                        <h1 class="h3 mb-0 text-gray-800">Data Jadwal Sidang</h1>
                    </div>

                    <form action="/Jadwal Sidang" method="post">
                        @csrf
                        @method('get')
                    <div class="row">
                        <div class="input-group mb-3 col-md-3">
                            <input type="text" name="search" class="form-control" placeholder="Search nim" id="search" style="height: 30px;">
                            <button type="" class="btn btn-info btn-sm" style="height: 30px;"><i class='fas fa-search' style='font-size:15px; margin:auto;'></i></button>
                        </div>
                        <div class="col-md-3 mb-3">
                           <input type="date" name="date" class="form-control" style="height: 30px; width: auto;" onchange="this.form.submit()">
                        </div>
                    </div>
                    </form>
                    
                    <div class="col-md-9">
                    <table class="table">
                    <tr style="background-color: #009DA5;">
                        <th style="color: floralwhite; width:8mm;">NO</th>
                        <th style="color: floralwhite; width:auto;">Nim</th>
                        <th style="color: floralwhite; width:auto;">Nama</th>                
                        <th style="color: floralwhite; width:auto;">Tanggal</th>
                        <th style="color: floralwhite; width:auto;">Jam</th>
                        <th style="color: floralwhite; width:3cm; text-align: center;">Aksi</th>
                    </tr>

                    @if (session('pesan'))
                    <tr>
                        <td colspan="6">
                            <i><h6 style="color: red;">{{ session('pesan') }}</h6></i>
                        </td>
                    </tr>
                    @endif

                    @forelse($data as $Pagination => $a)
                    <tr>
                        <td>{{$Pagination + $data->firstItem()}}</td>
                        <td>{{$a->biodata_mahasiswa->nim}}</td>
                        <td>{{$a->biodata_mahasiswa->nama}}</td>
                        <td>
                            @if($a->tanggal == null)
                                <Label style="color:#00426D;"><b> On Progress </b></Label>
                            @else
                                {{$a->tanggal}}
                            @endif
                        </td>
                        <td>
                            @if($a->ruangan == null)
                                <Label style="color:#00426D;"><b> On Progress </b></Label>
                            @else
                                {{$a->ruangan}}
                            @endif
                        </td>
                        <td>
                            <!-- Button Modal detil-->
                            <div class="row">
                            <div class="col-md-4">
                            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#detil{{$a->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                            </button>
                            </div>

                            <!-- Modal detil-->
                            <div class="modal fade" id="detil{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pengajuan Judul</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <td><b>Nim :</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{$a->biodata_mahasiswa->nim}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Nama :</b></td>
                                        </tr>
                                        <tr>
                                            <td>{{$a->biodata_mahasiswa->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Penguji 1 :</b></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($a->penguji_1 == 0)
                                                    <Label style="color:#00426D;"><b> On Progress </b></Label>
                                                @else
                                                {{$a->penguji1->nama}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Penguji 2 :</b></td>                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($a->penguji_2 == 0)
                                                    <Label style="color:#00426D;"><b> On Progress </b></Label>
                                                @else
                                                {{$a->penguji2->nama}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Penguji 3 :</b></td>                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($a->penguji_3 == 0)
                                                    <Label style="color:#00426D;"><b> On Progress </b></Label>
                                                @else
                                                {{$a->penguji3->nama}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal:</b></td>                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($a->tanggal == null)
                                                    <Label style="color:#00426D;"><b> On Progress </b></Label>
                                                @else
                                                    {{$a->tanggal}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Jam :</b></td>                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($a->jam == null)
                                                    <Label style="color:#00426D;"><b> On Progress </b></Label>
                                                @else
                                                    {{$a->jam}}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Ruang :</b></td>                                            
                                        </tr>
                                        <tr>
                                            <td>
                                                @if($a->ruangan == null)
                                                    <Label style="color:#00426D;"><b> On Progress </b></Label>
                                                @else
                                                    {{$a->ruangan}}
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info btn-sm" data-bs-dismiss="modal">Oke</button>                                    
                                </div>
                                </div>
                            </div>
                            </div>

                            <!-- Button Edit Data -->
                            <div class="col-md-2">
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$a->id}}">
                                    <i class='far fa-edit'></i>
                                </button>
                            </div>
                            </div>
                        </td>
                    </tr>
                        <!-- Modal Edit data-->
                    <div class="modal fade" id="edit{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Jadwal Sidang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="/Jadwal Sidang/{{$a->id}}" method="post" >
                                @method('put')
                                @csrf
                                    <div class="container">
                                    <div class="row">
                                    <div class="col-md-6">
                                      
                                    <div class="row mb-3">
                                        <label for="">Nim Mahasiswa :</label>
                                        <input type="hidden" name="id_mahasiswa" class="form-control" aria-describedby="S" value="{{$a->biodata_mahasiswa->id}}" readonly="">
                                        <input type="text" name="" class="form-control" aria-describedby="S" value="{{$a->biodata_mahasiswa->nim}}" readonly="" style="width: 150px;">
                                    </div>

                                    <div class="row mb-3">
                                        <label for="">Nama Mahasiswa :</label>
                                    <input type="text" name="" class="form-control" aria-describedby="S" readonly="" value="{{$a->biodata_mahasiswa->nama}}">
                                    </div> 
                                    
                                    <div class="row mb-5">
                                        <label for="">Tahun Ajaran</label>
                                        <input type="text" name="" id="" value="{{$a->biodata_mahasiswa->tahun_ajaran->tahun_ajaran}}" class="form-control" readonly="">
                                        <!-- <select name="" id="" class="form-control" style="width: 150px;">
                                            <option value="" disabled selected>==Tahun Ajaran==</option>
                                        </select> -->
                                    </div> 
                                    </div>

                                     <div class="col-md-1"  align="center">
                                     <div style="border: 1px #009DA5 solid; height: 245px; width: 0px;"></div>
                                     </div>
                                   
                                     <div class="col-md-5">
                                        <div class="row mb-3">
                                            <label for="">Penguji 1 :</label>
                                            <select name="penguji_1" id="" class="form-control">
                                                <option value="" disabled selected>== Penguji 1 ==</option>
                                                @foreach($dosen as $dos)
                                                <option value="{{$dos->id}}">{{$dos->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="">Penguji 2 :</label>
                                            <select name="penguji_2" id="" class="form-control">
                                                <option value="" disabled selected>== Penguji 2 ==</option>
                                                @foreach($dosen as $dos)
                                                <option value="{{$dos->id}}">{{$dos->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row mb-5">
                                            <label for="">Penguji 3 :</label>
                                            <select name="penguji_3" id="" class="form-control">
                                                <option value="" disabled selected>== Penguji 3 ==</option>
                                                @foreach($dosen as $dos)
                                                <option value="{{$dos->id}}">{{$dos->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-3">
                                                <label for="" >Hari :</label>
                                                <input type="text" class="form-control" name="hari" value="" style="width: 120px;" readonly="">
                                            </div>
                                            
                                            <div class="row mb-3">
                                                <label for="">Taggal :</label>
                                                <input type="date" class="form-control" name="tanggal" value="" style="width: 170px;">
                                            </div>
                                        </div>

                                        <div class="col-md-1"  align="center">
                                            <div style="border: 1px #009DA5 solid; height: 160px; width: 0px;"></div>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="row mb-3">
                                                <label for="">Jam</label>
                                                <input type="time" name="jam" id="" class="form-control" style="width: 120px;">
                                            </div>

                                            <div class="row mb-3">
                                                <label for="">Ruang</label>
                                                <input type="text" name="ruang" id="" class="form-control" style="width: 170px;">
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
                        <td colspan="10">
                            <div class="container my-auto">
                                <div class="copyright text-left">
                                    <span style="color: red;"> <i>Data Sidang Belum Tersedia</i></span>
                                </div>
                            </div>
                        </td>
                    </tr>  
                    @endforelse
                    </table>
                    </div>
                    {{$data->links() }}
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