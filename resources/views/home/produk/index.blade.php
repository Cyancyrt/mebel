@extends('layout.main')


@section('container')
<div class="row">
    <div class="form-group">
        @if (request('kategori'))
        <input type="hidden" name="kategori" value="{{ request('kategori') }}">
        @endif
        <div class=" d-flex justify-content-center mt-5">
            <form class="d-flex" role="search" action="{{ route('cari') }}" method="GET">
                <input class="form-control me-2" type="text" name="cari" placeholder="Cari Produk .." value="{{ $cari }}">

                <button class="btn btn-success" type="submit" value="CARI">Search</button>
            </form>
        </div>
    </div>
    <div class="container mt-3">
        <div class="glass">
            <div class="row">
                @if($produks->count())
                @foreach ($produks as $produk)
                <div class="col-md-4">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <img class="card-img-top" src="{{ url('public/produk/'.$produk->image) }}" alt="UDjatilawas" style="height:200px;">
                            <h5 class="card-title mt-5">Jenis produk: {{ $produk->produk }} </h5>
                            <p class="card-text">produk: {{ $produk->nama }} </p>
                            @foreach($produk->tags as $tag)
                            <div class="btn btn-dark btn-sm rounded shadow">{{ $tag->name }}</div>
                            @endforeach
                            <p class="card-text">bahan:
                                @if ($produk->kategori == !null)
                                <a href="{{ route('kategori', $produk->kategori->slug) }}">

                                    {{ $produk->kategori->name }}
                                    @else
                                    ---
                                    @endif
                                </a>
                            </p>
                            <div>
                                <a href="{{ route('detail', $produk->id) }}" class="d-inline btn btn-primary mt-5" style="margin-left: 10px;">Load more</a>
                                <form action="{{ route('addTo.cart') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                    @csrf
                                    <input type="hidden" value="{{ $produk->id }}" name="produk_id">
                                    <input type="hidden" value="{{ $produk->nama }}" name="check_produk">
                                    <input type="hidden" value="{{($produk->harga) }}" name="harga">
                                    <input type="hidden" value="1" name="kuantitas">
                                    <button class="d-inline btn btn-hidden"><i class="bx bx-cart-add bx-md"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <h1 style="color:white; text-align:center;">produk {{ $cari }} yang anda cari tidak ditemukan</h1>
                @endif
            </div>
        </div>
    </div>

</div>


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
