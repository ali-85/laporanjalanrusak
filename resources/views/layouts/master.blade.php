<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
   <link rel="stylesheet" href="{{ URL::to('/css/sb-admin-2.css') }}">
   <link rel="stylesheet" href="{{ URL::to('/css/sb-admin-2.min.css') }}">
   @yield('style')
</head>

<body>
    <nav class="navbar navbar-dark" style="background-color:#20B2AA;">
    <div class="row"><img src="{{ URL::to('/img/logo.png') }}" alt="" width="50" height="68" class="d-inline-block mx-3 my-auto">
      <span class="navbar-text text-white"><p class="text-white h5">SIP Pekerja DPUPR</p> <p class="text-white h6">Bidang Bina Marga</p> Kab. Ciamis</span>
    </div>
    </nav>
    @include('partials.navbar')
    @yield('content')
    <script src="{{ URL::to('/js/jquery.min.js') }}"></script>
    <script src="{{ URL::to('/js/app.js') }}"></script>
    <script src="{{ URL::to('/js/sb-admin-2.js') }}"></script>
    <script src="{{ URL::to('/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ URL::to('/js/all.min.js') }}"></script>
    @yield('script')
</body>

</html>