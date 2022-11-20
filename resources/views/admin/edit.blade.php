@extends('layout.admin')

@section('container')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color:aliceblue;">Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Input gagal.<br><br>
            @foreach ($errors->all() as $error)
            <br>{{ $error }}<br>
            @endforeach
        </div>
        @endif
        <form action="{{ route('admin.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>
                            <h4 style="color:aliceblue ;">produk:</h4>
                        </strong>
                        <input type="text" name="produk" value="{{ old('produk', $produk->produk) }}" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>
                            <h4 style="color:aliceblue ;">Nama:</h4>
                        </strong>
                        <input type="text" name="nama" value="{{ old('nama', $produk->nama) }}" class="form-control" placeholder="nama">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>
                            <h4 style="color:aliceblue ;">harga:</h4>
                        </strong>
                        <input type="text" name="harga" value="{{ old('harga', $produk->harga) }}" class="form-control" placeholder="harga">
                    </div>
                </div>
                <div class="form-group">
                    <strong>jenis kayu: </strong>
                    <select class="form-control" name="kategori_id">
                        <option href="#">{{ $produk->kategori_name }}</option>
                        @foreach($mebel as $a)
                        <option value='{{ $a->id}}'> {{ $a->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
