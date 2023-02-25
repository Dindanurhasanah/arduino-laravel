@extends('layouts.app')

@section('content')
<body>
    
<div class="card-body">
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title"> Detail Pemakaian Alat</h3>
    </div>
    {{-- card header --}}
    {{-- form start --}}
    <form>
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">No :</label>
                {{$laporan->no}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nama Pengguna :</label>
                {{$laporan->nama_pengguna}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kegiatan :</label>
                {{$laporan->kegiatan}}
            </div>
           
            <div class="form-group">
                <label for="exampleInputPassword1">Uang yang diberikan :</label>
                {{$laporan->uang_diberikan}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kondisi Uang :</label>
                {{$laporan->kondisi_uang}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hasil Deteksi :</label>
                {{$laporan->hasil_deteksi}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Uang Kembalian :</label>
                {{$laporan->uang_kembalian}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kondisi Uang :</label>
                {{$laporan->kondisi_uang2}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Hasil Deteksi :</label>
                {{$laporan->hasil_deteksi2}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal :</label>
                {{$laporan->tanggal}}
            </div>
            
           
        </div>
        {{-- card body --}}

        <div class="card-footer">
            <a href="/laporan"><button type="button" class="btn btn-primary"> Kembali</button></a>
        </div>
    </form>
</div>
</div>
</body>
@endsection