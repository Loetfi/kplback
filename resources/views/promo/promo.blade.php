@extends('layouts.template')

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
                <h6 class="m-0 font-weight-bold text-primary">Cashflow</h6>
            </div>
        <div class="card-body">
                <table id="dataTable" class="table table-bordered">
                        <thead class="thead-default">
                            <tr>
                                <th>Nama Promo</th>
                                <th>Gambar Promo</th>
                                <th>Status</th>
                                <th>Position</th>
                                <th>Aksi</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->nama_promo }}</td>
                                <td><img src="{{ $d->url_promo }}"  width="200px"></td>
                                <td>
                                    @if ($d->status === 1)
                                    <button type="button" class="btn btn-sm btn-primary disabled">Aktif</button>
                                    @else
                                    <button type="button" class="btn btn-sm btn-danger disabled">Tidak Aktif</button>
                                    @endif
                                </td>
                                <td>{{ $d->position }}</td>
                                <td>
                                    <a href="{{ url('promo/edit/'.$d->id_promo) }} " class="btn btn-primary btn-sm">Edit</a>
                                    <a href="{{ url('promo/delete/'.$d->id_promo) }} " class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
        </div>
    </div>
 
    
</div>
<!-- /.container-fluid -->



@endsection
