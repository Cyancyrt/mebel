@extends('layout.admin')

@section('container')
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table-bordered">
                <tr>
                    <th>
                        name
                    </th>
                    <th>
                        phone
                    </th>
                    <th>
                        alamat
                    </th>
                    <th>
                        email
                    </th>
                </tr>
                @foreach($user as $a)
                <tr>
                    <td>
                        {{ $a->name }}
                    </td>
                    <td>
                        {{ $a->phone_number }}
                    </td>
                    <td>
                        {{ $a->alamat }}
                    </td>
                    <td>
                        {{ $a->email }}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
<style>
    th {
        width: 20%;
    }
</style>
@endsection
