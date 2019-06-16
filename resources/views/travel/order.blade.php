@extends('layouts.template')

@section('js')
<script src="{{ asset('frontend/vendors/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('frontend/vendors/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('frontend/vendors/flot.curvedlines/curvedLines.js') }}"></script>
<script src="{{ asset('frontend/vendors/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/jqvmap/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('frontend/vendors/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/salvattore/salvattore.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/moment/moment.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- Charts and maps-->
<script src="{{ asset('frontend/demo/js/flot-charts/curved-line.js') }}"></script>
<script src="{{ asset('frontend/demo/js/flot-charts/dynamic.js') }}"></script>
<script src="{{ asset('frontend/demo/js/flot-charts/line.js') }}"></script>
<script src="{{ asset('frontend/demo/js/flot-charts/chart-tooltips.js') }}"></script>
<script src="{{ asset('frontend/demo/js/other-charts.js') }}"></script>
<script src="{{ asset('frontend/demo/js/jqvmap.js') }}"></script>

@endsection

@section('content')

<div class="row quick-stats">
	<div class="col-sm-6 col-md-3">
		<div class="quick-stats__item bg-blue">
			<div class="quick-stats__info">
				<a href="{{ url('travel/pesawat') }} "><h2>Pesawat</h2></a>
			</div>
		</div>
	</div>

	<div class="col-sm-6 col-md-3">
		<div class="quick-stats__item bg-green">
			<div class="quick-stats__info">
				<a href=""><h2>Hotel</h2></a>
			</div>
		</div>
	</div>

	<div class="col-sm-6 col-md-3">
		<div class="quick-stats__item bg-purple">
			<div class="quick-stats__info">
				<a href=""><h2>Bus</h2></a>
			</div>
		</div>
	</div>

	<div class="col-sm-6 col-md-3">
		<div class="quick-stats__item bg-red">
			<div class="quick-stats__info">
				<a href=""><h2>Shuttle Bus</h2></a>
			</div>
		</div>
	</div>

	<div class="col-sm-6 col-md-3">
		<div class="quick-stats__item bg-yellow">
			<div class="quick-stats__info">
				<a href=""><h2>Kereta</h2></a>
			</div>
		</div>
	</div>
</div> 

@endsection
