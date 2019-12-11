@extends('layouts.template')
@section('title',$title)


@section('js') 

<!-- Page level plugins -->
<script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('js/demo/datatables-demo.js')}}"></script>
@endsection

@section('css')
<!-- Custom styles for this page -->
<link href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
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
			<div class="card shadow mb-12">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">{{ $name_jenis[0]->nama }} Tahun -   {{ $tahun_shu }} , Status - {{ $status }} </h6>
				</div>
				<div class="card-body"> 
          <table id="dataTable" class="table table-bordered table-responsive">
            <thead class="thead-default">
            <tr>
              <td>Nama Anggota</td>
              <td>Plafon</td>
              <td>Bunga</td>
              <th>Angsuran</th>
              <td>Jangka Waktu</td>
              <td>Angsuran Ke</td>
              <td>Tanggal</td>
            </tr>
          </thead>
            @foreach($by_lunas as $pbn)
            <tr>
              <td> <a href=" {{ url('pengurus/dashboard?anggotaid='.$pbn->anggotaid) }} ">{{ $pbn->nama }}</a> </td>
              <td> Rp. {{ number_format($pbn->plafon , 2 , ',' ,'.') }} </td>
              <td>{{ $pbn->bunga }} %</td>
              <td> Rp. {{ number_format($pbn->nangsuran , 2 , ',' ,'.') }} </td>
              <td>{{ $pbn->jangkawaktu }} / bulan</td>
              <td>{{ $pbn->angsuranke }}</td>
              <td>{{ date('d F Y',strtotime($pbn->tanggal))  }} </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div> 

  </div>



</div>
<!-- /.container-fluid -->




@endsection
