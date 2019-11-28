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
          <table id="dataTable" class="table table-bordered table-responsive">
                <thead class="thead-default">
                    <tr>
                        <th>No Anggota</th>
                        <th>Nama</th> 
                        <th>JK</th>
                        <th>Umur</th>
                        <th>Tgl Lahir</th>
                        <th>Sisa Pensiun</th>
                        <th>Status</th>
                    </tr>
                </thead> 
                <tbody>
                        @foreach ($anggota as $d)
                        <tr>
                            <td><a href="{{ url('dashboard_mobile/anggota/detail/'.$d->id) }}"> {{ $d->noanggota}} </a></td>
                            <td>{{ $d->nama }}</td>
                            <td>@if($d->gender == 1) Pria @else Wanita @endif</td>
                            <td> {{ $tgllahir = number_format(\App\Http\Helpers\Helper::hitungUmur($d->tgllahir)) }} </td>
                            <td>{{ $d->tgllahir }}</td>
                            <td>
                              @if((58 - $tgllahir) >= 0)    
                              <a href="" class="btn btn-success btn-xs disabled"> {{ 58 - $tgllahir }}</a>
                              @else
                              <a href="" class="btn btn-danger btn-xs disabled"> {{ 58 - $tgllahir }}</a>
                              @endif
                             </td>
                            <td>@if($d->aktif) Aktif  @else Belum Aktif @endif </td>

                        </tr> 
                        @endforeach
                </tbody>
            </table>
           
       </div>
   </div>
   
   
</div>
@endsection



