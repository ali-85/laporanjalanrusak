<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#20B2AA">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('index') }}">
        <div class="sidebar-brand-text mx-3">Laporan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ (Request::segment(1) == 'dashboard') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Laporan
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ (Request::segment(1) == 'laporan') ? 'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-cog"></i>
          <span>Kelola</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.laporan') }}">Masuk</a>
            <a class="collapse-item" href="{{ route('admin.tolak') }}">Ditolak</a>
            <a class="collapse-item" href="{{ route('admin.proses') }}">Diproses</a>
            <a class="collapse-item" href="{{ route('admin.selesai') }}">Selesai</a>
            <a class="collapse-item" href="{{ route('admin.semua') }}">Semua</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Daerah
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ (Request::segment(1) == 'desa' || Request::segment(1) == 'kecamatan') ? 'active':'' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-clipboard"></i>
          <span>Kelola</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.desa') }}">Desa/Kelurahan</a>
            <a class="collapse-item" href="{{ route('admin.kcmtn') }}">Kecamatan</a>
          </div>
        </div>
      </li>

      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Daftar
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ (Request::segment(1) == 'pengguna') ? 'active':'' }}">
        <a class="nav-link" href="{{ route('admin.user') }}">
          <i class="fas fa-fw fa-users"></i>
          <span>Pengguna</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->