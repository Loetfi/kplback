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
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
    
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{$title}}</h6>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                            <th> ID Order </th>
                        <th>Nama Layanan</th>
                        <th>Tanggal</th>
                        <th>Nama Anggota</th>
                        <th>Nama Menu</th>
                        <th>Nama Hotel</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Tamu</th>
                        <th>Jumlah Kamar</th>
                        <th>Approval</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach ($list as $lists)
                    <tr>
                        <td>{{ $lists->id_order }}</td>
                        <td>{{ $lists->nama_layanan }}</td>
                        <td>{{ $lists->tanggal_order }}</td>
                        <td>{{ $lists->nama }}</td>
                        <td>{{ $lists->nama_kategori }}</td>
                        <td>{{ $lists->nama_hotel }}</td>
                        <td>{{ date('d F Y',strtotime($lists->check_in)) }}</td>
                        <td>{{ date('d F Y',strtotime($lists->check_out)) }}</td>
                        <td>{{ $lists->tamu }}</td>
                        <td>{{ $lists->rooms }}</td>
                        <td>
                            @if ($lists->approval == '') <a href="" class="btn btn-default btn-sm">Belum diApprove</a> 
                            @elseif ($lists->approval == 1) <a href="" class="btn btn-primary btn-sm">Sudah di Approve </a>
                            @else
                            <a href="" class="btn btn-danger btn-sm">Tidak di Approve</a>
                            @endif
                            
                        </td>
                        <td><a href="{{ url('travel/hotel/detail/'.$lists->id_order) }}" class="btn btn-primary btn-sm">Detail</a></td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
    
</div>
@endsection



