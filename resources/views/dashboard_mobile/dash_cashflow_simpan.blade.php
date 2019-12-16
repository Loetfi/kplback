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
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Simpnanan Wajib", "Simpanan Pokok", "Simpanan Sukarela"],
    datasets: [{
      data: [
      {{ $total_simpanan_wajib }} , 
      {{ $total_simpanan_pokok }} ,
      {{ $total_simpanan_sukarela }}  
      ],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});


</script>

@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard - Cashflow Simpanan</h1>
	</div> 

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->


		<!-- Pie Chart -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Jumlah simpanan sampai dengan saat ini </h6>
				</div>
				<div class="card-body">
					<div class="chart-pie pt-12 pb-12">
						<canvas id="myPieChart"></canvas>
					</div>
          <table class="table table-responsive table-hover table-condensed">
            <tr>
              <td>Simpanan Wajib</td>
              <td>{{ number_format($total_simpanan_wajib) }}</td>
            </tr> 
            <tr>
              <td>Simpanan Pokok</td>
              <td>{{ number_format($total_simpanan_pokok) }}</td>
            </tr>
            <tr>
              <td>Simpanan Sukarela</td>
              <td>{{ number_format($total_simpanan_sukarela) }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>

  </div>



</div>
<!-- /.container-fluid -->




@endsection
