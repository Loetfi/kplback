@extends('layouts.template')

@section('js')
<!-- Vendors: Data tables -->
<script src="{{ asset('frontend/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>
@endsection


@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $title }} </h4>
        <h6 class="card-subtitle">{{ $desc }}</h6>
        
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        
        @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        
        @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        
        @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>
        @endif
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            Please check the form below for errors
        </div>
        @endif
        
        <div class="well">
            <p>Aksi</p>
            {{-- @if ($data->header->approval == 1)
            <a class="btn btn-primary btn-sm" href="#">Approve</a>
            @elseif ($data->header->approval == 0)
            <a class="btn btn-danger btn-sm" href="#">Reject</a>
            @else  --}}
            <a href="{{ url('toko/approval/'.$data->header->id_order.'/1')}}" class="btn btn-primary btn-sm">Approve</a>
            <a href="{{ url('toko/approval/'.$data->header->id_order.'/0')}}" class="btn btn-danger btn-sm">Reject</a>
            {{-- @endif --}}
            
        </div>
        
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
                        @if ($data->header->approval == 0) <a href="" class="btn btn-default btn-sm">Belum diApprove</a> 
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
