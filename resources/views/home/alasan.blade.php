@extends('layouts.master')
@section('title')
    Alasan Ditolak
@endsection
@section('content')
    <div class="container">
      <div class="row">
            <div class="card mt-5" style="width:32rem">
                @foreach($data as $d)
                <div class="card-body">
                    <h5 class="card-title"> Alasan</h5>
                    <p class="card-text">{{ $d->alasan }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection