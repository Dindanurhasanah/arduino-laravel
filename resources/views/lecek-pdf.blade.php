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
      <h3 style="text-align: center">Pengujian Nominal Uang Kertas Kondisi Lecek</h3>
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
        @foreach ($leceks as $lecek)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$lecek->nominal_uang}}</td>
            <td>{{$lecek->jumlah_percobaan}}</td>
            <td>{{$lecek->terdeteksi}}</td>
            <td>{{$lecek->tidak_terdeteksi}}</td>
            <td>{{$lecek->presentase}}</td>
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
          <th>610%</th>
        </tr>
      </tfoot>
    </table>
    <!-- /.card-body -->
  </div>
  </body>
  </html>