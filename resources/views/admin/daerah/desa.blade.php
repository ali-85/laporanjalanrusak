@extends('layouts.admin')
@section('title')
    Desa
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
            <a href="" class="btn btn-primary mb-2 add-btn" data-target="#DesaModal" data-toggle="modal">Tambah</a>
        </div>
        <div class="row">
          <div class="col-lg-6 ml-n3">
              <form action="{{ route('search.desa') }}" method="get">
                  <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Cari Desa" name="key" id="key" autocomplete="off">
                      <div type="text" class="input-group-append">
                          <button class="btn btn-primary px-4" type="submit" id="tombolCari">Cari</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
        <div id="table_data">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Desa</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($desa as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>{{ $d->namakecamatan }}</td>
                        <td>
                            <a data-id="{{ $d->id }}" data-toggle="modal" data-target="#DesaModal" role="button" class="btn btn-sm btn-success text-white edit-btn">Ubah</a>
                            <a href="{{ route('hapus.desa',['id' => $d->id]) }}" role="button" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($data > 10)
            {!! $desa->links() !!}
            @endif
          </div>
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="DesaModal" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahLabel">Tambah Data Desa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.postdesa') }}" method="post">
            <div class="input-group mb-4">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Desa">
            </div>
            <div class="input-group">
            <select class="custom-select" id="kecamatan_id" name="kecamatan_id" value="{{ old('kecamatan') }}">
              <option disabled selected>-- Kecamatan --</option>
              @foreach($kcmtn as $row)
              <option value="{{ $row->id }}">{{ $row->nama }}</option>
              @endforeach
              </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        {{csrf_field()}}
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
        $('.add-btn').on('click',function(){
            $('.modal-header h5').text('Tambah Data Desa');
            $('.modal-body form').attr('action','{{ route("admin.postdesa") }}');
            $('input[name="_method"]').remove();
        })
        $('.edit-btn').on('click',function(){
            const id = $(this).data('id');
            $('#nama').val();
            $('#kecamatan_id').prop('selected',false);
            $('.modal-header h5').text('Ubah Data Desa');
            $('.modal-body form').attr('action',"{{ url('desa/update/') }}/"+id);
            $('.modal-body form').append('<input name="_method" type="hidden" value="PUT">');
            $.ajax({
                type:'GET',
                url:"{{ route('edit.desa') }}",
                data:{'id':id},
                dataType: 'json',
                success:function(data){
                    $('#nama').val(data.nama);
                    $('#kecamatan_id option[value="'+data.kecamatan_id+'"]').prop('selected',true);
                }
            });
        })
    })
  </script>
@endsection