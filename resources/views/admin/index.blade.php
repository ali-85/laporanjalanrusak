@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('content')
  <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))
            <div class="col-xl-12">
                <div class="alert alert-success alert-block mt-5">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @endif
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <!-- Card -->
            <div class="card">
                <!-- Card content -->
                <div class="card-body" style="width:13rem">
                <!-- Title -->
                <h4 class="card-title"><a>Count <i class="fas fa-users prefix-white"></i></a></h4>
                <!-- Text -->
                <p class="card-text"><h2 class="h2">{{ $user }} Users</h2>
                    <small class="text-success">{{ $user }} Verifikasi</small><br>
                    <small class="text-warning">0 Belum Verifikasi</small><br>
                    <small class="text-danger">0 Diblokir</small><br>
                </p>
                </div>
            </div>
            <div class="card">
                <!-- Card content -->
                <div class="card-body" style="width:13rem">
                <!-- Title -->
                <h4 class="card-title"><a>Count <i class="fas fa-list-alt prefix-white"></i></a></h4>
                <!-- Text -->
                <p class="card-text"><a href="{{ route('admin.semua') }}"><h2 class="h2">{{ $laporan }} Laporan</h2></a>
                    <a href="{{ route('admin.laporan') }}"><small class="text-warning">{{ $pending }} Masuk</small><br></a>
                    <a href="{{ route('admin.proses') }}"><small class="text-info">{{ $proses }} Diproses</small><br></a>
                    <a href="{{ route('admin.selesai') }}"><small class="text-success">{{ $selesai }} Selesai</small><br></a>
                    <a href="{{ route('admin.tolak') }}"><small class="text-danger">{{ $tolak }} Ditolak</small><br></a>
                </p>
                </div>
            </div>
            <!-- Card -->
        </div>
    </div>
@endsection