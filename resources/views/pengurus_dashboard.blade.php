@extends('layouts.template_dashboard')

@section('js')
<!-- Page level plugins -->
<script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('js/demo/chart-pie-demo.js') }}"></script>

@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
	<br><br>
	<div class="row">
		
		<div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Body -->
				<div class="card-body">
					<div class="alert alert-default" role="alert">
						<h4 class="alert-heading">Hai , {{ $anggota->nama }}</h4>
					</div>
					<div class="alert alert-primary">
						SHU Modal: Rp. - ( akan hadir )
					</div>
					<div class="alert alert-info">
						SHU Toko: Rp. {{ $final_laba_toko_per_orang }} 
					</div>
					<div class="alert alert-warning">
						SHU SP: Rp. - ( akan hadir )
					</div>
					<div id="accordianId" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="section1HeaderId">
								<h5 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
							  Transaksi Pembelian
							</a>
								</h5>
							</div>
							<div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">
								<div class="card-body">
										<table class="table table-responsive">
												<thead>
													<tr>
														<th>Tanggal</th>
														<th>Total Belanja</th>
														<th>Tempo</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($penjualan as $d)
													<tr>
														<td scope="row">{{ date('d F Y',strtotime($d->tanggal)) }}</td>
														<td>Rp. {{ number_format($d->bayar) }}</td>
														<td>{{ $d->tempo}} Hari</td>
													</tr>
													@endforeach 
												</tbody>
											</table>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-header" role="tab" id="section2HeaderId">
								<h5 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
											Transaksi Pinjaman
							</a>
								</h5>
							</div>
							<div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
								{{-- <div class="card-body"> --}}
										<table class="table table-responsive">
												<thead>
													<tr>
														<th>Nama Pinjaman</th>
														<th>Total Belanja</th>
														<th>Angsuran</th>
														<th>Nilai Angsuran</th>
														<th>Plafon</th>
														<th>Bunga</th>
														<th>Jangka Waktu</th>
														<th>Angsuran ke</th>
														<th>Sisa Angsuran</th>
														<th>Kantor</th>
														
													</tr>
												</thead>
												<tbody> 
													@foreach ($pinjaman as $d)
													<tr>
														<td scope="row">{{ date('d F Y',strtotime($d->tanggal)) }}</td>
														<td>{{ $d->namapinjaman}}</td>
														<td>{{ $d->angsuran }}</td>
														<td>Rp. {{ number_format($d->nangsuran) }} / {{ $d->satuan }}</td>
														<td>Rp. {{ number_format($d->plafon) }}</td>
														<td>{{ $d->bunga}}%</td>
														<td>{{ $d->jangkawaktu }}</td>
														<td>{{ $d->angsuranke }}</td>
														<td>
															@if ($d->angsuranke < 1)
															<a class="btn btn-success btn-sm btn-disabled"> Lunas </a>
															@elseif($d->angsuranke > 0)
															{{ $d->jangkawaktu -  $d->angsuranke }}
															@endif
															
														</td>
														<td>{{ $d->namakantor }}</td>
														
													</tr>
													@endforeach 
												</tbody>
											</table>
								{{-- </div> --}}
							</div>
						</div>

						<!-- simpanan -->

						<div class="card">
							<div class="card-header" role="tab" id="section3HeaderId">
								<h5 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId" aria-expanded="true" aria-controls="section2ContentId">
											Transaksi Simpanan
							</a>
								</h5>
							</div>
							<div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
								{{-- <div class="card-body"> --}}
										<table class="table table-responsive">
												<thead>
													<tr>
														<th>Nama Simpanan</th>
														<th>Saldo</th> 
													</tr>
												</thead>
												<tbody> 
													@foreach ($simpanan as $d)
													<tr>
														<td>{{ $d['simpanan'] }}</td>
														<td>Rp. {{ $d['saldo'] }}</td>
													</tr>
													@endforeach 
												</tbody>
											</table>
								{{-- </div> --}}
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		{{-- <!-- Area Chart -->
		<div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Cashflow</h6>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="myAreaChart"></canvas>
					</div>
				</div>
			</div>
		</div>
		 --}}
		<!-- Pie Chart -->
		{{-- <div class="col-xl-4 col-lg-5">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Sumber Pendapatan</h6>
					<div class="dropdown no-arrow">
						<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
							<div class="dropdown-header">Dropdown Header:</div>
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-pie pt-4 pb-2">
						<canvas id="myPieChart"></canvas>
					</div>
					<div class="mt-4 text-center small">
						<span class="mr-2">
							<i class="fas fa-circle text-primary"></i> Direct
						</span>
						<span class="mr-2">
							<i class="fas fa-circle text-success"></i> Social
						</span>
						<span class="mr-2">
							<i class="fas fa-circle text-info"></i> Referral
						</span>
					</div>
				</div>
				
				
			</div>
		</div> --}}
	</div>
	
	
	
	
	
</div>


{{-- <div class="container-fluid">
	<!-- Content Row -->
	<div class="row">
		
		<div class="col-lg-6 mb-4">
			
			<!-- Approach -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
				</div>
				<div class="card-body">
					<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
					<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
				</div>
			</div>
			
		</div>
	</div>
</div> --}}
<!-- /.container-fluid -->




@endsection
