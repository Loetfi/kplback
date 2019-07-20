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
                        <th>Nama Layanan</th>
                        <th>Tanggal</th>
                        <th>Nama Anggota</th>
                        <th>Nama Menu</th>
                        <th>Dari</th>
                        <th>Ke</th>
                        <th>Penumpang</th>
                        <th>Waktu Keberangkatan</th>
                        <th>Kursi Kelas</th>
                        <th>Nama Penumpang</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach ($list as $lists)
                    <tr>
                        <td>{{ $lists->nama_layanan }}</td>
                        <td>{{ $lists->tanggal_order }}</td>
                        <td>{{ $lists->id_anggota }}</td>
                        <td>Pesawat</td>
                        <td>{{ $lists->dari }}</td>
                        <td>{{ $lists->ke }}</td>
                        <td>{{ $lists->penumpang }}</td>
                        <td>{{ $lists->waktu_keberangkatan }}</td>
                        <td>{{ $lists->kursi_kelas }}</td>
                        <td>{{ $lists->nama_penumpang }}</td>
                        <td><a href="" class="btn btn-primary btn-sm">Detail</a></td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
    
</div>
@endsection



