@extends('layouts.main')

@section('title', 'Shop')

@section('content')
    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
      <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
          <a
            class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
            data-toggle="collapse"
            href="#navbar-vertical"
            style="height: 65px; margin-top: -1px; padding: 0 30px"
          >
            <h6 class="m-0">Kategori</h6>
            <i class="fa fa-angle-down text-dark"></i>
          </a>
          <nav
            class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
            id="navbar-vertical"
          >
            <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
              <a href="{{ route('category', ['category' => 'Haircare']) }}" class="nav-item nav-link">Haircare</a>
              <a href="{{ route('category', ['category' => 'Cosmetics']) }}" class="nav-item nav-link">Cosmetics</a>
              <a href="{{ route('category', ['category' => 'Haircolor']) }}" class="nav-item nav-link">Haircolor</a>
            </div>
          </nav>
        </div>
        <div class="col-lg-9">
          <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
            <a href="" class="text-decoration-none d-block d-lg-none">
              <h1 class="m-0 display-5 font-weight-semi-bold">
                <span class="text-primary font-weight-bold border px-3 mr-1"
                  >JH</span>
                  <img src="img/Jennyhouse.png" alt="" class="img-fluid" style=" margin-left:12px; max-width: 200px; max-height: 30px;">
              </h1>
            </a>
            <button
              type="button"
              class="navbar-toggler"
              data-toggle="collapse"
              data-target="#navbarCollapse"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
              <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('shoppingPage') }}" class="nav-item nav-link active">Home</a>
              </div>
            @if (Auth::user())
              <div class="navbar-nav ml-auto py-0">
                <a class="nav-item nav-link">Selamat datang, {{ Auth::user()->name }}</a>
                <form action=" {{ route('logout') }} " method="post">
                  @csrf
                  <button id="logout" class="nav-item nav-link" type="submit">Logout</button>
                </form>
              </div>
            @else
              <div class="navbar-nav ml-auto py-0">
                <a href="{{ route('loginPage') }}" class="nav-item nav-link">Login</a>
                <a href="{{ route('registerPage') }}" class="nav-item nav-link">Register</a>
              </div>
            @endif
          </nav>
          <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" style="height: 410px">
                <img class="img-fluid" src="img/products/carousel-1.png" alt="Image" />
                <div
                  class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                >
                  <div class="p-3" style="max-width: 700px">
                    <h4
                      class="text-light text-uppercase font-weight-medium mb-3"
                    >
                      10% Off Your First Order
                    </h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                      SKINCARE
                    </h3>
                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                  </div>
                </div>
              </div>
              <div class="carousel-item" style="height: 410px">
                <img class="img-fluid" src="img/products/carousel-2.png" alt="Image" />
                <div
                  class="carousel-caption d-flex flex-column align-items-center justify-content-center"
                >
                  <div class="p-3" style="max-width: 700px">
                    <h4
                      class="text-light text-uppercase font-weight-medium mb-3"
                    >
                      10% Off Your First Order
                    </h4>
                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                      Reasonable Price
                    </h3>
                    <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
            <a
              class="carousel-control-prev"
              href="#header-carousel"
              data-slide="prev"
            >
              <div class="btn btn-dark" style="width: 45px; height: 45px">
                <span class="carousel-control-prev-icon mb-n2"></span>
              </div>
            </a>
            <a
              class="carousel-control-next"
              href="#header-carousel"
              data-slide="next"
            >
              <div class="btn btn-dark" style="width: 45px; height: 45px">
                <span class="carousel-control-next-icon mb-n2"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Navbar End -->

    <!-- Featured Start -->
    <div class="container-fluid pt-5">
      <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
          <div
            class="d-flex align-items-center border mb-4"
            style="padding: 30px"
          >
            <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
            <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
          <div
            class="d-flex align-items-center border mb-4"
            style="padding: 30px"
          >
            <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
            <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
          <div
            class="d-flex align-items-center border mb-4"
            style="padding: 30px"
          >
            <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
            <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
          <div
            class="d-flex align-items-center border mb-4"
            style="padding: 30px"
          >
            <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
            <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
          </div>
        </div>
      </div>
    </div>
    <!-- Featured End -->

    <!-- Categories Start -->
    <h3 class="text-center mb-sm-3">Produk Terlaris</h3>
    <div class="row m-sm-1 m-lg-5">
      @foreach ($products as $item)
          <div class="col-lg-3 col-md-6 col-sm-6 pb-1">  
              <div class="card product-item border-0 mb-4">
                  <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                      <img class="img-fluid w-100" src="{{ asset("$item->path_img") }}" alt="">
                  </div>
                  <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                      <h6 class="text-truncate mb-3">{{ $item->title }}</h6>
                      <div class="d-flex justify-content-center">
                          <h6>Rp. {{ number_format($item->price,2,',','.') }}</h6><h6 class="text-muted ml-2"><del>Rp. 500.000</del></h6>
                      </div>
                  </div>
                  <div class="card-footer d-flex justify-content-between bg-light border">
                      <a href="{{ route('detailPage', ['id' => $item->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>Detail Produk</a>
                      @if (Auth::user())
                        <a href="{{ route('cartRestore', ['id' => $item->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Tambah ke Cart</a>
                      @else
                        <a href="{{ route('cartRestore', ['id' => $item->id]) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Tambah ke Cart</a>
                      @endif
                  </div>
              </div>    
          </div>
        @endforeach
    </div>
    <!-- Categories End -->
@endsection
