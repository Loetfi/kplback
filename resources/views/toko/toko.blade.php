@extends('layouts.template')
@section('title',$title)
 
@section('js') 

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
@endsection

@section('css')
    <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
    
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th>IDOrder</th>
                        <th>tanggal order</th>
                        <th>Nama</th>
                        <th>total</th>
                        <th>status approval</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $d->id_order }}</td>
                            <td>{{ date('d F Y H:i:s' ,strtotime($d->tanggal_order)) }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>Rp. {{ number_format($d->total) }}</td>
                            <td>
                                @if ($d->approval == '') <a href="" class="btn btn-default btn-sm">Belum diApprove</a> 
                                @elseif ($d->approval == 1) <a href="" class="btn btn-primary btn-sm">Sudah di Approve </a>
                                @else
                                <a href="" class="btn btn-danger btn-sm">Tidak di Approve</a>
                                @endif
                                
                            </td>
                            <td> <a href="{{ url('toko/detail/'.$d->id_order) }}" class="btn btn-sm btn-success">Detail</a> </td>
                        </tr> 
                        @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
    
</div>
@endsection

 
