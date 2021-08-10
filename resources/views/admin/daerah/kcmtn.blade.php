@extends('layouts.admin')
@section('title')
    Kecamatan
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
            <a id="tambahBtn" href="" class="btn btn-primary mb-2 add-btn" data-target="#KecamatanModal" data-toggle="modal">Tambah</a>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama }}</td>
                        <td>
                            <a data-id="{{ $d->id }}" data-toggle="modal" data-target="#KecamatanModal" role="button" class="btn btn-sm btn-success text-white edit-btn">Ubah</a>
                            <a onclick="return confirm('Semua Desa dalam kecamatan ini akan ikut terhapus. Tetap Hapus?')" href="{{ route('delete.kcmtn',['id' => $d->id]) }}" role="button" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($count > 10)
            {!! $data->links() !!}
            @endif
        </div>
    </div>
<!-- Modal -->
<div class="modal fade" id="KecamatanModal" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahLabel">Tambah Data Kecamatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.postcamat') }}" method="post">
            <div class="input-group">
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Kecamatan" autofocus>
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
  <script>
      $(document).ready(function() {
        $('.add-btn').on('click',function(){
            $('.modal-header h5').text('Tambah Data Kecamatan');
            $('.modal-body form').attr('action','{{ route("admin.postcamat") }}');
            $('input[name="_method"]').remove();
        })
        $('.edit-btn').on('click',function(){
            const id = $(this).data('id');
            $('#nama').val();
            $('.modal-header h5').text('Ubah Data Kecamatan');
            $('.modal-body form').attr('action',"{{ url('kecamatan/update/') }}/"+id);
            $('.modal-body form').append('<input name="_method" type="hidden" value="PUT">');
            $.ajax({
                type:'GET',
                url:"{{ route('edit.kecamatan') }}",
                data:{'id':id},
                dataType: 'json',
                success:function(data){
                    $('#nama').val(data.nama);
                }
            });
        })
    })
  </script>
@endsection
