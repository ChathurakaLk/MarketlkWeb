@extends('layout')
@section('title', 'Shopping')
@section('main')
    <div class="container">
        <section class="section-products">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="header">
                            <h3>Featured Product</h3>
                            <h2>Popular Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Single Product -->


                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div id="product-1" class="single-product">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <div class="part-1 justify-content-center text-center"><img
                                            src="{{ asset('assets/import/img/Pro-img/card img/watch 2.svg') }}"
                                            alt="">
                                </a>

                                <ul class=" text-center">

                                    <li><a href="{{ route('shop.show', $product->slug) }}"><i
                                                class="fas fa-shopping-cart"></i></a></li>
                                    <li><a href="#"><i class="fas fa-heart"></i></a></li>

                                </ul>
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">{{ $product->name }}</h3>
                                <h4 class="product-old-price">$79.99</h4>
                                <h4 class="product-price">{{ $product->presentPrice() }}</h4>
                            </div>

                        </div>
                </div>
                @endforeach




            </div>
    </div>
    </section>
    </div>




    <!--footer start-->

    <div class="container">
        <footer class="py-5 my-4">
            <div class="row">
                <div class="col-12 col-md-2 col-sm-6  text-md-left mb-4 mb-md-0">
                    <a href="{{route('home')}}" class="nav-link px-2 ">
                      <img src="{{ asset('assets/import/img/Pro-img/logo f/ff-lasst.svg') }}"  width="136px" height="61px" alt="" class="f-img">
                    </a>
                  </div>
                <div class=" text-center text-md-right">
                    <ul class="nav justify-content-center justify-content-md-end border-bottom pb-3 mb-3">
                        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link px-2">Home</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contacts</a></li>
                        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                    </ul>
                </div>
            </div>
            <p class="text-center">© 2024 Company, Inc</p>
        </footer>
    </div>




    <!--footer end-->
@endsection
