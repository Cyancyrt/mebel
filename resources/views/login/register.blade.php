@extends('layout.main')

@section('container')
<div class="login" style="height: 100% ; background-color:aliceblue; border-radius:10px; ">
    <div class="d-flex justify-content-center mt-3">
        <div class="from-group" style="width: 65rem; height:30rem;">
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <h2 class=" text-center" style="margin-top:30px;">Register</h2>
                    <div class="col-6">
                        <div class="glass">
                            <div class="image form-group d-flex mt-2 justify-content-center" style="height:15vw">
                                <img src="https://www.w3schools.com/w3images/avatar5.png" id="profile" alt="" style="width: 11vw; height:11vw; border-radius: 50%; margin-top:10px">
                                <input id="profileupload" type="file" name="image" class="form-control" style="display:none ;" capture>
                            </div>
                            <h3 class=" text-center" style="text-shadow: 6px 6px #CFD2CF;">Profile</h3>
                        </div>
                    </div>
                    <div class=" col-6">
                        <div class=" d-flex justify-content-end">
                            <div class="panjang" style="width: 100%; height:10%; font-size:20px">
                                <div class="form-group">
                                    Email <input type="text" class="form-control" value="{{ old('email') }}" name="email" placeholder="email">
                                </div>
                                <div class="form-group mt-3">
                                    Password <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="bx bx-sm bx-low-vision" onclick="myFunction()" style="cursor:pointer ;"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    Name <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Name">
                                </div>
                                <div class="form-group mt-3">
                                    Adress <input type="text" class="form-control" value="{{ old('alamat') }}" name="alamat" placeholder="Adress">
                                </div>
                                <div class="form-group mt-3">
                                    Phone <input type="number" class="form-control" name="phone_number">
                                    <p style="color:red ;">*must 10 number</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block" style="width:90%;">register</button>
                </div>
            </form>
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
