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
      <div align ="right">
      </div>
    </div>
    <table class="table table-bordered">
      
      
        <tr>
          <th>No</th>
          <th>Nominal</th>
          <th>Range Warna Merah (RED)</th>
          <th>Range Warna Hijau (GREEN)</th>
          <th>Range Warna Biru (BLUE)</th>
        </tr>
     
      <tbody>
        <?php $no=1;?>
        @foreach ($ranges as $range)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$range->nominal}}</td>
            <td>{{$range->merah}}</td>
            <td>{{$range->hijau}}</td>
            <td>{{$range->biru}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
 
    
    <!-- /.card-body -->
  </div>
</body>
</html>