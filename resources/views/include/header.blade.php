<!--Navbar-->

<nav class="navbar navbar-expand-lg nav-bg-color">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}"><img
                src="{{ asset('assets/import/img/Pro-img/logo f/main-Logo_f.png') }}" width="100%" height="50"
                alt="" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Shop
                    </a>
                    <ul class="dropdown-menu" data-bs-trigger="focus" id="a2">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item s1">
                    <a class="nav-link" href="#">Contacts</a>
                </li>

                <li class="nav-item s1">
                    <a class="nav-link" href="">Brands</a>
                </li>
                <li class="nav-item s1">
                    <a class="nav-link"
                        href="
                    @if (Auth::check()) {{ route('cart.index') }}
                    @else{{ route('login', ['success_message' => 'Please Login First !']) }} @endif">
                   @if (Auth::check())
                   <i class="fa-solid fa-cart-shopping">
                </i>&nbsp;Cart&nbsp;<span class="badge text-bg-light rounded-pill">{{ Cart::count() }}</span></a>
                @else
                <i class="fa-solid fa-cart-shopping">
                </i>&nbsp;Cart&nbsp;</a>
                   @endif
                </li>
            </ul>
            <form class="d-flex fontB" role="search">
                <input class="form-control me-4 input-color" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success me-2" type="submit">
                    <img src="{{ asset('assets/import/img/Pro-img/icons/search.svg') }}" width="20px" height="20px"
                        alt="" />
                </button>

                @if (Auth::check())
                    <div class="">
                        <button type="button" class="btn btn-sucsses me-2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ asset('assets/import/img/Pro-img/icons/person-fill.svg') }}" width="20px"
                                height="20px" alt="" />
                        </button>
                        <ul class="dropdown-menu text-bg-dark dropdown-menu-end me-2">
                            <li>
                                <div class="card text-bg-dark ms-auto" style="max-width: 18rem">
                                    <div class="card-header mx-auto">Profile&nbsp;<span class="logged-in">●</span></div>
                                    <div class="card-body">
                                        <div class="">
                                            <h5 class="f-size"><i class="fa-solid fa-user-tie"></i>
                                                <p class="mt-1">{{ Auth()->user()->name }}</p>
                                            </h5>
                                        </div>
                                        <div>
                                            <p class="f-size"><i class="fa-solid fa-envelope"></i>
                                                {{ Auth()->user()->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('logout') }}" class="btn btn-outline-success me-2">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-success me-2">
                        <img src="{{ asset('assets/import/img/Pro-img/icons/person-fill.svg') }}" width="20px"
                            height="20px" alt="" />
                    </a>
                @endauth

        </form>
    </div>
</div>
</nav>







<!--Navbar end-->
