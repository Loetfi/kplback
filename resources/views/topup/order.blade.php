@extends('layouts.template')
@section('title',$title)

@section('content')

<div class="container-fluid">
	<div class="row">
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-signal"></i> <a href="{{ url('topup/pulsa') }}">Pulsa</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-mobile"></i> <a href="{{ url('topup/paketdata') }}">Paket Data</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-plug"></i> <a href="{{ url('topup/tagihanlistrik') }}">Tagihan Listrik</a></h6>
			</div> 
		</div>
	</div>
	<div class="col-sm-3">
		<div class="card shadow mb-4">
			<div class="card-header">
				<h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-bolt"></i> <a href="{{ url('topup/tokenlistrik') }}">Token PLN</a></h6>
			</div> 
		</div>
	</div>
</div>
</div>

 

@endsection
