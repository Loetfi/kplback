@extends('layouts.template')
@section('title',$title)
 

@section('content')
<div class="container-fluid">
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $title }} </h4>
        <h6 class="card-subtitle">{{ $desc }}</h6>


        <div class="table-responsive">

            <form action="{{ url('promo/edit/'.$data->id_promo) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Nama Promo</label>
                    <input type="text" class="form-control" id="" name="nama_promo" placeholder="Input field" value="{{ $data->nama_promo }}">
                </div>

                <div class="form-group">
                    <label for="">Gambar Promo</label>
                    <div class="alert alert-info">
                        Ganti ukuran gambar dengan ukuran <b>1242 x 417 pixels </b>
                    </div>
                    <img src="{{ $data->url_promo }}" width="300px">
                    <br>
                    <input type="file" name="file">

                </div>

                <div class="form-group">
                    <label for="">Status Promo</label>
                    <select class="form-control" name="status">
                        <option value="1" @if ($data->status === 1) selected="" @endif>Aktif</option>
                        <option value="0" @if ($data->status === 0) selected="" @endif>Tidak Aktif</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Position</label>
                    {{ $data->position }}
                    <select class="form-control" name="position">
                        <option value="1" @if ($data->position == 1) selected=""  @endif>Pertama</option>
                        <option value="2" @if ($data->position == 2) selected="" @endif>Kedua</option>
                        <option value="3" @if ($data->position == 3) selected=""  @endif>Ketiga</option>
                        <option value="4" @if ($data->position == 4) selected=""  @endif>Keempat</option>
                        <option value="5" @if ($data->position == 5) selected=""  @endif>Kelima</option>
                        <option value="6" @if ($data->position == 6) selected=""  @endif>Keenam</option>
                        <option value="7" @if ($data->position == 7) selected=""  @endif>Ketujuh</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
