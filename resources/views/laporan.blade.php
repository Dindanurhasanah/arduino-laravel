
@extends('layouts.app')

@section('content')
<html lang="en">
<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
</head>
<body>
  
  @if (session('pesan'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="fa fa-check"></i> success</h5>
      {{session('pesan')}}
     </div>
    @endif

<div class="card-body">
  <h3> DF Arduino </h3>
  <p>Hardware yang dirancang merupakan sebuah prototipe alat pendeteksi nominal uang kertas untuk penyandang tunanetra berbasis sensor RGB yang kami berinama DF Arduino. Penggunaan alat ini ditujukan khusus dalam hal membaca nilai nominal pada mata uang kertas rupiah sehingga memudahkan penyandang tunanetra untuk terhindar dari penipuan dan uang yang tertukar dalam transaksi jual beli. Dengan cara menyiapkan selembar uang lalu ditaruh di atas sensor dan ditutup dengan penutup alat. Sensor akan memindai nominal uang kertas, kemudian alat akan mengeluarkan suara sesuai dengan nominal uang tersebut.</p>
  <p>Alat pendeteksi ini menggunakan mikrokontroler yaitu Arduino Uno R3. Sedangkan untuk memprogram papan atau board Arduino menggunakan software Arduino IDE.</p>

</div>
<div class="card-body">
  <div class="card-header">
    <h3 style="text-align: center">Kondisi uang kertas yang akan dideteksi</h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body p-0">
    <table id="example1" class="table table-bordered">
                  
         <tr>
          <th style="width: 10%">No</th>
          <th style="width: 10%">Kondisi</th>
          {{-- <th>Persentase Terdeteksi</th> --}}
          <th style="width: 10%">Keterangan</th>
          </tr>
                  
      <tbody>
        <tr>
          <td>1.</td>
          <td>Uang Baru/Rapi</td>
          {{-- <td><span class="badge bg-success">93%</span></td> --}}
          <td></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>Lecek</td>
          {{-- <td><span class="badge bg-success">87%</span></td> --}}
          <td></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Basah</td>
          {{-- <td><span class="badge bg-warning">71%</span></td> --}}
          <td>Dikibaskan terlebih dahulu</td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Warna Pudar</td>
          {{-- <td><span class="badge bg-danger">53%</span></td> --}}
          <td></td>
        </tr>
        {{-- <tr>
          <td>5.</td>
          <td>Sobek</td>
          <td><span class="badge bg-success">✔</span></td>
          <td></td>
        </tr> --}}
                  
      </tbody>
    </table>
  </div>
</div>
<!-- /.card-body -->

<!-- Tabel Range Warna Merah -->
<div class="card-body">
  <div class="card-header">
    <h3 style="text-align: center">Data Range Warna Nominal Uang Kertas</h3>
    <div align ="right">
      <a href="{{ url('ranges/print') }}" class="btn btn-sm" style=" background: green; color: white;"><i class="fa fa-file-pdf-o"></i> Print PDF</a>
      <a href="/addrange" class="btn btn-sm" style=" background: blue; color: white;">Tambah Data</a><br>
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
      @foreach ($data6 as $range)
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



<!-- Tabel Pemakaian Alat -->
<div class="card-body">
  <div class="card-header">
    <h3 style="text-align: center">Laporan Pemakaian Alat</h3>
    <div align ="right">
      <a href="{{ url('laporan/print') }}" class="btn btn-sm" style=" background: green; color: white;""><i class="fa fa-file-pdf-o"></i> Download PDF</a>
      <a href="/addlaporan" class="btn btn-sm" style=" background: blue; color: white;">Tambah Data</a><br>
    </div>
  </div>
  <table id="example1" class="table table-bordered">
  
    
      <tr>
        <th style="width: 10%">No</th>
        <th style="width: 10%">Nama Pengguna</th>
        {{-- <th>Kondisi Uang</th>
        <th>Uang yang diberikan</th>
        <th>Hasil Deteksi</th>
        <th>Uang yang diberikan</th>
        <th>Hasil Deteksi</th>
        <th>Kegiatan</th>
        <th>Tanggal</th> --}}
        <th style="width: 10%">Action</th>
      </tr>
   
    <tbody>
      <?php $no=1;?>
        @foreach ($data as $laporan)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$laporan->nama_pengguna}}</td>
            {{-- <td>{{$laporan->kondisi_uang}}</td>
            <td>{{$laporan->hasil_deteksi}}</td>
            <td>{{$laporan->kegiatan}}</td>
            <td>{{$laporan->tanggal}}</td> --}}
            <td>
                <form method="POST" action="{{ route('laporan.delete', $laporan->no) }}">
                  @csrf
                  <a href="/laporan/detail/{{$laporan->no}}" class="btn btn-sm" style=" background: blue; color: white;">Detail</a>
                  <a href="/laporan/edit/{{$laporan->no}}" class="btn btn-sm btn-warning">Edit</a>
                  <input name="_method" type="hidden" value="Delete">
                  <button type="submit" class="btn btn-sm btn-flat show_confirm" style=" background: red; color: white;" data-toggle="tooltip" title='Delete'>Delete</button>
                </form> 
              {{-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$laporan->no}}">Delete
              </button> --}}
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
 
