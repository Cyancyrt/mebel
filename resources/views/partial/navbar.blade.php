@include('layout.modal')
<div class="row">
    <div class="col-12">
        <nav class="navbar navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#"><span>UD</span>JATILAWAS</a>
                <div class="left d-flex flex-row justify-content-end">
                    <div class="cart d-flex justify-content-end">
                        @if(Auth::guest())
                        <a class="nav-link" href="/"><i class='bx bxs-home me-3'></i></a>
                        <a data-toggle="modal" data-target="#myModal" style="cursor:pointer ;"><i class='bx bx-user me-3'></i></a>
                        @else
                        <a class="nav-link" href="/"><i class='bx bxs-home'></i></a>
                        <a href="{{ route('cart') }}"><i class="bx bx-cart"></i></a>
                        @endif
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <a class="navbar-brand" href="#"><span>UD</span>JATILAWAS</a>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    @if (Auth::user())
                                    <div class="dropdown show">
                                        <center>
                                            <img src="{{ url('public/Image/'.auth()->user()->image) }}" style="width: 150px; height:150px; border-radius: 50%; margin-bottom:-30px;" alt="">
                                        </center>
                                        <a class="nav-link dropdown-toggle" style="text-align:center;" role="button" id="dropdownMenuLink" data-toggle="dropdown"><br>
                                            <h4>{{ auth()->user()->name }}</h4>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('setting', auth()->user()->id) }}">Setting Profile</a>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" value="Logout">Logout</button>
                                            </form>
                                        </div>
                                    </div>
                                    <h4>
                                        <a class="nav-link" href="#"><i class='bx bxs-dashboard me-3'></i>Dashboard</a>
                                    </h4>
                                    @endif
                                    <h4><a class="nav-link" href="{{ route('about') }}"><i class='bx bx-info-circle me-3'></i>About Us</a>
                                        <a class="nav-link" href="{{ route('home.produk') }}"><i class='bx bx-package me-3'></i>Product</a>
                                        <a class="nav-link" href="#contact"><i class='bx bx-phone me-3'></i>Contact Us</a>
                                    </h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
