@extends('layouts.master')
@section('title')
    Laporan Jalan
@endsection
@section('style')
    <style>
        @media only screen and (max-width: 576px) {
            .d-block{
                height: 125px;
            }
        }
        .d-block{
            max-height: 400px;
        }
    </style>
@endsection
@section('content')
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="3000">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="{{ URL::to('/img/carousel/1.jpg') }}" class="d-block w-100" alt="carousel">
        </div>
        <div class="carousel-item">
        <img src="{{ URL::to('/img/carousel/2.jpg') }}" class="d-block w-100" alt="carousel">
        </div>
        <div class="carousel-item">
        <img src="{{ URL::to('/img/carousel/3.jpg') }}" class="d-block w-100" alt="carousel">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
    </div>
    <div class="container">
    @if(Session::has('success'))
                  <div class="row mt-5">
                    <div class="col-lg-12">
                      <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                  </div>
    @endif
        <div class="card my-5">
            <div class="card-header">
                Laporkan
            </div>
            <div class="card-body">
                <h5 class="card-title text-center">Form Laporan !</h5>
                @if(!(Auth::check()))
                <h5 class="card-title text-center">Silahkan Login dahulu sebelum laporan!</h5>
                @endif
                <div class="col-lg-6 mx-auto">
                    <form action="{{ route('postLaporan') }}" method="post" onsubmit="return sendPic();" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" rows="2" name="alamat">{{ old('alamat') }}</textarea>
                            <small id="alamatHelp" class="form-text text-muted">
                                *Isi alamat jalan yang rusak.
                            </small>
                        </div>
                        <div class="form-group">
                            <select class="custom-select" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}">
                                <option disabled selected>-- Kecamatan --</option>
                                @foreach($kcmtn as $k)
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="custom-select desa" id="desa" name="desa" value="{{ old('desa') }}">
                                <option disabled selected>-- Desa --</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" id="myFileInput" name="image" accept="image/*;capture=camera" value="{{ old('image') }}">
                                    <label class="custom-file-label" for="inputGroupFile01">Pilih/Unggah Foto</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="note">Catatan Tambahan</label>
                            <textarea class="form-control" id="note" rows="3" name="note"></textarea>
                        </div>
                        <div class="input-group">
                            <button type="submit" class="btn btn-success">Kirim <i class="fas fa-fw fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
function sendPic() {
    var myInput = document.getElementById('myFileInput');

    function sendPic() {
    var file = myInput.files[0];

    // Send file here either by adding it to a `FormData` object 
    // and sending that via XHR, or by simply passing the file into 
    // the `send` method of an XHR instance.
    }

    myInput.addEventListener('change', sendPic, false);
    }
</script>
<script>
      $('.custom-file-input').on('change',function(){
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html
        (filename);
      });
  </script>
  <script>
      $(document).ready(function() {
          $(document).on('change','#kecamatan',function(){
              var id=$(this).val();
              var div=$(this).find('#desa');
              var op=" ";
            $.ajax({
                type:'get',
                url:'{{ route('findDesa') }}',
                data:{'id':id},
                success:function(data){
                    op+='<option selected disabled>-- Pilih Desa --</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].nama+'">'+data[i].nama+'</option>';
                    }
                    $('select[name="desa"]').html(" ");
                    $('select[name="desa"]').append(op);
                    //console.log(id);
                    //console.log(data.length);
                    //console.log(data);
                },
                error:function(){

                }
            });
          });
      });
  </script>
@endsection