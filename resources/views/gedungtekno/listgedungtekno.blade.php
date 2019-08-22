@extends('layouts.template')
@section('title',$title)

@section('content')

<div class="container-fluid">
    <div class="row">
        
        @foreach ($kategori as $kat)
        
        <div class="col-sm-3">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"><i class="fa fa-fw fa-hotel"></i> <a href="{{ url('gedungtekno/id_kat/'.$kat['id'].'/'.$kat['nama']) }}">{{ $kat['nama'] }}</a></h6>
                </div> 
            </div>
        </div>
        
        
        @endforeach 
    </div>
</div>



@endsection
