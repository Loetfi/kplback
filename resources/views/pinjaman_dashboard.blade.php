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

					<a class="btn btn-sm btn-primary" href="{{ url('pengurus/dashboard?anggotaid='.$anggotaid) }} ">Kembali</a>

					<table class="table table-bordered">
						<tr>
							<td>Nama Pinjaman</td>
							<td>{{ $head_pinjaman[0]->namapinjaman }} </td>
							<td>Jangka Waktu</td>
							<td>{{ $head_pinjaman[0]->jangkawaktu }} bulan</td>
						</tr>
						<tr>
							<td>Plafon</td>
							<td>Rp. {{ number_format($head_pinjaman[0]->plafon) }} </td>
							<td>Jatuh Tempo </td>
							<td></td>
						</tr>
						<tr>
							<td>Angsuran</td>
							<td>Rp. {{ number_format($head_pinjaman[0]->nangsuran) }} </td>
							<td>Total Pinjaman </td>
							<td>Rp. {{ number_format($head_pinjaman[0]->plafon + $bunga_pinjaman ) }} </td>
						</tr>
					</table>

					<table class="table table-bordered">
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>No.Bukti</th>
							<th>Keterangan</th>
							<th>Angsuran Pokok</th>
							<th>Angsuran Bagi Hasil</th>
							<th>Sisa Pinjaman</th>
							<th>SWP</th>
							<th>ID</th>
						</tr>
						@php
						$first = $pinjaman[1]->debet;
						$no = 1;
						@endphp
						@foreach ($pinjaman as $d)
						<tr>
							<td>{{ $no++ }} </td>
							<td>{{ date('d F Y',strtotime($d->tanggal)) }} </td>
							<td>{{ $d->nobukti }} </td>
							<td>{{ $d->keterangan }} </td>
							<td>{{ $d->debet }} </td>
							<td>
								@if($first == $d->debet )
								{{ $bagi_hasil_pertama }}

								@else

								{{ $bunga_pinjaman_bulanan }}
								@endif
							</td>
							<td>{{ $d->kredit }} </td>
							<td>{{ $d->tipe }} </td>
							<td>{{ $d->user }} </td>
						</tr>
						@endforeach

					</table>
				</div>
			</div>
		</div> 
	</div>
	
	
	
	
	
</div>

<!-- /.container-fluid -->




@endsection
