@extends('layout.main')

@section('container')
<div class="container mt-5">
    <div class="card mb-3" style="background-color:beige ;">
        <div class="d-flex justify-content-center">
            <img class="card-img-top mt-5" src="{{ url('public/produk/'.$produk->image) }}" alt="Card image cap" style="width:60%;height:300px; border-style:dashed;">
        </div>
        <div class="card-body">
            <h2 class="card-title" style="text-align:center;"><strong>{{ $produk->nama }}</strong></h2>
            <h3 class="d-flex justify-content-center"><b> Deskripsi</b></h3>
            @if ($produk->kategori == !null)
            <p class="card-text">Bahan kayu: {{ $produk->kategori->name}}</p>
            @endif
            <p class="card-text">Harga : Rp. {{ number_format($produk->harga) }}</p>
            @if(Auth::guest())
            <button data-toggle="modal" data-target="#myModal" class="btn btn-hidden"><i class="bx bx-cart-add bx-md"></i></button>
            @else
            <form action="{{ route('addTo.cart') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $produk->id }}" name="produk_id">
                <input type="hidden" value="{{ $produk->nama }}" name="check_produk">
                <input type="hidden" value="{{($produk->harga) }}" name="harga">
                <input type="hidden" value="1" name="kuantitas">
                <button class="btn btn-outline-dark rounded"><i class="bx bx-cart-add bx-md"></i></button>
            </form>
            @endif
        </div>
    </div>
    @if(Auth::user())
    <div class="comment">
        <div class="body-comment pb-3" style="background-color: #DDC190 ; border-radius:5px;">
            <form action="{{ route('komen', $produk->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="" style="font-family:Georgia, serif;  margin: 10px 0px 0px 10px;">Comment</label>
                    <p>
                        <input type="text" name="body" class="form=control" id="" style="width:90% ; height:70%; margin: 10px 0px 0px 10px;">
                        <button type="submit" class="btn btn-danger" style="margin-top:-5px;">submit</button>
                    </p>
                </div>
            </form>
        </div>
        @endif
        <div class="d-flex justify-content-center" style="color:aliceblue ;">
            <strong> ----------------------------------------------------- </strong>
        </div>
        <div class="readSec mt-3 mb-3">
            <h1 style="color:aliceblue ;">COMMMENT</h1>
            <div class="showCom">
                @foreach($komen as $k)
                <div class="input-group mt-3">
                    <div class="input-group-prepend">
                        <img src="{{ url('public/Image/'. $k->user->image) }}" id="profile" alt="" style="width: 50px; height:50px; border-radius: 50%;">
                    </div>
                    <input type="text" value="{{ $k->body }}" style="background-color:white; border-style:none;height:70%; width:90%; margin: 10px 0px 0px 20px; font-weight:bold;" disabled>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
