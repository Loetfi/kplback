@extends('layouts.template')
@section('title',$title)

@section('content')

<div class="container-fluid">
	<div class="row">
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-plane"></i> <a href="{{ url('travel/pesawat') }}">Pesawat</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-hotel"></i> <a href="{{ url('travel/hotel') }}">Hotel</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-car"></i> <a href="{{ url('travel/bus') }}">Bus</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-car"></i> <a href="{{ url('travel/shuttle') }}">Shuttle Bus</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-train"></i> <a href="{{ url('travel/kereta') }}">Kereta</a></h6>
			</div> 
		</div>
	</div> 
</div>
</div>

 

@endsection
