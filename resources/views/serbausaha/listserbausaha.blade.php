@extends('layouts.template')
@section('title',$title)

@section('content')

<div class="container-fluid">
	<div class="row">
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-plane"></i> <a href="{{ url('serbausaha/ruangmeeting') }}">Ruang Meeting</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-utensils"></i> <a href="{{ url('serbausaha/konsumsirapat') }}">Konsumsi Rapat</a></h6>
			</div> 
		</div>
	</div> 
</div>
</div>

 

@endsection
