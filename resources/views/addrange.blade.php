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
                    <h3 class="card-title">Form Tambah Data Range Nominal Uang Kertas</h3>
                </div>
                <form action="/range/insert" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail">No</label>
                        <input type="text" name="no" class="form-control" id="exampleInputEmail" placeholder="No" value="{{ old('no') }}">
                        <div class="text-danger">
                            @error('no')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Nominal</label>
                        <input type="text" name="nominal" class="form-control" id="exampleInputEmail" placeholder="Masukan Nominal Uang" value="{{ old('nominal') }}">
                        <div class="text-danger">
                            @error('nominal')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Range Merah</label>
                        <input type="text" name="merah" class="form-control" id="exampleInputEmail" placeholder="Masukan Range Warna Merah" value="{{ old('merah') }}">
                        <div class="text-danger">
                            @error('merah')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Range Hijau</label>
                        <input type="text" name="hijau" class="form-control" id="exampleInputEmail" placeholder="Masukan Range Warna Hijau" value="{{ old('hijau') }}">
                        <div class="text-danger">
                            @error('hijau')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Range Biru</label>
                        <input type="text" name="biru" class="form-control" id="exampleInputEmail" placeholder="Masukan Range Warna Biru" value="{{ old('biru') }}">
                        <div class="text-danger">
                            @error('biru')
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