
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
     <!--left column-->
    <div class="col-md-6">

        <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Form Edit</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="/laporan/update/{{$laporan->no}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">No</label>
                <input type="number" name="no" class="form-control" id="exampleInputEmail1" placeholder="Masukan No" value="{{($laporan->no)}}" readonly>
                <div class="text-danger">
                    @error('no')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pengguna</label>
                <input type="text" name="nama_pengguna" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nama Pengguna" value="{{($laporan->nama_pengguna)}}">
                <div class="text-danger">
                    @error('nama_pengguna')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kegiatan</label>
                <input type="text" name="kegiatan" class="form-control" id="exampleInputEmail1" placeholder="Masukan kegiatan" value="{{($laporan->kegiatan)}}">
                <div class="text-danger">
                    @error('kegiatan')
                    {{$message}}
                    @enderror
                </div>
            </div>
           
            <div class="form-group">
                <label for="exampleInputEmail1">Uang yang diberikan</label>
                <input type="text" name="uang_diberikan" class="form-control" id="exampleInputEmail1" placeholder="Masukan uang yang diberikan" value="{{($laporan->uang_diberikan)}}">
                <div class="text-danger">
                    @error('uang_diberikan')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kondisi Uang</label>
                <input type="text" name="kondisi_uang" class="form-control" id="exampleInputEmail1" placeholder="Masukan kondisi uang" value="{{($laporan->kondisi_uang)}}">
                <div class="text-danger">
                    @error('kondisi_uang')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Hasil Deteksi</label>
                <input type="text" name="hasil_deteksi" class="form-control" id="exampleInputEmail1" placeholder="Masukan hasil deteksi" value="{{($laporan->hasil_deteksi)}}">
                <div class="text-danger">
                    @error('hasil_deteksi')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Uang Kembalian</label>
                <input type="text" name="uang_kembalian" class="form-control" id="exampleInputEmail1" placeholder="Masukan uang kembalian" value="{{($laporan->uang_kembalian)}}">
                <div class="text-danger">
                    @error('uang_kembalian')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Kondisi Uang</label>
                <input type="text" name="kondisi_uang2" class="form-control" id="exampleInputEmail1" placeholder="Masukan kondisi uang" value="{{($laporan->kondisi_uang2)}}">
                <div class="text-danger">
                    @error('kondisi_uang2')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Hasil Deteksi</label>
                <input type="text" name="hasil_deteksi2" class="form-control" id="exampleInputEmail1" placeholder="Masukan hasil deteksi" value="{{($laporan->hasil_deteksi2)}}">
                <div class="text-danger">
                    @error('hasil_deteksi2')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" placeholder="Masukan tanggal" value="{{($laporan->tanggal)}}">
                <div class="text-danger">
                    @error('tanggal')
                    {{$message}}
                    @enderror
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