</div>

<!-- Tabel Pengujian Alat dengan berbagai kondisi uang -->
<div class="card-body">
  <div class="card-header">
    <h3 style="text-align: center">Pengujian Nominal Uang Kertas Kondisi Rapi</h3>
    <div align ="right">
      <a href="{{ url('rapi/print') }}" class="btn btn-sm" style=" background: green; color: white;"><i class="fa fa-file-pdf-o"></i> Download PDF</a>
      <a href="/addpengujian" class="btn btn-sm" style=" background: blue; color: white;">Tambah Data</a><br>
      
    </div>
  </div>
  <table class="table table-bordered">
   
    
      <tr>
        <th>No</th>
        <th>Nominal Uang</th>
        <th>Jumlah Percobaan</th>
        <th>Terdeteksi</th>
        <th>Tidak Terdeteksi</th>
        <th>Persentase</th>
        <th>Action</th>
      </tr>
      <?php
      $mysqli = new mysqli("localhost", "root", "", "project2");
      if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
      }
      ?>
    <tbody>
      <?php $no=1;?>
    
      @foreach ($data2 as $pengujian)
      
      <tr>
          <td>{{$no++}}</td>
          <td>{{$pengujian->nominal_uang}}</td>
          <td>{{$pengujian->jumlah_percobaan}}</td>
          <td>{{$pengujian->terdeteksi}}</td>
          <td>{{$pengujian->tidak_terdeteksi}}</td>
          <td>{{$pengujian->presentase}}</td>
          <td>
            {{-- <form method="POST" action="{{ route('pengujian.delete', $pengujian->no) }}"> --}}
              {{-- @csrf --}}
              <a href="/pengujian/edit/{{$pengujian->no}}" class="btn btn-sm btn-warning">Edit</a>
              {{-- <input name="_method" type="hidden" value="Delete">
              <button type="submit" class="btn btn-sm btn-flat show_confirm" style=" background: red; color: white;" data-toggle="tooltip" title='Delete'>Delete</button>
            </form>  --}}
         
        </td>
      </tr>

      @endforeach
     </tbody>
    <tfoot>
      <tr>
        <th colspan="5" style="text-align: center">Rata-rata Persentase</th>
        <th>93%</th>
      </tr>
    </tfoot>
  </table>
  <!-- /.card-body -->
  
</div>
<div class="card-body">
  <div class="card-header">
    <h3 style="text-align: center">Pengujian Nominal Uang Kertas Kondisi Lecek</h3>
    <div align ="right">
      <a href="{{ url('lecek/print') }}" class="btn btn-sm" style=" background: green; color: white;"><i class="fa fa-file-pdf-o"></i> Download PDF</a>
      <a href="/addlecek" class="btn btn-sm" style=" background: blue; color: white;">Tambah Data</a><br>
    </div>
  </div>
  <table class="table table-bordered">
    
      <tr>
        <th>No</th>
        <th>Nominal Uang</th>
        <th>Jumlah Percobaan</th>
        <th>Terdeteksi</th>
        <th>Tidak Terdeteksi</th>
        <th>Persentase</th>
        <th>Action</th>
      </tr>
   
    <tbody>
      <?php $no=1;?>
      @foreach ($data3 as $lecek)
      <tr>
          <td>{{$no++}}</td>
          <td>{{$lecek->nominal_uang}}</td>
          <td>{{$lecek->jumlah_percobaan}}</td>
          <td>{{$lecek->terdeteksi}}</td>
          <td>{{$lecek->tidak_terdeteksi}}</td>
          <td>{{$lecek->presentase}}</td>
          <td> <a href="/lecek/edit/{{$lecek->no}}" class="btn btn-sm btn-warning">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5" style="text-align: center">Rata-rata Persentase</th>
        <th>87%</th>
      </tr>
    </tfoot>
  </table>
  <!-- /.card-body -->
  
</div>

