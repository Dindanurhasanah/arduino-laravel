
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
     <!--left column-->
    <div class="col-md-6">

        <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit Pengujian Kondisi Uang Basah</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/basah/update/{{$basah->no}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">No</label>
                <input type="number" name="no" class="form-control" id="exampleInputEmail1" placeholder="Masukan No" value="{{($basah->no)}}" readonly>
                <div class="text-danger">
                    @error('no')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nominal Uang</label>
                <input type="text" name="nominal_uang" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nominal Uang" value="{{($basah->nominal_uang)}}">
                <div class="text-danger">
                    @error('nominal_uang')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Jumlah Percobaan</label>
                <input type="text" name="jumlah_percobaan" class="form-control" id="exampleInputEmail1" placeholder="Masukan jumlah percobaan" value="{{($basah->jumlah_percobaan)}}">
                <div class="text-danger">
                    @error('jumlah_percobaan')
                    {{$message}}
                    @enderror
                </div>
            </div>
           
            <div class="form-group">
                <label for="exampleInputEmail1">Terdeteksi</label>
                <input type="text" name="terdeteksi" class="form-control" id="exampleInputEmail1" placeholder="Masukan jumlah terdeteksi" value="{{($basah->terdeteksi)}}">
                <div class="text-danger">
                    @error('terdeteksi')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tidak Terdeteksi</label>
                <input type="text" name="tidak_terdeteksi" class="form-control" id="exampleInputEmail1" placeholder="Masukan jumlah tidak terdeteksi" value="{{($basah->tidak_terdeteksi)}}">
                <div class="text-danger">
                    @error('tidak_terdeteksi')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Persentase</label>
                <input type="text" name="presentase" class="form-control" id="exampleInputEmail1" placeholder="Masukan Persentase" value="{{($basah->presentase)}}">
                <div class="text-danger">
                    @error('presentase')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        </form>
    </div>
        <!-- /.card -->
    </div>
    </div>
    </div>
    @endsection