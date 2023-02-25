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
      <h3 style="text-align: center">Pengujian Nominal Uang Kertas Kondisi Warna Pudar</h3>
      <div align ="right">
      </div>
    </div>
    <table class="table table-bordered">
      
        <tr>
          <th>No</th>
          <th>Nominal Uang</th>
          <th>Jumlah Percobaan</th>
          <th>Terdeteksi</th>
          <th>Tidak Terdeteksi</th>
          <th>Presentase</th>
        </tr>
     
      <tbody>
        <?php $no=1;?>
        @foreach ($pudars as $pudar)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$pudar->nominal_uang}}</td>
            <td>{{$pudar->jumlah_percobaan}}</td>
            <td>{{$pudar->terdeteksi}}</td>
            <td>{{$pudar->tidak_terdeteksi}}</td>
            <td>{{$pudar->presentase}}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>Total Presentase</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th>370%</th>
        </tr>
      </tfoot>
    </table>

    <!-- /.card-body -->
    {{-- <div class="card-footer clearfix">
      <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </div> --}}
  </div>
  </body>
  </html>