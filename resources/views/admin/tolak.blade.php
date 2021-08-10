@extends('layouts.admin')
@section('title')
    Laporan Ditolak
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pelapor</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Status</th>
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
                        <td>{{ $lapor->status }}</td>
                        <td>
                            <a href="{{ route('admin.detail',['id' => $lapor->id]) }}" role="button" class="btn btn-sm btn-primary">detail</a>
                            <form action="{{ route('batal.tolak',['id' => $lapor->id]) }}" method="post">
                            <button type="submit" role="button" class="btn btn-sm btn-success">Batalkan</button>
                            {{csrf_field()}}
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection