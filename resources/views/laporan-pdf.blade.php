<!DOCTYPE html>
<html>
<head>
  <style>
    table,td,th{
      border:1px solid;
    }
    table{
      width:100%;
      border-collapse:collapse;
    }
    </style>
    </head>
    <body>
<div class="card-body">
    <div class="card-header">
      <h3 style="text-align: center">Data Range Warna Nominal Uang Kertas</h3>
    </div>
    <table class="table table-bordered">
      
      
        <tr>
            <th>No</th>
            <th>Nama Pengguna</th>
            <th>Kondisi Uang</th>
            <th>Hasil Deteksi</th>
            <th>Kegiatan</th>
            <th>Tanggal</th>
            {{-- <th style="width: 10%">Action</th> --}}
          </tr>
       
        <tbody>
          <?php $no=1;?>
            @foreach ($laporan as $laporans)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$laporans->nama_pengguna}}</td>
                <td>{{$laporans->kondisi_uang}}</td>
                <td>{{$laporans->hasil_deteksi}}</td>
                <td>{{$laporans->kegiatan}}</td>
                <td>{{$laporans->tanggal}}</td>
                {{-- <td>
                  <a href="/laporan/detail/{{$laporan->no}}" class="btn btn-sm btn-success">Detail</a>
                  <a href="/laporan/edit/{{$laporan->no}}" class="btn btn-sm btn-warning">Edit</a>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$laporan->no}}">Delete
                  </button>
                </td> --}}
            </tr>
            @endforeach
      </tbody>
    </table>
    
    <!-- /.card-body -->
  </div>
  </body>
  </html>