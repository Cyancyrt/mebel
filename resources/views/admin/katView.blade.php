@extends('layout.admin')
@section('container')
@if (session('sukses'))
<div class="alert alert-success">
    {{ session('sukses') }}
</div>
@endif
<div class="row">
    <div class="col">
        <div class="makeKat">
            <form action="{{ route('kategoriCreate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <strong>Jenis kayu:</strong>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <table>
            @foreach($kategori as $k)
            <tr>
                <td style="padding-right:20px ;">
                    jenis kayu
                </td>
                <td>
                    {{ $k->name }}
                </td>
                <td>
                    <form action="{{ route('kategoriDestroy', $k->id) }}" method="POST" class="form-group d-flex justify-content-center">
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
@endsection
