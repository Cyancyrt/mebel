@extends('layout.main')


@section('container')
<div class="row">
    <div class="form-group">
        @if (request('kategori'))
        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif
    </div>
    <div class="container mt-3">
        <div class="glass">
            <div class="row">
                @foreach ($produks as $produk)
                <div class="col-md-4">
                    <div class="card mt-3 mb-3" style="margin-left:20px;">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ url('public/produk/'.$produk->image) }}" alt="UDjatilawas" style="height:200px;">
                            <h5 class="card-title mt-5">Jenis produk: {{ $produk->produk }} </h5>
                            <p class="card-text">produk: {{ $produk->nama }} </p>
                            @foreach($produk->tags as $tag)
                            <div class="btn btn-dark btn-sm rounded shadow">{{ $tag->name }}</div>
                            @endforeach
                            @if ($produk->kategori->name == !null)
                            <p class="card-text">bahan:<a href="{{ route('kategori', $produk->kategori->slug) }}">{{ $produk->kategori->name }} </a></p>
                            @endif
                            <a href="{{ route('detail', $produk->id) }}" class="btn btn-primary mt-5" style="margin-left: 10px;">Load more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('partial.contact')
@endsection
<style>
    .glass {
        /* From https://css.glass */
        background: rgba(255, 255, 255, 0.31);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
</style>
