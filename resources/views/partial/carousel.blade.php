<div class="container ">
    <div class="row">
        <center>
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide " data-ride="carousel">
                    <div class="carousel-inner">
                        @if (Auth::guest())
                        <a href="#" data-toggle="modal" data-target="#myModal" style="cursor:pointer ;" class="d-flex justify-content-center">
                            <div class="btn btn-dark" style="text-align:center; margin-top:10%; position:absolute; z-index:1; opacity:70%;">
                                <h3 style="margin-top: 5% ;"><strong> lets started</strong></h3>
                            </div>
                        </a>
                        @endif
                        <div class="carousel-item active">
                            <img class=" d-block w-100" src="{{ url('public/produk/meja sd.jpeg') }}" style="width: 300px; height:300px" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url('public/produk/meja sd.jpeg') }}" style="width: 300px; height:300px" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ url('public/produk/kursi tk.jpeg') }}" style="width: 300px; height:300px" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </center>
    </div>
</div>
