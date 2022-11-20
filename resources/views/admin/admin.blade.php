@extends('layout.admin')

@section('container')
<div class="row">
    <div>
        <form action="{{ route('admin.create') }}" style="text-align:left; margin-bottom:5px;">
            <button type="submit" class="btn btn-sm btn-danger shadow ">tambah produk</button>
        </form>
        <a href=" {{ route('kategoriView') }}" type="button" class="btn btn-light btn-shadow" style="display:inline-block;">Create Kategori</a>
    </div>
    @foreach ($produks as $produk)
    <div class="col-md-4">
        <div class="container mt-5">
            <div class="card" style="width: 15rem; height: 20rem;">
                <div class="card-body">
                    <h5 class="card-title mt-5">Jenis produk: {{ $produk->produk }} </h5>
                    <p class="card-text">produk: {{ $produk->nama }} </p>
                    <br>
                    <p class="card-text">harga {{ number_format($produk->harga) }}</p>

                    <div class="form">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('admin.destroy', $produk->id) }}" method="POST" style="display:inline-block ;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger shadow" style="display:inline-block ; margin-left:10px">Hapus</button>
                        </form>
                        <form action=" {{ route('admin.edit', $produk->id) }}" style="text-align:left; display:inline-block">
                            <button type="submit" class="btn btn-danger shadow">edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
