@extends('layouts.template')
@section('title',$title)

@section('js')
<!-- Vendors: Data tables -->
<script src="{{ asset('frontend/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>
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
            <p>Aksi</p>
                
                @if ($data->header->approval == 1)
                    <a class="btn btn-primary btn-sm" href="#">Approve</a>
                @elseif ($data->header->approval == '0')
                    <a class="btn btn-danger btn-sm" href="#">Reject</a>
                    <br><br>
                @else 
                    <a href="{{ url('toko/approval/'.$data->header->id_order.'/1')}}" class="btn btn-primary btn-sm">Approve</a>
                    <a href="{{ url('toko/approval/'.$data->header->id_order.'/0')}}" class="btn btn-danger btn-sm">Reject</a>
                @endif
                
                
            
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>ID Order</td>
                        <td>:</td>
                        <td>{{ $data->header->id_order }}</td>
                    </tr>
                    <tr>
                        <td>Tanggal Order</td>
                        <td>:</td>
                        <td>{{ $data->header->tanggal_order }}</td>
                    </tr>
                    <tr>
                        <td>Nama Layanan</td>
                        <td>:</td>
                        <td>{{ $data->header->nama_layanan }}</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($data->header->total,2) }}</td>
                    </tr>
                    <tr>
                        <td>Status Approval</td>
                        <td>:</td>
                        <td>
                            @if ($data->header->approval == '') <a href="" class="btn btn-default btn-sm">Belum diApprove</a> 
                            @elseif ($data->header->approval == 1) <a href="" class="btn btn-primary btn-sm">Sudah di Approve </a>
                            @else
                            <a href="" class="btn btn-danger btn-sm">Tidak di Approve</a>
                            @endif
                        </td>
                    </tr>
                </table>
                {{-- {{ print_r($data)}} --}}
                
                @foreach ($data->detail as $d)
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>Nama Barang</td>
                        <td>:</td>
                        <td>{{ $d->nama_barang}}</td>
                    </tr>
                    <tr>
                        <td>Qty</td>
                        <td>:</td>
                        <td>{{ $d->qty}}</td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($d->harga_barang)}}</td>
                    </tr>
                    
                </table> 
                @endforeach
                
                
            </div>
        </div>
    </div>
    
    @endsection
    