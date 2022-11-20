@extends('layout.main')

@section('container')
@include('partial.slideCart')
<div class="container mt-5 ">
    <div class="row">
        <div class="col">
            <div clas="mb-4 d-flex justify-content-start" style=" width:100%;background-color:aliceblue; border-radius:10px">
                @if ($user->check->isNotEmpty())
                <table class="table bordered border-dark">
                    <tr style="font-size:3vw ;">
                        <td>
                            Nama produk
                        </td>
                        <td>
                            Harga
                        </td>
                        <td>
                            Jumlah
                        </td>
                        <td>
                            Subtotal
                        </td>
                    </tr>
                    @foreach ($user->check as $details)
                    <tr>
                        <td>
                            {{ $details->check_produk }}
                        </td>
                        <td>
                            Rp.{{number_format($details->harga) }}
                        </td>
                        <td>
                            <div class="input-group" style="width:50%;">
                                <input type="number" style="width: 100% ; text-align:center;" value="{{ $details->kuantitas }}" disabled>
                                <div class="input-group-prepend">
                                    <form action="{{ route('inc', $details->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="kuantitas" min="1">
                                        <button type="submit" style="border-radius:50% ;  font-weight: bold;">+</button>
                                    </form>
                                </div>
                                <div class="input-group-append">
                                    @if ($details->kuantitas >1)
                                    <form action="{{ route('dec', $details->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="kuantitas" min="1">

                                        <button type="submit" style="border-radius:50% ; font-weight: bold;">-</button>
                                    </form>
                                    @else
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            Rp.{{ number_format($details->total) }}
                        </td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('del', $details->id) }}" method="POST" class="form-group d-flex justify-content-center">
                                @csrf
                                @method('DELETE')
                                <button type=" submit" class="btn btn-danger btn-block " style="width:90%;">
                                    <i class="bx bx-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="mt-5 pt-5">
                <h1 style="color:aliceblue ;">
                    Total
                    Rp. {{ $harga }}
                </h1>
            </div>
            <div class="d-flex justify-content-end">
                <form action="{{ route('checkOrder') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button class="btn btn-primary">Checkout</button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="d-flex justify-content-center">
        <h1 style="text-align: center;">
            Ups produk tidak ada
        </h1>
    </div>
    <div class="d-flex justify-content-start mt-5 mb-2">
        <a href="{{ route('home.produk') }}"><i class="bx bx-cart-add bx-md">Kembali melihat produk</i></a>
    </div>
    @endif
</div>
@endsection
