@extends('layout')
@section('title', 'cart')

@section('main')

    <div class="container">

        <main class="page">
            <section class="shopping-cart dark">

                <div class="row">

                    <div>
                        <div class="back">
                            <div id="backButton"><i class="fa fa-arrow-left"></i></div>
                        </div>

                        <div class="block-heading mx-5">
                            <p>Shopping Cart </p>
                        </div>


                    </div>
                </div>
                <div class="content">
                    <div class="container md-col-4">
                        @if (session()->has('success_message'))
                            <div class="alert alert-success">
                                {{ session()->get('success_message') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="row d-flex">

                        @foreach (Cart::content() as $item)
                            <div class="col-md-12 col-lg-8">
                                <div class="items">
                                    <div class="product">
                                        <div class="row">
                                            <div class="col-md-3 cart-img">
                                                <img class="img-fluid mx-auto d-block image"
                                                    src="{{ asset('assets/import/img/Pro-img/card img/watch 2.svg') }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="info">
                                                    <div class="row">
                                                        <div class="col-md-5 product-name">
                                                            <div class="product-name">
                                                                <a class="brows-more-itms"
                                                                    href="{{ route('shop.show', $item->model->slug) }}">{{ $item->model->name }}</a>
                                                                <div class="product-info">
                                                                    <div>Details: <span class="value">
                                                                            {{ $item->model->details }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="qty-box col-md-3 col-sm-3">
                                                            <div class="input-group">
                                                                <input type="number" name="quantity"
                                                                    data-rowid="{{ $item->rowId }}"
                                                                    onchange="updateQuantity(this)"
                                                                    class="form-control input-number"
                                                                    oninput="validateQuantity(this)"
                                                                    value="{{ $item->qty }}">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-3">
                                                            <div class="d-flex ">
                                                                <input type="hidden" id="price"
                                                                    value="{{ $item->model->presentPrice() }}">

                                                                </input>
                                                                <div class="price">
                                                                    <span> {{ $item->model->presentPrice() }}</span>
                                                                </div>
                                                                <input type="hidden" name="itemPrice"
                                                                    value="{{ $item->model->presentPrice() }}"
                                                                    class="itemPrice">


                                                                <ul class="ul-1 text-center mx-5">

                                                                    <li>
                                                                        <form id="delete-form-{{ $item->rowId }}"
                                                                            action="{{ route('cart.destroy', $item->rowId) }}"
                                                                            method="POST" style="display: none;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
                                                                        <a href="#"
                                                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->rowId }}').submit();">
                                                                            <i class="fa-solid fa-trash"></i>
                                                                        </a>

                                                                    </li>

                                                                    <li><a href="#"><i class="fas fa-heart"></i></a>
                                                                    </li>
                                                                </ul>



                                                            </div>
                                                        </div>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (Cart::count() > 0)
                            <div class="brows-more-itms">
                                <a href="{{ route('shopping') }}">Browse more items <i
                                        class="fa-solid fa-cart-shopping"></i></a>
                            </div>
                        @endif

                        <div class="col-md-12 col-lg-12">
                            <div class="summary">
                                <h3>Summary</h3>


                                @if (Cart::count() > 0)
                                    <div>
                                        <div class="summary-item">
                                            <div class="summary-item">
                                                <span class="text">Subtotal</span>
                                                <span class="price"
                                                    id="subtotal">{{ presentPrice(Cart::subtotal()) }}</span>
                                            </div>


                                        </div>
                                        <div class="summary-item"><span class="text">Discount</span><span
                                                class="price">$0</span>
                                        </div>
                                        <div class="summary-item"><span class="text">Tax (13%)</span><span
                                                class="price">{{ presentPrice(Cart::tax()) }}</span>
                                        </div>
                                        <div class="summary-item"><span class="text">Shipping</span><span
                                                class="price">$0</span>
                                        </div>
                                        <div class="summary-item py-3"><span class="text">Total</span>
                                            <span id="finalTotal" class="price">{{ presentPrice(Cart::total()) }}</span>
                                            <!-- Quantity count for this item -->

                                        </div>
                                    </div>

                                    <a type="button" href="{{ route('checkout.index') }}"
                                        class="btn btn-outline-success cart btn-block py-2">Checkout</a>


                            </div>
                        @else
                            <div class="EmptyCart">
                                <i class="fa-solid fa-face-sad-tear" style="font-size: 40px"></i>

                            </div>
                            <div>
                                <h3 style="color: #5f5f5f">Your cart is empty !</h3>
                            </div>
                            <div class="cartFooter">
                                <a href="{{ route('shopping') }}">Browse more items <i class="fa-solid fa-cart-plus"></i>
                                </a>
                            </div>
                            @endif


                        </div>



                    </div>

                </div>

            </section>


        </main>


    </div>

@endsection
@section('extra-js')
    <script>
        function updateQuantity(qtyInput) {
            var rowId = $(qtyInput).data('rowid');
            var newQty = parseInt($(qtyInput).val());
            var itemPrice = $(qtyInput).closest('.info').find('.itemPrice').val();
            var priceFloat = parseFloat(itemPrice.replace('$', ''));
            var totalPrice = newQty * priceFloat;

            // Update the total price of the item in the UI
            $(qtyInput).closest('.info').find('#price').text('$' + totalPrice.toFixed(2));

            // Update subtotal
            updateSubtotal();

            // Update finalTotal
            updateFinalTotal();

            // Update quantity count
            updateQuantityCount();

            // Send AJAX request to update the cart
            $.ajax({
                url: "{{ route('cart.update') }}",
                type: "PATCH",
                data: {
                    _token: "{{ csrf_token() }}",
                    rowid: rowId,
                    quantity: newQty,
                    totalPrice: totalPrice
                },
                success: function(response) {
                    console.log(response);
                    location.reload();

                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }

        function updateSubtotal() {
            var subtotal = 0;
            // Loop through each item and calculate subtotal
            $('.info').each(function() {
                var priceText = $(this).find('.price span').text();
                var price = parseFloat(priceText.replace('$', ''));
                subtotal += price;
            });

            // Update the subtotal value in the UI
            $('#subtotal').text('$' + subtotal.toFixed(2));
            updateFinalTotal(subtotal);
        }

        function updateFinalTotal(subtotal) {

            if (!isNaN(subtotal)) {
                // Update the FinalTotal value in the UI
                var finalTotal = subtotal + parseFloat('{{ Cart::total() }}')
                $('#finalTotal').text('$' + subtotal.toFixed(2));
            } else {
                console.log('error');
            }
        }

        function updateQuantityCount() {
            var totalQuantity = 0;
            // Loop through each item and calculate total quantity
            $('.info').each(function() {
                var quantity = parseInt($(this).find('.input-number').val());
                totalQuantity += quantity;
            });

            // Update the quantity count in the UI
            $('#quantityCount').text(totalQuantity);
            // Store the quantity count in local storage
            localStorage.setItem('quantityCount', totalQuantity);
        }

        $(document).ready(function() {
            // Retrieve the quantity count from local storage and update the UI
            var storedQuantityCount = localStorage.getItem('quantityCount');
            if (storedQuantityCount !== null) {
                $('#quantityCount').text(storedQuantityCount);

            }
        });
    </script>
@endsection
