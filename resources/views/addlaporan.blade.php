@extends('layouts.app')
{{-- @section('page')
    Tambah Data Laporan Pengujian Alat
@endsection --}}
@section('content')
<body>
    <div class="card-body">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Laporan Pemakaian Alat</h3>
                </div>
                <form action="/laporan/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail">No</label>
                        <input type="number" name="no" class="form-control" id="exampleInputEmail" placeholder="No" value="{{old('no')}}" >
                        <div class="text-danger">
                            @error('no')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nama Pengguna</label>
                        <input type="text" name="nama_pengguna" class="form-control" id="exampleInputEmail" placeholder="Masukan Nama Pengguna" value="{{ old('nama_pengguna') }}">
                        <div class="text-danger">
                            @error('nama_pengguna')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Kegiatan</label>
                        <input type="text" name="kegiatan" class="form-control" id="exampleInputEmail" placeholder="Masukan Kegiatan" value="{{ old('kegiatan') }}">
                        <div class="text-danger">
                            @error('kegiatan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputEmail">Uang Yang Diberikan</label>
                        <input type="text" name="uang_diberikan" class="form-control" id="exampleInputEmail" placeholder="Masukkan Uang yang diberikan" value="{{ old('uang_diberikan') }}">
                            
                        <div class="text-danger">
                            @error('uang_diberikan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Kondisi Uang</label>
                      
                        <input type="text" name="kondisi_uang" class="form-control" id="exampleInputEmail" placeholder="Masukkan kondisi uang" value="{{ old('kondisi_uang') }}">
                          
                        <div class="text-danger">
                            @error('kondisi_uang')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hasil Deteksi</label>
                        <input type="text" name="hasil_deteksi" class="form-control" id="exampleInputEmail" placeholder="Masukkan Hasil deteksi" value="{{ old('hasil_deteksi') }}">
                        <div class="text-danger">
                            @error('hasil_deteksi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Uang Kembalian</label>
                        <input type="text" name="uang_kembalian" class="form-control" id="exampleInputEmail" placeholder="Masukkan Uang Kembalian" value="{{ old('uang_kembalian') }}">
                          
                        <div class="text-danger">
                            @error('uang_kembalian')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Kondisi Uang</label>
                      
                        <input type="text" name="kondisi_uang2" class="form-control" id="exampleInputEmail" placeholder="Masukkan kondisi uang" value="{{ old('kondisi_uang2') }}">
                          
                        <div class="text-danger">
                            @error('kondisi_uang2')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Hasil Deteksi</label>
                        <input type="text" name="hasil_deteksi2" class="form-control" id="exampleInputEmail" placeholder="Masukkan Hasil Deteksi" value="{{ old('hasil_deteksi2') }}">
                           
                     
                        <div class="text-danger">
                            @error('hasil_deteksi2')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="exampleInputEmail">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="exampleInputEmail" placeholder="Masukan Tanggal" value="{{ old('tanggal') }}">
                        <div class="text-danger">
                            @error('tanggal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Insert</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</body>
@endsection