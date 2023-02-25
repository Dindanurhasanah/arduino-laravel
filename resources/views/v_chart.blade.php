@section('title')
Chart
@endsection
@extends('layouts.app')
@section('page')
Halaman Chart
@endsection
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }
    
    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }
    
    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }
    
    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }
    
    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }
    
    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }
    
    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }
    
    #button-bar {
        min-width: 310px;
        max-width: 800px;
        margin: 0 auto;
    }
</style>
</head>
<body>
   
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="tb_pengujian"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$mysqli = new mysqli("localhost", "root", "", "project2");


if ($mysqli->connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  exit();
}
?>

<script src="assets/highcharts/highcharts.js"></script>
<script src="assets/highcharts/exporting.js"></script>
<script src="assets/highcharts/export-data.js"></script>
<script src="assets/highcharts/accessibility.js"></script>
<script>
    var chart = Highcharts.chart('tb_pengujian', {

chart: {
    type: 'column'
},

title: {
    text: 'Grafik Pengujian DF Arduino'
},

// subtitle: {
//     text: 'Resize the frame or click buttons to change appearance'
// },

legend: {
    align: 'right',
    verticalAlign: 'middle',
    layout: 'vertical'
},

xAxis: {
    categories: ['Rp. 1000','Rp. 2000','Rp. 5000','Rp. 10.000','Rp. 20.000','Rp. 50.000','Rp. 100.000'],
    title: {
        text: 'Nominal Uang'
    }, 
    labels: {
      x: -10
    }
   
},

yAxis: {
    min: 0,
    allowDecimals: true,
    title: {
        text: 'Persentase Keberhasilan'
    }
},

series: [{
    name: 'Rapi',
    data: [80, 80, 90, 100, 100,100,100]
}, {
    name: 'Lecek',
    data: [70, 80, 70,90,100,100,100]
}, {
    name: 'Basah',
    data: [80,70, 60, 70, 70,80,70]
}, {
    name: 'Warna Pudar',
    data: [50, 60, 40, 50,40,70,60]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                align: 'center',
                verticalAlign: 'bottom',
                layout: 'horizontal'
            },
            yAxis: {
                labels: {
                    align: 'left',
                    x: 0,
                    y: -5
                },
                title: {
                    text: 'Persentase Keberhasilan'
                }
            },
            subtitle: {
                text: null
            },
            credits: {
                enabled: false
            }
        }
    }]
}
});

document.getElementById('small').addEventListener('click', function () {
chart.setSize(400);
});

document.getElementById('large').addEventListener('click', function () {
chart.setSize(600);
});

document.getElementById('auto').addEventListener('click', function () {
chart.setSize(null);
});

</script>


{{-- <figure class="highcharts-figure">
   
    <p class="highcharts-description">
        This demo shows how breakpoints can be defined in order to
        change the chart options depending on the screen width. All
        charts automatically scale to the container size, but in this
        case we also change the positioning of the legend and axis
        elements to accomodate smaller screens.
    </p>
</figure> --}}

{{-- <div id="button-bar">
    <button id="small">Kecil</button>
    <button id="large">Besar</button>
    <button id="auto">Auto</button>
</div>  --}}

</body>
</html>
@endsection


