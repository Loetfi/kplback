@extends('layouts.template')
@section('title',$title)
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Promo</h6>
            </div>
        <div class="card-body">

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }} <br/>
            @endforeach
        </div>
        @endif

        <form action="{{ url('promo/add') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <b>File Gambar</b><br/>
                <input type="file" name="file">
            </div>

            <div class="form-group">
                <b>Keterangan</b>
                <textarea class="form-control" name="keterangan"></textarea>
            </div>

            <input type="submit" value="Upload" class="btn btn-primary">
        </form>

    </div>
</div>

@endsection
