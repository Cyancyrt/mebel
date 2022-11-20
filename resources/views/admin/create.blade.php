@extends('layout.admin')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" />

@section('container')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Produk</h2>
        </div>
    </div>

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row d-flex justify-content-center">
            <div class="form-group">
                <strong>Jenis Produk:</strong>
                <input type="text" name="produk" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <strong>image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
            <br>
            <div class="form-group">
                <strong>Nama produk:</strong>
                <input type="text" name="nama" class="form-control" placeholder="">
            </div>
            <br>
            <div class="form-group">
                <strong>Harga:</strong>
                <input type="number" name="harga" class="form-control" placeholder="">
            </div>
            <!-- <div class="form-group">
                <strong>foto:</strong>
                <input type="file" name="image" class="form-control">
            </div> -->
            <br>
            <div class="form-group">
                <strong>jenis kayu: </strong>
                <select class="form-control" name="kategori_id">
                    <option value="">--pilih--</option>
                    @foreach($mebel as $a)
                    <option value='{{ $a->id}}'> {{ $a->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" data-role="tagsinput" name="tags">
                @if ($errors->has('tags'))
                <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-3 ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    <div class="col-xs-12 col-sm-12 col-md-12 ">
        <a href="{{ route('admin') }}"> back </a>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/taginput.js') }}"></script>
    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: #ffffff;
            background: #2196f3;
            padding: 3px 7px;
            border-radius: 3px;
        }

        .bootstrap-tagsinput {
            width: 100%;
        }
    </style>
    @endsection
