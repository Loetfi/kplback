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

        <a href="{{ url('promo/add') }} " class="btn btn-success btn-sm">Tambah</a>
        <br>


        <div class="table-responsive">
            <table id="data-table" class="table table-bordered">
                <thead class="thead-default">
                    <tr>
                        <th>Nama Promo</th>
                        <th>Gambar Promo</th>
                        <th>Status</th>
                        <th>Position</th>
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

    @endsection
