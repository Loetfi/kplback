@extends('layouts.template')
@section('title',$title)
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Alokasi Pembagian SHU | SHU Toko & SHU SP</h6>
            </div>
        <div class="card-body">

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        <form action="{{ url('konfigurasi/update') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} 
            <div class="form-group">
                <b>Tahun SHU</b> 

                <div class="alert alert-info">
                        {{ $tahun }}
                </div>
            </div>

            <div class="form-group">
                <b>SHU Toko & SHU SP</b>
                <input type="hidden" name="tahun" value="{{ $tahun }}">
                <input type="text" name="shu_toko_sp" value="{{ @$sumber->shu_toko_sp }}" class="form-control span4">
            </div>

            <div class="form-group">
                <b>SHU Modal/Simpanan</b>
                <input type="text" name="shu_modal" value="{{ @$sumber->shu_modal }}" class="form-control span4">
            </div>

            

            <input type="submit" value="Simpan" class="btn btn-primary">
        </form>

    </div>
</div>

@endsection
