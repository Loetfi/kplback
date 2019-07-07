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
        <h4 class="card-title">List Data Order Toko</h4>
        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">
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
                                @if ($d->approval == 0) <a href="" class="btn btn-default btn-sm">Belum diApprove</a> 
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
