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
            <a href="{{ url('travel/bus/approval/'.$data->header->id_order.'/1')}}" class="btn btn-primary btn-sm">Approve</a>
            <a href="{{ url('travel/bus/approval/'.$data->header->id_order.'/0')}}" class="btn btn-danger btn-sm">Reject</a>
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
                        <td>{{ date('d F Y H:i:s' , strtotime($data->header->tanggal_order)) }}</td>
                    </tr>
                    <tr>
                            <td>Nama Pemesan</td>
                            <td>:</td>
                            <td>{{ $data->header->nama }}</td>
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
                
                @foreach ($data->detail as $d)
                <table class="table table-bordered table-hover">
                    <tr>
                        <td>Nama Item</td>
                        <td>:</td>
                        <td>{{ $d->nama_layanan}} {{ $d->nama_kategori}}</td>
                    </tr>
                    <tr>
                        <td>Waktu Keberangkatan</td>
                        <td>:</td>
                        <td>{{ date('d F Y H:i:s' , strtotime($d->waktu_keberangkatan)) }}</td>
                    </tr>
                    <tr>
                        <td>Kursi Kelas</td>
                        <td>:</td>
                        <td>{{ $d->kursi_kelas }} </td>
                    </tr>
                    <tr>
                        <td>Dari</td>
                        <td>:</td>
                        <td>{{ $d->dari }}</td>
                    </tr>
                    <tr>
                        <td>Ke</td>
                        <td>:</td>
                        <td>{{ $d->ke }}</td>
                    </tr>
                    <tr>
                        <td>Jumlah Penumpang</td>
                        <td>:</td>
                        <td>{{ $d->penumpang }}</td>
                    </tr>
                    
                    <tr>
                        <td rowspan="3">Detail Penumpang</td>
                        <td rowspan="3">:</td>
                        <td>    
                            @php ($penumpang = explode(';',$d->nama_penumpang))
                            @foreach ($penumpang as $items)
                            <tr>
                                <td>{{ $items }}</td>
                            </tr>
                            @endforeach
                        </td>
                    </tr>
                    
                </table> 
                @endforeach
                
                
            </div>
        </div>
    </div>
    
    @endsection
    