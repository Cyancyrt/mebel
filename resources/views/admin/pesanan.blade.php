@extends('layout.admin')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table bordered">
                <strong>Pesanan</strong>
                <tr>
                    <th>
                        pelanggan
                    </th>
                    <th>
                        Produk
                    </th>
                    <th>
                        kuantitas
                    </th>
                    <th>
                        alamat
                    </th>
                    <th>
                        status
                    </th>
                </tr>
                @foreach($check as $order)
                <tr>
                    <td>
                        {{ $order->nama_user }}
                    </td>
                    <td>
                        {{ $order->check_produk }}
                    </td>
                    <td>
                        {{ $order->kuantitas }}
                    </td>
                    <td>
                        {{ $order->alamat }}
                    </td>
                    <td>
                        <form action="{{ route('status', $order->id) }}" method="POST" id="status">
                            @csrf
                            <select name="status_id" id="statusId" @if($order['status_id']==3) disabled @endif>
                                <option value="{{ $order->status_id }}"> {{ $order->status->name  }} </option>
                                @foreach($status as $st)
                                <option value="{{ $st->id }}">{{ $st->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-danger" @if($order['status_id']==3) disabled @endif>Konfirmasi</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('send', $order->id) }}">send</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
