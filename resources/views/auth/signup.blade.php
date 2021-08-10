@extends('layouts.auth')
@section('title')
    Signup Page
@endsection
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                @if(Session::has('danger'))
                <div class="row">
                  <div class="col-lg-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ Session::get('danger') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
                    @endif
              </div>
              <form class="user" method="post" action="{{ route('postSignup') }}">
              <div class="form-group">
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                </div>
                @error('name')
                      <div class="alert alert-danger alert-dismissible fade show">{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @enderror
                <div class="form-group">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email">
                </div>
                @error('email')
                      <div class="alert alert-danger alert-dismissible fade show">{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                <div class="form-group">
                  <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Nomor HP Aktif">
                </div>
                @error('nohp')
                      <div class="alert alert-danger alert-dismissible fade show">{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                @error('password1' or 'password2')
                      <div class="alert alert-danger alert-dismissible fade show">{{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @enderror
                <button type="submit" class="btn btn-success btn-block">
                  Daftar
                </button>
                {{ csrf_field() }}
              </form>
              <hr>
              <div class="text-center">
                <a class="small text-success" href="{{ route('login') }}">Sudah punya akun? masuk sini!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection