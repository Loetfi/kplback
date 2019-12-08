@extends('layouts.template')
@section('title',$title)

@section('js')
<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-bar-demo.js"></script>
<script>
	// Set new default font family and font color to mimic Bootstrap's default styling
	Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
	Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("topbar");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {

    labels: [ @foreach($top_barang_laku as $tbl) "{!! \App\Http\Helpers\Helper::getNamaBarang($tbl->barangid) !!}", @endforeach  ],
    datasets: [{
      label: "Terjual",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [@foreach($top_barang_laku as $tbl) {{ $tbl->banyak }} , @endforeach ],
    }],
  },
  options: { 
  }
});


// Area Chart Example
var ctx = document.getElementById("belanjachart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [@foreach($penjualan_toko as $pt) "{{ date('d M Y', strtotime($pt->tanggal)) }}" , @endforeach],
    datasets: [{
      label: "Pemasukan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [@foreach($penjualan_toko as $pt) {{ $pt->belanja }} , @endforeach]
    }
  ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp. ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});
</script>

@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard - Cashflow Toko</h1>
	</div> 

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->
		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Cashflow Toko</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="belanjachart"></canvas>
					</div>
				</div>
			</div>
		</div>

		<!-- Pie Chart -->
		<div class="col-xl-6 col-lg-6">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">TOP 10 Barang Paling Laris </h6>
				</div>
				<div class="card-body">
					<div class="chart-pie pt-4 pb-2">
						<canvas id="topbar"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>



</div>
<!-- /.container-fluid -->




@endsection
