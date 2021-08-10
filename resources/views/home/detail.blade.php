@extends('layouts.master')
@section('title')
    Detail Laporan
@endsection
@section('content')
  <div class="container">
      <div class="row justify-content-center">
            <div class="card my-5" style="width:32rem">
                @foreach($laporan as $lapor)
                <img onclick="fullscreen()" id="Image" src="{{ URL::to('/img/'.$lapor->image) }}" class="card-img-top" alt="image" height="256">
                <div class="card-body">
                    <h5 class="card-title">Pelapor : {{ $lapor->nama }}</h5>
                    <p class="card-text">No HP Pelapor : {{ $lapor->nohp }}</p>
                    <p class="card-text">Alamat : {{ $lapor->alamat }}</p>
                    <p class="card-text">Desa : {{ $lapor->desa }}</p>
                    @foreach($kcmtn as $k)
                        @if($k->id == $lapor->kecamatan)
                        <p class="card-text">Kecamatan : {{ $k->nama }}</p>
                        @endif
                    @endforeach
                    <p class="card-text">status : {{ $lapor->status }}</p>
                    <p class="card-text">Catatan : {{ $lapor->note }}</p>
                    <p class="card-text"><small class="text-muted">diunggah pada {{ $lapor->created_at->format('h:i:s d/m/y') }}</small></p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
function fullscreen() {
    var divObj = document.getElementById("Image");
       //Use the specification method before using prefixed versions
      if (divObj.requestFullscreen) {
        divObj.requestFullscreen();
      }
      else if (divObj.msRequestFullscreen) {
        divObj.msRequestFullscreen();               
      }
      else if (divObj.mozRequestFullScreen) {
        divObj.mozRequestFullScreen();      
      }
      else if (divObj.webkitRequestFullscreen) {
        divObj.webkitRequestFullscreen();       
      } else {
        console.log("Fullscreen API is not supported");
      } 

    }
</script>
@endsection