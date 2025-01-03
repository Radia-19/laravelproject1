<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-camera2"></i>Fotosale</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">All Products</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                        <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    @if(Auth::check())
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.upload.show') }}">Upload</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.myFinancial.show') }}">Financial</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.myImages.show') }}">Images</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.logout') }}">({{ Auth::user()->username }})Logout</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.login.show') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('user.register.show') }}">Register</a></li>
                    @endif

                </ul>
                <button class="btn btn-outline-dark ms-2" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
