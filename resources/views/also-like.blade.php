<div class="container-fluid" style="background-color: #1d1c1c">
    <div class="container p-5">
  <div class="row row-cols-1 row-cols-md-3 ">
    @foreach ($alsoLike as $product )
    <div class="col gutter-0">
      <div class="card h-100" style="max-width: auto">
        <img class="mx-auto mt-3" src="{{ asset('assets/import/img/Pro-img/card img/watch 2.svg') }}" class="card-img-top" alt="..." style="max-width: 30%">
        <div class="card-body">
          <a href="{{ route('shop.show', $product->slug) }}"></a>
          <div class="part-2">
            <div class="product-title ">{{ $product->name }}</div>
            <div class="product-old-price">$79.99</div>
            <div class="product-price">{{ $product->presentPrice() }}</div>
          </div>
        </div>
        <div class="card-footer">
          <small class="text-body-secondary">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
