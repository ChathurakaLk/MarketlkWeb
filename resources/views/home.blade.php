@extends('layout')
@section('title', 'home')





@section('hero')




    <!--hero-->
    <div class="main">
        <div class="container col-xxl-8 px-4 py-5 hero">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="{{ asset('assets/import/img/Pro-img/logo f/aa.svg') }}"
                        class="d-block mx-lg-auto img-fluid scale-in-hor-right" alt="" width="700" height="500"
                        loading="lazy" />
                </div>
                <div class="col-lg-6">
                    <h2 class="display-4 fw-bold mb-3 animated-text">Find Your</h2>
                    <h1 class="display-5 fw-bold mb-3 animated-text">Smart</h1>
                    <h3 class="display-3 fw-bold lh-1 mb-3 m-l-s">
                        touch with Series 9 Brand<br />
                        2024 Watch.
                    </h3>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="{{ route('shopping') }}" type="button"
                            class="btn btn-outline-secondary btn-lg px-4 mt-2 bounce-bottom shop-btn">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!--hero end-->

        <!--must have start-->
        <div class="container-fluid py-5">
            <div class="container M-have ">
                <div>
                    <h2 class="M-have m-l-s">Must Have</h2>
                </div>
                <div>
                    <h3 class="M-have-2">Some of our favorite picks this week.</h3>
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4">


                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card h-100">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <img src="{{ asset('assets/import/img/Pro-img/card img/watch 2.svg') }}" width="140px"
                                        height="174px" class="card-img-top mt-5" alt="..." />
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">
                                        Powerful sensors,<br />advanced health features.<br />From
                                        {{ $product->presentPrice() }}
                                    </p>
                                    <div class="d-flex justify-content-center align-items-center mb-3">
                                        <button class="btn btn-outline-success buy mx-2 flex-grow-1">
                                            Buy Now</button><br />

                                        <a class="btn btn-outline-success cart mx-2 flex-grow-1"
                                            href="{{ Auth::check() ? route('cart.index') : route('login') }}">
                                            Add To Cart
                                        </a> {{-- only auth users can getting to cart --}}




                                    </div>
                                </div>

                            </div>

                        </div>
                    @endforeach


                </div>
            </div>

        </div>



        <!--must have end-->

        <!--Show new start-->

        <div class="container col-md-8">
            <h2 class="M-have mb my-5 m-l-s">Shop New arrivals</h2>
            <div class="d-flex">
                <div class="col-6">
                    <p class="col-md-8 show-p text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia
                        velit illum error aliquid harum culpa! Id numquam accusamus quod aliquam. Optio magni placeat
                        voluptas adipisci quas quaerat illum deserunt distinctio!</p>
                    <button class="btn btn-outline-success " id="b1">See More</button>
                </div>

                <div class="col-6 ms-auto">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('assets/import/img/Pro-img/c img/young-adult-doing-outdoor-fitness.svg') }}"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/import/img/Pro-img/c img/2-outdoor-fitness.svg') }}"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/import/img/Pro-img/c img/3-fitness.svg') }}"
                                    class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('assets/import/img/Pro-img/c img/4=fitness.svg') }}"
                                    class="d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Show new end-->

        <!--about us start-->

        <div class="container-fuild ab" id="about-us-section" style="background-color: white;">
            <div class="container col-md-8">
                <h2 class="about m-l-s">About Us</h2>
                <p class="show-pp text-justify">&nbsp;&nbsp;Welcome to Market.lk, where innovation meets style in the world
                    of smartwatches. As a dynamic newcomer in the industry, we're committed to crafting sleek, cutting-edge
                    timepieces that seamlessly integrate technology into your everyday life. Our passion lies in delivering
                    exceptional quality, functionality, and affordability to our customers. At Market.lk, we believe that
                    staying connected shouldn't come at a hefty price tag. With a focus on customer satisfaction and
                    innovation, we're redefining the wearable tech landscape one wrist at a time. Join us on this exciting
                    journey as we strive to make technology more accessible and stylish for everyone.</p>
                <div class="n1"><span class="info"><img src="{{ asset('assets/import/img/Pro-img/icons/mail.svg') }}"
                            width="20px" height="20px" alt="" class="mx-2">info@market.lk</span></div>
            </div>
        </div>
    </div>

    <!--about us end-->
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
