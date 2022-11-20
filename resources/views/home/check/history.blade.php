@extends('layout.main')

@section('container')
@include('partial.slideCart')
<div class="mt-5">
    <div class="row">
        <div class="col">
            <div clas="mb-4 d-flex justify-content-start" style=" width:100%;background-color:aliceblue; border-radius:10px">
                @if ($history->isNotEmpty())
                <h2 style="text-align:center;">History</h2>
                @foreach($user->history as $h)
                <table class="table bordered border-dark">
                    <tr>
                        <td>
                            produk
                        </td>
                        <td>
                            kuantitas
                        </td>
                        <td>
                            harga
                        </td>
                        <td>
                            total
                        </td>
                        <td>
                            <i class='bx bx-map'></i>alamat
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {{ $h->produk }}
                        </td>
                        <td>
                            {{ $h->kuantitas }}
                        </td>
                        <td>
                            {{ $h->harga }}
                        </td>
                        <td>
                            {{ $h->total }}
                        </td>
                        <td>
                            {{ $h->alamat }}
                        </td>
                    </tr>
                </table>
                @endforeach
                @else

                <div class="d-flex justify-content-center">
                    <h1 style="text-align: center;">
                        Ups history tidak ada
                    </h1>
                </div>
                <div class="d-flex justify-content-start mt-5 mb-2">
                    <a href="{{ route('home.produk') }}"><i class="bx bx-cart-add bx-md">Kembali melihat produk</i></a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
