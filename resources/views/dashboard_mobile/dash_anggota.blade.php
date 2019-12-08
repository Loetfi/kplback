@extends('layouts.template')
@section('title',$title)

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	
	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Dashboard - Anggota</h1>
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
							
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<a href="{{ url('dashboard_mobile/anggota/list/aktif') }}">
									{{ $anggota_aktif }}
								</a>
							</div>
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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								<a href="{{ url('dashboard_mobile/anggota/list/pasif') }}">
									Anggota Pasif / Pensiun
								</a>
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<a href="{{ url('dashboard_mobile/anggota/list/pasif') }}">
									{{ $anggota_p }}
								</a>
							</div>
							<a href="{{ url('dashboard_mobile/anggota/list/pasif') }}">Lihat Detail </a>
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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								<a href="{{ url('dashboard_mobile/anggota/list/pegawai') }}">
									Anggota P2 / Pegawai 
								</a>
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<a href="{{ url('dashboard_mobile/anggota/list/pegawai') }}">
									{{ $anggota_p2 }}
								</a>
							</div>
							<a href="{{ url('dashboard_mobile/anggota/list/pegawai') }}">Lihat Detail </a>
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
							<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
								<a href="{{ url('dashboard_mobile/anggota/list/luarbiasa') }}">
									Anggota Luar Biasa
								</a>
							</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800">
								<a href="{{ url('dashboard_mobile/anggota/list/luarbiasa') }}">
									{{ $anggota_luar_biasa }}
								</a>
							</div>
							<a href="{{ url('dashboard_mobile/anggota/list/luarbiasa') }}">Lihat Detail </a>
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
