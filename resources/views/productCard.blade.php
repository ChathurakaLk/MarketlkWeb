@extends('layout')
@section('title', $product->name)
@section('main')

    <div class="container">
        <main>
            <div class="card">
                <div class="card__title">
                    <div class="icon">
                        <div id="backButton"><i class="fa fa-arrow-left"></i></div>
                    </div>
                    <h3 class="mx-auto">New products</h3>
                </div>
                <div class="card__body">
                    <div class="half">
                        <div class="featured_text">
                            <h1 class="mb-4">{{ $product->brand }}</h1>
                            <p class="sub">{{ $product->name }}</p>
                            <p class="price">{{ $product->presentPrice() }}</p>
                        </div>
                        <div class="image">
                            <img src="{{ asset('assets/import/img/Pro-img/card img/watch 2.svg') }}" alt="">
                        </div>
                    </div>
                    <div class="half">
                        <div class="description">
                            <p>{{ $product->description }}<br>{{ $product->details }}</p>
                        </div>
                        <span class="stock"><i class="fa fa-pen"></i> In stock</span>
                        <div class="reviews">
                            <ul class="stars">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                            <span>(64 reviews)</span>
                        </div>
                    </div>
                </div>
                <div class="card__footer">
                     <div class="action  ms-auto">



                    <form action="{{route('cart.store')}}" method="POST">
                      @csrf

                      <button type="submit" class="btn btn-outline-success cart">Add to cart</button>
                      <input type="hidden" name="id" value="{{$product->id}}">
                      <input type="hidden" name="name" value="{{$product->name}}">
                      <input type="hidden" name="price" value="{{$product->price}}">

                    </form>
                </div>
                </div>
            </div>
    </div>

    </main>
@include('also-like')

    <!--footer start-->

    <div class="container">
        <footer class="py-5 my-4">
            <div class="row">
                <div class="col-12 col-md-2 col-sm-6  text-md-left mb-4 mb-md-0">
                    <a href="{{route('home')}}" class="nav-link px-2 ">
                      <img src="{{ asset('assets/import/img/Pro-img/logo f/ff-lasst.svg') }}"  width="136px" height="61px" alt="" class="f-img">
                    </a>
                  </div>
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
