
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{ asset('assets') }}/img/LogoArduino.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>DF Arduino</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    
    <!-- DataTables -->
 <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
 <link rel="stylesheet" href="{{asset('template')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets') }}/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('assets') }}/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets') }}/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets') }}/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>


<body>
    

<div class="wrapper">
        @include('layouts.sidebar')
    <div class="main-panel">
        @include('layouts.nav')
    </div>
    {{-- <main class="py-4">
        @yield('content')
    </main> --}}
    {{-- <div class="content">
        <div class="container-fluid">
            <div class="row">
                @yield('content') 
            </div>
        </div>   
    </div>
</div> --}}

<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('template')}}/dist/js/demo.js"></script>

<!-- DataTables  & Plugins -->
<script src="{{asset('template')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('template')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('template')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('template')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 
 <!-- jQuery -->
<script src="{{asset('template')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('template')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>

</body>

    <!--   Core JS Files   -->
    <script src="{{ asset('assets') }}/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="{{ asset('assets') }}/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('assets') }}/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="{{ asset('assets') }}/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets') }}/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{ asset('assets') }}/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{ asset('assets') }}/js/demo.js"></script>



</html>
