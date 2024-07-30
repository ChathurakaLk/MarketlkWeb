@extends('layout')
@section('title', 'checkout')
@section('extra-css')
@endsection
@section('main')

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">

        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <div class="container">
        <main>
            <div class="check-out text-center">
                <h2>Checkout Form</h2>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <a class="check-cart" href="{{ route('cart.index') }}">Your cart&nbsp;<i
                                class="fa-solid fa-cart-shopping">
                            </i></a>
                        <span class="badge bg-success rounded-pill">{{ Cart::count() }}</span>
                    </h4>
                    <ul class="list-group mb-3">
                        @foreach (Cart::content() as $item)
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">
                                        <a class="brows-more-itms"
                                            href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                    </h6>
                                    <small class="text-body-secondary">{{ $item->model->details }}</small><br>
                                    <small class="text-body-secondary">
                                        <span class="text">Quntity :</span>
                                        <span class="price"><span class="quantity-count">{{ $item->qty }}X</span>
                                        </span></small>
                                    <small>
                                        <div class="col-md-3 cart-img">
                                            <img class="img-fluid mx-auto d-block image"
                                                src="{{ asset('assets/import/img/Pro-img/card img/watch 2.svg') }}">
                                        </div>
                                    </small>

                                </div>
                                <span class="text-body-secondary">{{ $item->model->presentPrice() }}</span>
                            </li>
                        @endforeach
                        {{-- cart items --}}
                        <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text">Tax (13%)</span>
                            <span class="price">{{ presentPrice(Cart::tax()) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="text">Shipping</span>
                            <span class="price">$0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Discount</span>
                            <span class="price">$0</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (USD)</span>
                            <span id="finalTotal" class="price">{{ presentPrice(Cart::total()) }}</span>
                        </li>
                    </ul>
                    <div class="check-brows">
                        <a href="{{ route('shopping') }}">Browse more items <i class="fa-solid fa-cart-plus"></i>
                        </a>
                    </div>

                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="firstName" name="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="" value=""
                                    required />
                                <div class="invalid-feedback">
                                    Valid first name is required.
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email
                                    <span class="text-body-secondary">(Optional)</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="you@example.com" />
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" id="address"
                                    placeholder="1234 Main St" required />
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>
                            <div class="col-md-5">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" name="country" required>
                                    <option value="">Choose...</option>
                                    <option>Sri Lanka</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please select a valid country.
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">Province</label>
                                <select class="form-select" name="province" required>
                                    <option value="">Choose...</option>
                                    <option>Sothern</option>
                                    <option>Western</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label">Zip</label>
                                <input type="text" class="form-control" name="zip" placeholder="" required />
                                <div class="invalid-feedback">Zip code required.</div>
                            </div>
                        </div>

                        <hr class="my-4" />
                        
                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input"
                                    checked required />
                                <label class="form-check-label" for="credit">Credit card</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input"
                                    required />
                                <label class="form-check-label" for="debit">Debit card</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input"
                                    required />
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="" required />
                                <small class="text-body-secondary">Full name as displayed on card</small>
                                <div class="invalid-feedback">Name on card is required</div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="card-element">
                                        Credit or debit card
                                    </label>
                                    <div id="card-element">
                                        <!-- a Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                            </div>

                        </div>

                        <hr class="my-4" />
                        <div class="btn-chek">
                            <button class="w-100 btn btn-outline-secondary btn-lg shop-btn" type="submit">
                                Continue to checkout
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>

    </div>



    <!--footer start-->

    <div class="container">
        <footer class="py-5 my-4">
            <div class="row">
                <div class="col-12 col-md-2 col-sm-6  text-md-left mb-4 mb-md-0">
                    <a href="{{ route('home') }}" class="nav-link px-2 ">
                        <img src="{{ asset('assets/import/img/Pro-img/logo f/ff-lasst.svg') }}" width="136px"
                            height="61px" alt="" class="f-img">
                    </a>
                </div>
                <div class=" text-center text-md-right">
                    <ul class="nav justify-content-center justify-content-md-end border-bottom pb-3 mb-3">
                        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2">Home</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contacts</a>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    </ul>
                </div>
            </div>
            <p class="text-center">© 2024 Company, Inc</p>
        </footer>
    </div>




    <!--footer end-->
@endsection
