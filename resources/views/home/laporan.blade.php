@extends('layouts.master')
@section('title')
    Laporan Saya
@endsection
@section('content')
<div class="container">
        <div class="row mt-5">
            @if ($message = Session::get('success'))
            <div class="col-xl-12">
                <div class="alert alert-success alert-block mt-5">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->alamat }}</td>
                        <td>
                            <a href="{{ route('user.detail',['id'=> $d->id]) }}" class="btn btn-primary text-white btn-sm">Detail</a>
                        </td>
                        @if($d->status == 'pending')
                        <td class="text-warning">{{ $d->status }}</td>
                        @elseif($d->status == 'diproses')
                        <td class="text-info">{{ $d->status }}</td>
                        @elseif($d->status == 'Selesai')
                        <td class="text-success">{{ $d->status }}</td>
                        @elseif($d->status == 'Ditolak')
                        <td class="text-danger"><a href="{{ route('laporan.detail',['id' => $d->id]) }}" class="text-danger">{{ $d->status }}</a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection