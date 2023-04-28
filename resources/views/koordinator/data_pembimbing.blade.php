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
                        <h1 class="h3 mb-0 text-gray-800">Data Pembimbing</h1>                 
                    </div>

                    <form action="/Data Pembimbing" method="post">
                        @csrf
                        @method('get')
                    <div class="row">
                        <div class="input-group mb-3 col-md-3">
                            <input type="text" name="search" class="form-control" placeholder="Search nim" id="search" style="height: 30px;">
                            <button type="" class="btn btn-info btn-sm" style="height: 30px;"><i class='fas fa-search' style='font-size:15px; margin:auto;'></i></button>
                        </div>

                        <div class="col-md-3">
                            <select name="select" id="" class="form-control" style="height:31px;font-size:12px;width:auto; text-align:center;" onchange="this.form.submit()">
                                <option disabled selected >==Bidang Minat==</option>
                                @foreach($bidang_minat as $b)
                                    <option value="{{$b->id}}">{{$b->nm_minat}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    </form>

                    <div class="col-md-9">
                    <table class="table">
                    <tr align="" style="background-color: #009DA5;">
                        <th style="color: floralwhite; width:8mm;">NO</th>
                        <th style="color: floralwhite; width:auto">Nim</th>
                        <th style="color: floralwhite; width:auto">Nama</th>
                        <th style="color: floralwhite; width:auto">Bidang Minat</th>
                        <th style="color: floralwhite; width:auto">Pembimbing</th>
                        <th style="color: floralwhite; width:auto"></th>
                    </tr>
                    
                    @if (session('pesan'))
                    <tr>
                        <td colspan="7">
                            <i><h6 style="color: red;">{{ session('pesan') }}</h6></i>
                        </td>
                    </tr>
                    @endif

                        @forelse($data as $Pagination => $d)
                    <tr>                        
                        <td>{{$Pagination + $data->firstItem()}}</td>
                        <td>{{$d->biodata_mahasiswa->nim}}</td>
                        <td>{{$d->biodata_mahasiswa->nama}}</td>
                        <td>{{$d->bidang_minat->nm_minat}}</td>
                        <td>@if($d->biodata_dosens_id == 0)
                                <Label style="color:#00426D;"><b> On Progress </b></Label>
                            @else
                            <Label><b> {{$d->biodata_dosen->nama}} </b></Label>
                            @endif</td> 
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$d->id}}">
                                <i class='far fa-edit'></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop{{$d->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Tentukan Pembimbing</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/Data Pembimbing/{{$d->id}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <select name="dosen" id="" class="form-control">
                                                <option value="" hidden disabled selected>== Pembimbing ==</option>
                                                @foreach($dosen as $dos)
                                                    <option value="{{$dos->id}}">{{$dos->nama}}</option>
                                                @endforeach
                                            </select>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-info btn-sm">Simpan</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </td>                   
                    </tr>  
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="container my-auto">
                                <div class="copyright text-left">
                                    <span style="color: red;"> <i>Data Pembimbing Belum Ada</i></span>
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