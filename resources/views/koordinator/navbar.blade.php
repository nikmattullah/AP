<!-- Sidebar - Brand -->
<br>
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('/')}}">
    <div class="sidebar-brand-icon">
    <img src="{{asset('style/img/LOGO COLLEGE BANDA ACEH (PUTIH).png')}}" width="180" height="55" alt="">
    </div>
</a>
<br>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{asset('/')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

@if(auth()->user()->level=="admin")
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collage"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
            <span>College</span>
        </a>
        <div id="collage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{asset('/Tahun Ajaran')}}"><span>Data Tahun Ajaran</span></a>
            <a class="collapse-item" href="{{asset('/Bidang Minat')}}"><span>Data Bidang Minat</span></a>
            <a class="collapse-item" href="{{asset('/Jurusan')}}"><span>Data Jurusan</span></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dosen"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa fa-users"></i>
            <span>Dosen</span>
        </a>
        <div id="dosen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{asset('/Dosen')}}"><span>Register Dosen</span></a>
                <a class="collapse-item" href="{{asset('/Data Pembimbing')}}"><span>Data Pembimbing</span></a>
                <a class="collapse-item" href="/Data Bimbingan Koordinator"><span>Data Bimbingan</span></a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mahasiswa"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-male" aria-hidden="true"></i>
            <span>Mahasiswa</span>
        </a>
        <div id="mahasiswa" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{asset('/Usulan Judul')}}"><span>Data Usulan Judul</span></a>
            <a class="collapse-item" href="/Jadwal Sidang"><span>Data Jadwal Sidang</span></a>
            <a class="collapse-item" href="/Nilai Perbaikan"><span>Data Nilai Perbaikan</span></a>
            <a class="collapse-item" href="/Nilai"><span>Data Nilai</span></a>
            </div>
        </div>
    </li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
@elseif(auth()->user()->level=="dosen")
<!-- Nav Item - Data Bimbingan -->
<li class="nav-item">
    <a class="nav-link" href="/Biodata Dosen">
    <i class="fa fa-book" aria-hidden="true"></i>
        <span>Biodata Dosen</span></a>
</li>

<!-- Nav Item - Data Bimbingan -->
<li class="nav-item">
    <a class="nav-link" href="/Data Bimbingan">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Data Bimbingan</span></a>
</li>

<!-- Nav Item - Data Nilai Sidang -->
<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Nilai Sidang</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/Nilai Android">Nilai Android</a>
                <a class="collapse-item" href="/Nilai Website">Nilai Website</a>
                <a class="collapse-item" href="/Nilai Jaringan">Nilai Jaringan</a>
            </div>
        </div>
    </li>
<!-- Nav Item - Data Usulan Perbaikan -->
<li class="nav-item">
    <a class="nav-link" href="/Usulan Perbaikan">
    <i class="fa fa-book" aria-hidden="true"></i>
        <span>Data Usulan Perbaikan</span></a>
</li>

@elseif(auth()->user()->level=="mahasiswa")

<!-- Nav Item - Biodata Mahasiswa -->
<li class="nav-item">
    <a class="nav-link" href="{{asset('/Biodata Mahasiswa')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Biodata Mahasiswa</span></a>
</li>

<!-- Nav Item - Data Pengajuan Judul -->
<li class="nav-item">
    <a class="nav-link" href="{{asset('/Pengajuan Judul')}}">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Pengajuan Judul</span></a>
</li>

<!-- Nav Item - Bimbingan -->
<li class="nav-item">
    <a class="nav-link" href="{{asset('/Bimbingan')}}">
    <i class="fas fa-fw fa fa-users"></i>
        <span>Bimbingan</span></a>
</li>

<!-- Nav Item - upload file-->
<li class="nav-item">
    <a class="nav-link" href="{{asset('/Upload File')}}">
    <i class="fa fa-book" aria-hidden="true"></i>
        <span>Upload File</span></a>
</li>

<!-- Nav Item - Nilai Sidang -->
<li class="nav-item">
    <a class="nav-link" href="{{asset('/Nilai Sidang')}}">
    <i class="fa fa-calendar" aria-hidden="true"></i>
        <span>Nilai Sidang</span></a>
</li>
@endif
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Heading -->
    <!-- <div class="sidebar-heading">
        Interface
    </div> -->

<!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li> -->

<!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->

<!-- Heading -->
    <!-- <div class="sidebar-heading">
        Addons
    </div> -->

<!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li> -->

