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
				<a class="btn btn-sm btn-primary" href="{{ url('pengurus/dashboard?anggotaid='.$anggotaid) }} ">Kembali</a>
				<div class="card-body">

					@if(empty($head_pinjaman))
					<div class="alert alert-warning">
						Pinjaman tidak ditemukan
					</div>
					@php die() @endphp
					@endif

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
						$no = 1;
						@endphp
						@php $jumlah_debit=0; $jumlah_bagi=0;  @endphp
						@foreach ($pinjaman as $d)
						<tr>
							<td>{{ $no++ }} </td>
							<td>{{ ($d['tanggal'] == '') ? '': date('d F Y',strtotime($d['tanggal'])) }} </td>
							<td>{{ $d['nobukti'] }} </td>
							<td>{{ $d['keterangan'] }} </td>
							<td>{{ number_format($d['debet']) }} </td>
							<td>{{ number_format($d['bagi_hasil']) }} </td>
							<td>{{ $d['kredit'] }} </td>
							<td>{{ $d['tipe'] }} </td>
							<td>{{ $d['user'] }} </td>
						</tr>
						@php $jumlah_debit+=$d['debet'] @endphp
						@php $jumlah_bagi+=$d['bagi_hasil'] @endphp
						@endforeach
						<tr>
							<td colspan="4"><b>Total</b></td>
							<!-- <td></td>
							<td></td>
							<td></td> -->
							<td><b>{{ number_format($jumlah_debit) }}</b></td>
							<td><b>{{ number_format($jumlah_bagi) }}</b></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>

					</table>
				</div>
			</div>
		</div> 
	</div>





</div>

<!-- /.container-fluid -->




@endsection
