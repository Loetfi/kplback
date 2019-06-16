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
        <h4 class="card-title">Data Order Pesawat</h4>
        <!-- <h6 class="card-subtitle">DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</h6> -->

        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">
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
                    

                </tbody></table></div>
            </div>
            
        </div>
        @endsection
