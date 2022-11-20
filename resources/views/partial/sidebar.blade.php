<div class="container">
    <div class="row">
        <div class="col">
            <div class="sidebar">
                <div>
                    <a href="{{ route('index.admin') }}"><i class="bx bx-home"></i></a>
                </div>
                <div>
                    <a href="{{ route('admin') }}">Produk</a>
                </div>
                <div>
                    <a href="{{ route('admin.user') }}">Pelanggan</a>
                </div>
                <div>
                    <a href="{{ route('admin.order') }}">Pesanan</a>
                </div>
                @if (auth()->user())
                <div>
                    <form action="{{ route('logoutAdmin') }}" method="POST">
                        @csrf
                        <button class="submit" value="Logout">Logout</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
