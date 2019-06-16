@extends('layouts.template')
@section('content')

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Basic example</h4>

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
