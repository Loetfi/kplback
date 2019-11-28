@extends('layouts.template')
@section('title',$title)

@section('content')
		
		<!-- Begin Page Content -->
		<div class="container-fluid">
			
			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Dashboard Anggota</h1>
			</div>
			
			<!-- Content Row -->
			<div class="row">
				
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="{{ url('dashboard_mobile/anggota/list/aktif') }}">Anggota Aktif</a></div>
									<a href="{{ url('dashboard_mobile/anggota/list/aktif') }}"><div class="h5 mb-0 font-weight-bold text-gray-800">{{ $anggota_aktif }}</div></a>
									<a href="{{ url('dashboard_mobile/anggota/list/aktif') }}">Lihat Detail</a>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anggota Pasif / Pensiun</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $anggota_p }}</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anggota P2 / Pegawai </div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $anggota_p2 }}</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anggota Luar Biasa</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">{{ $anggota_luar_biasa }}</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
			
		</div>
@endsection
