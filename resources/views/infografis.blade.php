<?php
error_reporting(0);// buat mengurangi notifikasi error pada halaman yg dibuat
?>
@extends('layouts.app')

@section('content') <!-- 'content' dari layouts app!-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dokumentasi</title>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}


   
</head>
<body>
<div class="card-body ">
    <div class="card-box row mb-4 ">
        <div class="col-lg-12 margin-tb">
            <div class="text-center">
                <h2>DOKUMENTASI </h2>
                <a class="btn btn-success" href="{{ route('infografis.create') }}" title="Upload files"> <i class="fas fa-upload fa-2x"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container">
        <table class="table table-bordered table-responsive-lg thead-dark text-center">
            <thead class="thead-dark ">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Tanggal diupload</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
               
                @foreach ($files as $project)  
                <tr>
                    <td>{{ ++$i }}</td>
                    
                    <td><a href="images/{{ $project->filename }}" >
                        <img src="images/{{ $project->filename }}" class="img-fluid">
                    </a>
                  
                    <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
                    <td>
                        <form action="{{ route('infografis.destroy', $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                                <i class="fas fa-trash fa-lg text-danger"></i>
                                @include('sweetalert::alert')
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="text-center footer">

       

    </div>
</div>

</body>
</html>
  @endsection
 
  {{-- infografis gambar diklik jadi besar --}}
  {{-- <div class="card-box">
    <h4 class="header-title mb-4">INFOGRAFIS</h4>

    <div class="row">
        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info1.jpg" data-lightbox="gallery-set" data-title="Click the right half of the image to move forward.">
                <img src="{{ asset('assets') }}/img/info1.jpg" alt="" class="img-fluid"/>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info2.jpg" data-lightbox="gallery-set" data-title="Or press the right arrow on your keyboard.">
                <img src="{{ asset('assets') }}/img/info2.jpg" alt="" class="img-fluid" />
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info3.jpg" data-lightbox="gallery-set" data-title="The next image in the set is preloaded as you're viewing.">
                <img src="{{ asset('assets') }}/img/info3.jpg" alt="" class="img-fluid" />
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info4.jpg" data-lightbox="gallery-set" data-title="Click anywhere outside the image or the X to the right to close.">
                <img src="{{ asset('assets') }}/img/info4.jpg" alt="" class="img-fluid" />
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info4.jpg" data-lightbox="gallery-set" data-title="Click anywhere outside the image or the X to the right to close.">
                <img src="{{ asset('assets') }}/img/info4.jpg" alt="" class="img-fluid" />
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info4.jpg" data-lightbox="gallery-set" data-title="Click anywhere outside the image or the X to the right to close.">
                <img src="{{ asset('assets') }}/img/info4.jpg" alt="" class="img-fluid" />
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info4.jpg" data-lightbox="gallery-set" data-title="Click anywhere outside the image or the X to the right to close.">
                <img src="{{ asset('assets') }}/img/info4.jpg" alt="" class="img-fluid" />
            </a>
        </div>
        <div class="col-sm-3">
            <a href="{{ asset('assets') }}/img/info4.jpg" data-lightbox="gallery-set" data-title="Click anywhere outside the image or the X to the right to close.">
                <img src="{{ asset('assets') }}/img/info4.jpg" alt="" class="img-fluid" />
            </a>
        </div>
    </div>

</div>   --}}






 {{-- <html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    </head>
    <body>
      <div class="container">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="container-fluid">
          <div class="row ">
              <div class=" col-md-10 mt-3 ">
                    <h2>Tambah data di sini</h2>
                
                  <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" class="dropzone">
                      @csrf
                      
                  </form>
              </div>
              <div class="col-md-10 mt-2">
                  <div class="alert alert-primary">
                     Refresh Browser agar gambar bisa terupdate
                  </div>
              </div>

              <div class="col-md-10 mt-2 row"> {{--ini buat foto yang teruploadnya}} --}}
                  {{-- @foreach ($data as $row)
                      <div class="col-md-5">
                          <div class="card" style="width: 20rem;">
                              <img src="{{ $row['url'] }}" alt="{{ $row['name'] }}" class="card-img-top">
                              <div class="card-body">
                                  <h5 class="card-title">{{ $row['name'] }}</h5>
                              </div>
                          </div>
                      </div>
                  @endforeach
              </div>
          </div>
      </div>
  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
      <script type="text/javascript">
          Dropzone.options.imageUpload = {
              maxFilesize:      1,
              acceptedFiles: ".jpeg,.jpg,.png,.xlsx,.gif"
          };
      </script>
</div>
</div>
  </body>
</html> --}}  
  