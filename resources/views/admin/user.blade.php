@extends('layouts.admin')
@section('title')
    Semua User
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
            <a href="" class="btn btn-primary mb-2 add-btn" data-target="#UserModal" data-toggle="modal">Tambah</a>
        </div>
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        @if($u->role == 1)
                        <td>Admin</td>
                        @else
                        <td>User</td>
                        @endif
                        <td>
                            <a data-id="{{ $u->id }}" data-toggle="modal" data-target="#UserModal" role="button" class="btn btn-success text-white btn-sm edit-btn">Edit</a>
                            @if(!(Auth::user()->id == $u->id))
                                <a href="{{ route('user.delete',['id' => $u->id]) }}" role="button" class="btn btn-danger btn-sm">Hapus</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="TambahLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TambahLabel">Tambah Data User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('tambah.user') }}" method="post">
            <div class="input-group mb-4">
                <input type="text" name="nama" id="Nama" class="form-control" placeholder="Nama Lengkap" required>
            </div>
            <div class="input-group mb-4">
                <input type="email" name="email" id="Email" class="form-control" placeholder="Alamat Email" required>
            </div>
            <div class="input-group mb-4">
                <input type="number" name="nohp" id="Nohp" class="form-control" placeholder="No HP aktif" required>
            </div>
            <div class="input-group mb-4">
                <select class="custom-select" id="Role" name="role" value="{{ old('role') }}" required>
                    <option disabled selected>-- Role --</option>
                    <option value="1">Admin</option>
                    <option value="0">User</option>
                </select>
            </div>
            <div class="input-group mb-4">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
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
                $('.modal-header h5').text('Tambah Data User');
                $('.modal-body form').attr('action','{{ route("tambah.user") }}');
                $('input[name="_method"]').remove();
            })
            $('.edit-btn').on('click',function(){
                const id = $(this).data('id');
                $('#Nama').val();
                $('#Email').val();
                $('#Nohp').val();
                $('#Role').prop('selected',false);
                $('.modal-header h5').text('Ubah Data User');
                $('.modal-body form').attr('action',"{{ url('pengguna/ubah/') }}/"+id);
                $('.modal-body form').append('<input name="_method" type="hidden" value="PUT">');
                $.ajax({
                    type:'GET',
                    url:"{{ route('edit.user') }}",
                    data:{'id':id},
                    dataType: 'json',
                    success:function(data){
                        $('#Nama').val(data.name);
                        $('#Email').val(data.email);
                        $('#Nohp').val(data.nohp);
                        $('#Role option[value="'+data.role+'"]').prop('selected',true);
                    }
                });
            })
        })
    </script>
@endsection