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

    labels: [ @foreach($pinjaman_by_nama as $pbn) ' {{ $pbn->namapinjaman }}' , @endforeach  ],
    datasets: [{
      label: "Total Pinjaman ",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [@foreach($pinjaman_by_nama as $pbn) {{ $pbn->jumlahplafon }} , @endforeach ],
    }],
  },
  options: { 
  }
});


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

@php $i = 0; $j=0; @endphp
@foreach($alljenis as $aj)


// Pie Chart Example
var ctx = document.getElementById("Lunas{{$aj->id}}");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Lunas", "Belum"],
    datasets: [{
      data: [{{ $lunasbelum_by_jenis[$i][0]->lunas }} , {{ $lunasbelum_by_jenis[$i][0]->belumlunas }} ],
      backgroundColor: ['#15d66c', '#e01047', '#36b9cc'],
      hoverBackgroundColor: ['#09ed70', '#ff0043', '#2c9faf'],
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
    cutoutPercentage: 10,
  },
});
@php $i++; $j++; @endphp
@endforeach


</script>

@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard - Cashflow Pinjaman</h1>
	</div> 

	<!-- Content Row -->

	<div class="row">

		<!-- Area Chart -->


		<!-- Pie Chart -->
		<div class="col-xl-12 col-lg-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Jumlah Plafon by Kategori Pinjaman  {{ $tahun_shu }} </h6>
				</div>
				<div class="card-body">
					<div class="chart-pie pt-4 pb-2">
						<canvas id="topbar"></canvas>


					</div>
          <table class="table table-responsive table-hover table-condensed">
            <tr>
              <td>Nama</td>
              <td>Jumlah</td>
            </tr>
            @foreach($pinjaman_by_nama as $pbn)
            <tr>
              <td> <a href=" {{ url('#') }} ">{{ $pbn->namapinjaman }}</a> </td>
              <td> Rp. {{ number_format($pbn->jumlahplafon , 2 , ',' ,'.') }} </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>

@php $i = 0; @endphp
    @foreach($alljenis as $aj)

    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Pinjaman Jenis {{ $aj->nama }}</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4">
            <canvas id="Lunas{{ $aj->id }}"></canvas>
          </div>

           <table class="table table-responsive table-hover table-condensed">
            <tr>
              <td>Lunas</td>
              <td>Belum</td>
            </tr>
            <tr>
              <td><a href="#"> {{ $lunasbelum_by_jenis[$i][0]->lunas }} </a></td> 
              <td><a href="#"> {{ $lunasbelum_by_jenis[$i][0]->belumlunas }} </a></td>
            </tr>
          </table>

        </div>
      </div>
    </div>

    @php $i++; @endphp
    @endforeach

  </div>



</div>
<!-- /.container-fluid -->




@endsection
