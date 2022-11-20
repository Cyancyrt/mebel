@extends('layout.main')
@section('container')
<div class="home" id="home">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-lg-flex flex-lg-column justify-content-lg-end content-left">
                <h1 class="heading">Make Your Interior More Modern and Minimalist</h1>
                <p class="subheading text-white">Share your happiness, Enjoy your Living</p>
                <div class="btn-home mt-4">
                    @if(Auth::guest())
                    <a href="{{ route('home') }}" class="btn btn-buy py-2 px-3 px-lg-4 py-lg-3">Buy Now</a>
                    <a href="{{ route('about') }}" class="btn btn-learn ms-2 py-2 px-3 px-lg-4 py-lg-3">Learn More</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 position-relative">
                <img src="{{ asset('public/Img/mebel.png') }}" class=" img-fluid position-absolute mt-5" alt="" data-aos="zoom-in" srcset="">
            </div>
        </div>
    </div>
</div>
<!-- Home End -->
@endsection
