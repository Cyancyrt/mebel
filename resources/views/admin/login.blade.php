@extends('layout.main')

@section('container')
<div class="row">
    <div class="col">
        <div class="d-flex justify-content-center mt-5 pt-5">
            <div class="card border-primary mb-3" style="max-width: 18rem;">
                <div class="card-header">Login</div>
                <div class="card-body text-primary">
                    <form action="{{ route('loginAdmin') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            Admin <div class="input-group">
                                <input type="text" class="form-control" name="nickname" placeholder="nickname" required="required">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="bx bx-sm bx-user"></i>
                                    </div>
                                </div>
                            </div>
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
                            <button type="submit" class="btn btn-primary btn-block">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
