@extends('layouts.admin')
@section('title')
    Data Pending
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
            @if ($message = Session::get('danger'))
            <div class="col-xl-12">
                <div class="alert alert-danger alert-block mt-5">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pelapor</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporan as $lapor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $lapor->created_at->format('d/m/y') }}</td>
                        <td>{{ $lapor->nama }}</td>
                        <td>{{ $lapor->alamat }}</td>
                        <td>
                            <img src="{{ URL::to('/img/'.$lapor->image) }}" alt="jalan" width="128" height="64">
                        </td>
                        <td>
                            <a href="{{ route('admin.detail',['id' => $lapor->id]) }}" role="button" class="btn btn-sm btn-primary">detail</a>
                            <form action="{{ route('admin.pushtoproses',['id' => $lapor->id]) }}" method="post">
                            <button type="submit" role="button" class="btn btn-sm btn-success">Proses</button>
                            {{csrf_field()}}
                            </form>
                            <a role="button" class="btn btn-sm btn-danger text-white" data-toggle="modal" data-target="#Deny{{$lapor->id}}">Tolak</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach($laporan as $lapor)
    <div class="modal fade" id="Deny{{ $lapor->id }}" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="TambahLabel">Alasan Penolakan untuk Laporan {{ $lapor->nama }}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('laporan.tolak',['id' => $lapor->id]) }}" method="post">
                <div class="input-group">
                    <textarea class="form-control" name="alasan" id="alasan" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Kirim</button>
                {{csrf_field()}}
                </form>
            </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection