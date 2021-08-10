<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#D3D3D3">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{ route('index') }}"><i class="fas fa-fw fa-home"></i> Beranda</a>
      @if(Auth()->check())
      <a class="nav-item nav-link" href="{{ route('list.laporan') }}"><i class="fas fa-fw fa-list-alt"></i> Laporan Saya</a>
      <a class="nav-item nav-link" href="{{ route('logout') }}"><i class="fas fa-fw fa-sign-out-alt"></i> Keluar</a>
      @else
      <a class="nav-item nav-link" href="{{ route('login') }}"><i class="fas fa-fw fa-lock"></i> Masuk</a>
      @endif
    </div>
  </div>
</nav>