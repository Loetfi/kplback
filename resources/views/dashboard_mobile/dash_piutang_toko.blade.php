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
                        <th>Nama</th>
                        <th>Hutang</th>
                        <!-- <th>Aksi</th>  -->
                    </tr>
                </thead> 
                <tbody>
                        @foreach ($piutang_toko as $d)
                        <tr>
                            <td> <a href="{{ url('dashboard_mobile/piutang_detail/'.$d->id) }}"> {{ $d->nama }} </a></td>
                            <td>Rp. {{ number_format($d->hargajual) }}</td>
                            <!-- <td> <a href="{{ url('dashboard_mobile/piutang_detail/'.$d->id) }}" class="btn btn-primary btn-sm"> Detail </a>   </td>  -->
                        </tr> 
                        @endforeach
                </tbody>
            </table>
           
       </div>
   </div>
   
   
</div>
@endsection



