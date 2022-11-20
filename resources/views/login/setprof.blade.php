@extends('layout.main')

@section('container')
<div class="row mt-5 mb-5">
    <div>
        <div class="d-flex justify-content-center" style="background-color:aliceblue; border-radius:10px; height:105%;">
            <div class="login" style="width: 65rem; height:100%;">
                <form action="{{ route('settingupdate', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <h2 class="text-center" style="margin-top:30px;">Edit Profile</h2>
                        <div class="col-6">
                            <div class="log shadow p-3 mb-5">
                                <div class="image form-group mt-3 d-flex justify-content-center">
                                    <img src="{{ url('public/Image/'.auth()->user()->image) }}" id="profile" alt="" style="width: 150px; height:150px; border-radius: 50%;">
                                    <input id="profileupload" type="file" name="image" class="form-control" style="display:none ;" capture>
                                </div>
                                <h3 class="mt-3 text-center">Profile</h3>
                            </div>
                        </div>
                        <div class=" col-6">
                            <div class="d-flex justify-content-end">
                                <div class="panjang" style="width: 100%; height:10%;">
                                    @if(Auth::user())
                                    <div class="form-group">
                                        <strong>Email</strong>
                                        <input type="text" class="form-control" value="{{ old('email',$user->email) }}" name="email" placeholder="email">
                                    </div>
                                    <div class="form-group mt-3">
                                        <strong>Name</strong>
                                        <input type="text" class="form-control" value="{{ old('name', $user->name) }}" name="name" placeholder="Name">
                                    </div>
                                    <div class="form-group mt-3">
                                        <strong>Phone</strong>
                                        <input type="number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}" name="phone_number" placeholder="Phone">
                                    </div>
                                    <div class="form-group mt-3">
                                        <strong>Adress</strong>
                                        <input type="text" class="form-control" value="{{ old('alamat', $user->alamat) }}" name="alamat" placeholder="Adress">
                                    </div>
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-block" style="width:90%;">Submit</button>
                    </div>
                </form>
                <div class="row mt-3">
                    <div class="form-group d-flex justify-content-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('delete', auth()->user()->id) }}" method="POST" class="form-group d-flex justify-content-center w-100">
                            @csrf
                            @method('DELETE')
                            <button type=" submit" class="btn btn-danger btn-block " style="width:90%;"><i class="bx bx-sm bx-user-x"></i>
                                delete account
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