<div class="card-body">
  <div class="card-header">
    <h3 style="text-align: center">Pengujian Nominal Uang Kertas Kondisi Basah</h3>
    <div align ="right">
      <a href="{{ url('basah/print') }}" class="btn btn-sm" style=" background: green; color: white;"><i class="fa fa-file-pdf-o"></i> Download PDF</a>
      <a href="/addbasah" class="btn btn-sm" style=" background: blue; color: white;">Tambah Data</a><br>
    </div>
  </div>
  <table class="table table-bordered">
    
      <tr>
        <th>No</th>
        <th>Nominal Uang</th>
        <th>Jumlah Percobaan</th>
        <th>Terdeteksi</th>
        <th>Tidak Terdeteksi</th>
        <th>Persentase</th>
        <th>Action</th>
      </tr>
   
    <tbody>
      <?php $no=1;?>
      @foreach ($data4 as $basah)
      <tr>
          <td>{{$no++}}</td>
          <td>{{$basah->nominal_uang}}</td>
          <td>{{$basah->jumlah_percobaan}}</td>
          <td>{{$basah->terdeteksi}}</td>
          <td>{{$basah->tidak_terdeteksi}}</td>
          <td>{{$basah->presentase}}</td>
          <td> <a href="/basah/edit/{{$basah->no}}" class="btn btn-sm btn-warning">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5"  style="text-align: center">Rata-rata Persentase</th>
        <th>71%</th>
      </tr>
    </tfoot>
  </table>
  <!-- /.card-body -->
 
</div>

<div class="card-body">
  <div class="card-header">
    <h3 style="text-align: center">Pengujian Nominal Uang Kertas Kondisi Warna Pudar</h3>
    <div align ="right">
      <a href="{{ url('pudar/print') }}" class="btn btn-sm" style=" background: green; color: white;"><i class="fa fa-file-pdf-o"></i> Download PDF</a>
      <a href="/addpudar" class="btn btn-sm" style=" background: blue; color: white;">Tambah Data</a><br>
    </div>
  </div>
  <table class="table table-bordered">
    
      <tr>
        <th>No</th>
        <th>Nominal Uang</th>
        <th>Jumlah Percobaan</th>
        <th>Terdeteksi</th>
        <th>Tidak Terdeteksi</th>
        <th>Persentase</th>
        <th>Action</th>
      </tr>
   
    <tbody>
      <?php $no=1;?>
      @foreach ($data5 as $pudar)
      <tr>
          <td>{{$no++}}</td>
          <td>{{$pudar->nominal_uang}}</td>
          <td>{{$pudar->jumlah_percobaan}}</td>
          <td>{{$pudar->terdeteksi}}</td>
          <td>{{$pudar->tidak_terdeteksi}}</td>
          <td>{{$pudar->presentase}}</td>
          <td> <a href="/pudar/edit/{{$pudar->no}}" class="btn btn-sm btn-warning">Edit</a></td>
      </tr>
      @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th colspan="5" style="text-align: center">Rata-rata Persentase</th>
        <th>53%</th>
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
{{-- <script>
  window.addEventListener("load", window.print());
</script> --}}
<!-- /.card -->
<div class="card-body">
  <h3> Kesimpulan </h3>
  <p>Dari data laporan pengujian di atas dapat disimpulkan bahwa uang kertas yang mudah dideteksi oleh DF Arduino adalah dengan urutan sebagai berikut:  </p>
</div>
<div class="card-body">
  <div class="card-header">
    {{-- <div align ="right">
      <a href="{{ url('kesimpulan/print') }}" class="btn btn-sm" style=" background: green; color: white;"><i class="fa fa-file-pdf-o"></i> Print PDF</a>
    </div> --}}
  </div>
  <table class="table table-bordered">
    
      <tr>
        <th style="width: 10%">No</th>
        <th style="width: 10%">Kondisi</th>
        <th style="width: 10%">Presentase Keberhasilan</th>
      </tr>
   
    <tbody>
      <?php $no=1;?>
     
      <tr>
        <td>{{$no++}}</td>
        <td>Rapi</td>
        <td> <span class="badge bg-success">93%</span></td>
      </tr>
      <tr>
        <td>{{$no++}}</td>
        <td>Lecek</td>
        <td><span class="badge bg-success">87%</span></td>
      </tr>
      <tr>
        <td>{{$no++}}</td>
        <td>Basah</td>
        <td> <span class="badge bg-warning">71%</span></td>
      </tr>
      <tr>
        <td>{{$no++}}</td>
        <td>Warna Pudar</td>
        <td><span class="badge bg-danger">53%</span></td>
      </tr>
      
    </tbody>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Anda yakin ingin menghapus data ini?`,
              text: "jika dihapus, data akan hilang selamanya",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>

@endsection


