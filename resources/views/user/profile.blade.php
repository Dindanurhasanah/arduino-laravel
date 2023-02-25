@extends('layouts.app')

@section('content')
<div class="content-wrapper" style="min-height: 1301.84px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="{{ asset('photo/' . auth()->user()->photo) }}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                <p class="text-muted text-center">{{ auth()->user()->email }}</p>

                <form action="/userprofile" method="post" class="form-horizontal" enctype="multipart/form-data">
                  @csrf 
                  <div class="form-group row">
                  <label for="name" class="col-sm-11 col-form-label">Ubah Nama</label>
                  <div class="col-sm-11">
                      <input type="text" name="name" class="form-control" id="name" value="{{old('name', $user->name)}}"> 
                  </div>
                </div>
                <div class="form-group row">
                  <label for="email" class="col-sm-11 col-form-label">Ubah Email</label>
                  <div class="col-sm-11">
                      <input type="email" name="email" class="form-control" id="email"  value="{{old('email', $user->email)}}"> 
                  </div>
                </div>
                <div class="form-group row">
                  <label for="photo" class="col-sm-11 col-form-label">Ubah Photo</label>
                  <div class="col-sm-11">
                      <input type="file" name="photo" class="form-control" id="photo"> 
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><b>Update Profile</b></button>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <form action="/updatepassword" method="post" class="form-horizontal">
                  @csrf 
                  <div class="form-group row">
                  <label for="password" class="col-sm-11 col-form-label">Ubah Password</label>
                  <div class="col-sm-11">
                      <input type="password" name="password" class="form-control" id="password" required> 
                  </div>
                </div>
                <div class="form-group row">
                  <label for="konfirmasi_password" class="col-sm-11 col-form-label">Konfirmasi Password</label>
                  <div class="col-sm-11">
                      <input type="password" name="konfirmasi_password" class="form-control" id="konfirmasi_password" required> 
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><b>Update Password</b></button>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
  </script>

@if (session('success')) 
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    Toast.fire({
        icon: 'success',
        title: "{{ session('success') }}"
    })

  });
</script>
@endif
@endsection