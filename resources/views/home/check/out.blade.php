@extends('layout.main')

@section('container')
@include('partial.slideCart')
<div class="mt-5">
    <div class="row">
        <div class="col">
            <div clas="d-flex justify-content-start" style=" width:100%;background-color:aliceblue; border-radius:10px; height:100%;">
                @if ($user->checkout->isNotEmpty())
                <div class="d-flex justify-content-center">
                    <table style="font-size:30px; width:50%;">
                        @foreach($user->checkout as $key)
                        <tr>
                            <td>
                                <div class="mt-2">
                                    <h3>
                                        Pesanan:
                                    </h3>
                                </div>
                            </td>
                            <td>
                                <div class="mt-2">
                                    <h3 style="width:100px ;">
                                        {{ $key->check_produk }}
                                    </h3>
                                </div>
                            </td>
                            <td>
                                <div class="mt-2" @if($key['status_id']==1 ) style="color:red; background-color:rgba(255, 0, 0, 0.3); border-radius:25px; height:40px;" @elseif ($key['status_id']==2) style="color:blue ; background-color:rgba(0, 0, 255, 0.3); border-radius:25px; height:40px;" @elseif ($key['status_id']==3) style="color:green ; background-color:rgb(0,255,0,0.3); border-radius:25px; height:40px;" @endif>
                                    <h3 style="text-align:center;">{{ $key->status->name }}</h3>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                @else
                <div class="d-flex justify-content-center">
                    <h1 style="text-align: center;">
                        Ups pesanan tidak ada
                    </h1>
                </div>
                <div class="d-flex justify-content-start mt-5 mb-2">
                    <a href="{{ route('home.produk') }}"><i class="bx bx-cart-add bx-md">Kembali melihat produk</i></a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
<!-- <style>
    tr {
        margin-top: 100px;
    }
</style> -->
