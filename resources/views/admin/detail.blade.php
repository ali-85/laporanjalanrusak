@extends('layouts.admin')
@section('title')
    Detail
@endsection
@section('content')
  <div class="container">
      <div class="row">
            <div class="card mt-5" style="width:32rem">
                @foreach($laporan as $lapor)
                <img onclick="fullscreen()" id="Image" src="{{ URL::to('/img/'.$lapor->image) }}" class="card-img-top" alt="image" height="256">
                <div class="card-body">
                    <h5 class="card-title">Pelapor : {{ $lapor->nama }}</h5>
                    <p class="card-text">No HP Pelapor : {{ $lapor->nohp }}</p>
                    <p class="card-text">Alamat : {{ $lapor->alamat }}</p>
                    <p class="card-text">Desa : {{ $lapor->desa }}</p>
                    <p class="card-text">Kecamatan : {{ $lapor->namakecamatan }}</p>
                    <p class="card-text">status : {{ $lapor->status }}</p>
                    <p class="card-text">Catatan : {{ $lapor->note }}</p>
                    <p class="card-text"><small class="text-muted">diunggah pada {{ date('H:i:s d/m/Y', strtotime($lapor->created_at)) }}</small></p>
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