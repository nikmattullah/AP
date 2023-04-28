<!--Dashboad Admin-->
@if(auth()->user()->level == "admin")
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LP3I College Banda Aceh</title>

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
            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                        <iframe src="https://free.timeanddate.com/clock/i8mvopje/n2530/fs16/fc009da5/ftbi/tt0/tw0/tm1/th1/ta1" frameborder="0" width="223" height="20" style="float: right;"></iframe>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" >
                                                <a href="/Dosen"style="color:#009DA5;">Total Dosen</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$dosen}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa fa-users text-gray-300" style="font-size: 30px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" >
                                                <a href="/Usulan Judul" style="color:#009DA5;"> Total Usulan Judul</a></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$usulan}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" >    
                                                <a href="/Usulan Judul Diterima" style="color:#009DA5;">  Total Judul Diterima</a>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$terima}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-tasks text-gray-300" aria-hidden="true" style="font-size: 30px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" >
                                                <a href="/Usulan Judul Ditolak" style="color:#009DA5;"> Total Judul Ditolak</a>   
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$tolak}}</div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa fa-window-close text-gray-300" aria-hidden="true" style="font-size: 30px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:#009DA5; font-size:20pt;">Apa Itu Tribe Technology ?</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <p style="text-align: justify;"> 
                                        Tribe adalah pengelompokkan individu berdasarkan minat, bakat, sifat dan program studi di LP3I 
                                        yang bisa menunjang masa depan karir kamu karena pemilihan bidang studi yang tepat untuk 
                                        didalami dan dijalankan nanti ketika bekerja.
                                    </p>
                                    <p style="text-align: justify;">
                                        Tribe Technology adalah untuk kamu yang memiliki bakat dan antusiasme terhadap perkembangan teknologi baik software maupun hardware.
                                        Biasanya, individu yang tergabung kedalam Tribe ini sangat tertarik dengan coding dan dunia startup.
                                    </p>
                                    <p style="text-align: justify;">
                                        Output akhir yang diharapkan peserta didik akan mendapatkan skill dalam menjalankan sistem informasi, pengelolaan administrasi jaringan, 
                                        merancang program, aplikasi dan website dalam berbagai medium, serta memahami konsep dalam membuat laporan 
                                        serta aplikasi pengolahan media presentasi dalam bentuk angka dan dapat dipadukan dalam bentuk VBA (Visual Basic for Application).
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Body -->
                                <div class="card-body" style="background-color: #009DA5; height:6cm;">
                                        <img src="{{asset('style/img/Asset 6.png')}}" alt="" style="width: 30%; margin-top:8mm; margin-left:2.9cm">
                                </div>

                                 <!-- Card Header - Dropdown -->
                                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:#009DA5;">Tribe Technology</h6>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('koordinator/footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

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

</body>

</html>

<!--Dashboad Dosen -->
@elseif(auth()->user()->level == "dosen")
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LP3I College Banda Aceh</title>

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
            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row mb-4">
                        <div class="col-md-12">
                        <iframe src="https://free.timeanddate.com/clock/i8mvopje/n2530/fs16/fc009da5/ftbi/tt0/tw0/tm1/th1/ta1" frameborder="0" width="223" height="20" style="float: right;"></iframe>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:#009DA5; font-size:20pt;">Apa Itu Tribe Technology ?</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <p style="text-align: justify;"> 
                                        Tribe adalah pengelompokkan individu berdasarkan minat, bakat, sifat dan program studi di LP3I 
                                        yang bisa menunjang masa depan karir kamu karena pemilihan bidang studi yang tepat untuk 
                                        didalami dan dijalankan nanti ketika bekerja.
                                    </p>
                                    <p style="text-align: justify;">
                                        Tribe Technology adalah untuk kamu yang memiliki bakat dan antusiasme terhadap perkembangan teknologi baik software maupun hardware.
                                        Biasanya, individu yang tergabung kedalam Tribe ini sangat tertarik dengan coding dan dunia startup.
                                    </p>
                                    <p style="text-align: justify;">
                                        Output akhir yang diharapkan peserta didik akan mendapatkan skill dalam menjalankan sistem informasi, pengelolaan administrasi jaringan, 
                                        merancang program, aplikasi dan website dalam berbagai medium, serta memahami konsep dalam membuat laporan 
                                        serta aplikasi pengolahan media presentasi dalam bentuk angka dan dapat dipadukan dalam bentuk VBA (Visual Basic for Application).
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Body -->
                                <div class="card-body" style="background-color: #009DA5; height:6cm;">
                                        <img src="{{asset('style/img/Asset 6.png')}}" alt="" style="width: 30%; margin-top:8mm; margin-left:2.9cm">
                                </div>

                                 <!-- Card Header - Dropdown -->
                                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold" style="color:#009DA5;">Tribe Technology</h6>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('koordinator/footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

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

</body>

</html>
<!--Dashboad Mahasiswa-->
@elseif(auth()->user()->level == "mahasiswa")
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LP3I College Banda Aceh</title>

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
            
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-5">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#009DA5;">
                                                Dosen Pembimbing</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">                                                
                                                {{$dosen_pembimbing}}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-fw fa fa-users" style="font-size: 30px;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-5">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#009DA5;">
                                                Jadwal Sidang</div>
                                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                <div class="row">
                                                    <div class="col mb-1">{{$tgl}}</div><div style="border: 1px #009DA5 solid; height: 25px; width: 0px;"></div> <div class="col mb-1">{{$waktu}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class='far fa-clock' style='font-size:30px'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-5">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1" style="color:#009DA5;">Ruang Sidang
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">                                                    
                                                    <div class="h6 mb-0 font-weight-bold text-gray-800">
                                                        {{$ruangan}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class='fas fa-school' style='font-size:30px'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Judul Diterima</h6>
                                </div>
                                <div class="card-body">
                                    {{$judul}}
                                </div>
                            </div>
                            
                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Deskripsi</h6>
                                </div>
                                <div class="card-body">
                                    {{$deskripsi}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Masalah</h6>
                                </div>
                                <div class="card-body">
                                    {{$masalah}}
                                </div>
                            </div>
                            
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Solusi</h6>
                                </div>
                                <div class="card-body">
                                    {{$solusi}}
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('koordinator/footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    

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

</body>

</html>
@endif