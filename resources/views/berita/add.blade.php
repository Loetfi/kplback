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
            
            <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
            <script>
                tinymce.init({
                    selector: '#tinymceriobermano'
                });
            </script>
            
            
            <form action="{{ url('berita/add') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <div class="form-group">
                    <b>Tanggal</b>
                    <input class="form-control" type="date" name="tanggal">
                </div>
                <div class="form-group">
                    <b>Judul Berita</b>
                    <input class="form-control" name="judulberita">
                </div>
                <div class="form-group">
                    <b>File Gambar</b><br/>
                    <input type="file" name="file">
                </div>
                <div class="form-group">
                    <b>Isi Berita</b>
                    <textarea class="form-control" name="isiberita" id="tinymceriobermano"></textarea>
                </div>
                
                <input type="submit" value="Upload" class="btn btn-primary">
            </form>
            
        </div>
    </div>
    
    @endsection
    