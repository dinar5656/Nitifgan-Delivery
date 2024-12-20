@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<!-- Carousel Slider -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($sliders as $key => $sliderItem)
      <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
        @if ($sliderItem->image)
          <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="Slider Image">
        @endif
        <div class="carousel-caption d-none d-md-block">
          <div class="custom-carousel-content">
            <h1 class="text-primary">{!! $sliderItem->title !!}</h1>
            <p class="text-dark">{!! $sliderItem->description !!}</p>
            <a href="#" class="btn btn-slider text-dark">Get Now</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Welcome Section -->
<div class="py-5 bg-white">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h4>Welcome to NitifGan Delivery of Web E-Commerce</h4>
        <div class="underline mx-auto"></div>
        <p>
        Platform e-commerce jasa titip khusus mahasiswa yang mempermudah Anda menitip atau memesan barang dari teman kampus. Solusi hemat waktu dan biaya, dengan kepercayaan yang terjalin di lingkungan kampus. Temukan barang impian Anda atau bantu teman mendapatkan apa yang mereka butuhkan, semuanya dalam satu aplikasi!
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Trending Products Section -->
<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Trending Products
        <a href="{{ url('new-arrivals') }}" class="btn btn-primary float-end">View More</a>
        </h4>
        <div class="underline mb-4"></div>
      </div>

      @if ($trendigProducts && $trendigProducts->count() > 0)
        <div class="owl-carousel owl-theme four-carousel">
          @foreach ($trendigProducts as $productItem)
            <div class="item">
              <div class="product-card">
                <label class="stock bg-danger">New</label>
                <div class="product-card-img">
                  @if ($productItem->productImages->count() > 0)
                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                      <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                    </a>
                  @else
                    <img src="path/to/default-image.jpg" alt="Default Image">
                  @endif
                </div>
                <div class="product-card-body">
                  <p class="product-brand">{{ $productItem->brand }}</p>
                  <h5 class="product-name">
                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                      {{ $productItem->name }}
                    </a>
                  </h5>
                  <div>
                    <span class="selling-price">${{ $productItem->selling_price }}</span>
                    <span class="original-price">${{ $productItem->original_price }}</span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="col-md-12">
          <div class="p-2">
            <h4>No Products Available</h4>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
<!-- featuredProducts Products Section -->
<div class="py-5 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Featured Products
          <a href="{{ url('featured-products') }}" class="btn btn-primary float-end">View More</a>
        </h4>
        <div class="underline mb-4"></div>
      </div>

      @if ($featuredProducts && $featuredProducts->count() > 0)
        <div class="owl-carousel owl-theme four-carousel">
          @foreach ($featuredProducts as $productItem)
            <div class="item">
              <div class="product-card">
                <label class="stock bg-danger">New</label>
                <div class="product-card-img">
                  @if ($productItem->productImages->count() > 0)
                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                      <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                    </a>
                  @else
                    <img src="path/to/default-image.jpg" alt="Default Image">
                  @endif
                </div>
                <div class="product-card-body">
                  <p class="product-brand">{{ $productItem->brand }}</p>
                  <h5 class="product-name">
                    <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                      {{ $productItem->name }}
                    </a>
                  </h5>
                  <div>
                    <span class="selling-price">${{ $productItem->selling_price }}</span>
                    <span class="original-price">${{ $productItem->original_price }}</span>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @else
        <div class="col-md-12">
          <div class="p-2">
            <h4>No Products Available</h4>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $('.four-carousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    nav: false,
    responsive: {
      0: { items: 1 },
      600: { items: 3 },
      1000: { items: 5 }
    }
  });
</script>
@endsection
