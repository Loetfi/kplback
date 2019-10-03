@extends('layouts.template')

@section('js')
<!-- Vendors: Data tables -->
<script src="{{ asset('frontend/vendors/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('frontend/vendors/datatables-buttons/buttons.html5.min.js') }}"></script>
@endsection

@section('title', $title )

@section('content')

<div class="card">
    <div class="card-body">
    <h4 class="card-title">List Data Order {{ $title }}</h4>
        <div class="table-responsive">
        <a href="{{ url('berita/add') }}" class="btn btn-primary btn-sm">Tambah</a>
            <table id="data-table" class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Aksi</th>
                    </tr>
                </thead> 
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id_berita }}</td>
                        <td>{{ date('d F Y' ,strtotime($d->tanggal_berita)) }}</td>
                        <td> <img src="{{ $d->gambar_berita }}" width="100px">  </td>
                        <td>{{ $d->judul_berita }}</td>
                        <td> 
                            <a href="{{ url('berita/detail/'.$d->id_berita) }}" class="btn btn-sm btn-success">Detail</a>
                            <a href="{{ url('berita/edit/'.$d->id_berita) }}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{ url('berita/hapus/'.$d->id_berita) }}" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
