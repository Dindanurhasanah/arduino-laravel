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
                    <h3 class="card-title">Form Tambah Data Pengujian Alat Kondisi Uang Basah</h3>
                </div>
                <form action="/basah/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail">No</label>
                        <input type="number" name="no" class="form-control" id="exampleInputEmail" placeholder="No" value="{{ old('no') }}">
                        <div class="text-danger">
                            @error('no')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nominal Uang</label>
                      
                        <select type="text" name="nominal_uang" class="form-control" id="exampleInputEmail">
                            <option value="" selected disabled>Pilih Nominal Uang</option>
                            <option value="Rp. 1000">Rp. 1000</option>
                            <option value="Rp. 2000">Rp. 2000</option>
                            <option value="Rp. 5000">Rp. 5000</option>
                            <option value="Rp. 10.000">Rp. 10.000</option>
                            <option value="Rp. 20.000">Rp. 20.000</option>
                            <option value="Rp. 50.000">Rp. 50.000</option>
                            <option value="Rp. 100.000">Rp. 100.000</option>
                        </select>
                        <div class="text-danger">
                            @error('nominal_uang')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Jumlah Percobaan</label>
                        <input type="text" name="jumlah_percobaan" class="form-control" id="exampleInputEmail" placeholder="Masukan Jumlah Percobaan" value="{{ old('jumlah_percobaan') }}">
                        <div class="text-danger">
                            @error('jumlah_percobaan')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Terdeteksi</label>
                        <input type="text" name="terdeteksi" class="form-control" id="exampleInputEmail" placeholder="Masukkan Jumlah Terdeteksi" value="{{ old('terdeteksi') }}">
                        <div class="text-danger">
                            @error('terdeteksi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Tidak Terdeteksi</label>
                        <input type="text" name="tidak_terdeteksi" class="form-control" id="exampleInputEmail" placeholder="Masukan Jumlah Tidak Terdeteksi" value="{{ old('tidak_terdeteksi') }}">
                        <div class="text-danger">
                            @error('tidak_terdeteksi')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Presentase</label>
                        <input type="text" name="presentase" class="form-control" id="exampleInputEmail" placeholder="Masukan Presentase" value="{{ old('presentase') }}">
                        <div class="text-danger">
                            @error('presentase')
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