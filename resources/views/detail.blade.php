@extends('layouts.main')

@section('title', 'Detail')

@section('content')
    <div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Kategori</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: auto;">
                        <a href="{{ route('category', ['category' => 'Haircare']) }}" class="nav-item nav-link">Haircare</a>
                        <a href="{{ route('category', ['category' => 'Cosmetics']) }}" class="nav-item nav-link">Cosmetics</a>
                        <a href="{{ route('category', ['category' => 'Haircolor']) }}" class="nav-item nav-link">Haircolor</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">JH</span>Category</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('shoppingPage') }}" class="nav-item nav-link">Home</a>
                            <a href="" class="nav-item nav-link active">Detail Produk</a>
                            <a href="{{ route('checkoutPage') }}" class="nav-item nav-link">Cart/Checkout</a>
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
                    </div>
                </nav>
            </div>
        </div>
    </div>


    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Detail Produk</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('shoppingPage') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Detail Produk</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset("$products->path_img") }}" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="img/product-4.jpg" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold">{{ $products->title }}</h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <small class="pt-1">(1 Reviews)</small>
                </div>
                <h3 class="font-weight-semi-bold mb-4">Rp. {{ number_format($products->price,2,',','.') }}</h3>
                <p class="mb-4 text-justify">{{ $products->card_desc }}</p>
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <a href="{{ route('cartRestore', ['id' => $id]) }}" class="btn btn-sm text-dark p-0">
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i>Tambah ke Cart</button>
                    </a>
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Deskripsi</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews (1)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">{{ $products->title }}</h4>
                        <p class="text-justify">{{ $products->describe }}</p>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4">1 review untuk {{ $products->title }}</h4>
                                <div class="media mb-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6>Sunny Jimin<small> - <i>01 Jan 1000</i></small></h6>
                                        <div class="text-primary mb-2">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <p>Semenjak saya memakai skincare jennyhouse, kulit saya benar-benar bersih dan glowing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-4">Bagaimana penilaian Anda terhadap produk ini?</h4>
                                <small>Penilaian darimu sangat berarti bagi kami untuk tetap terus berinovasi menciptakan produk yang alami dan sehat. *</small>
                                <div class="d-flex my-3">
                                    <p class="mb-0 mr-2">Rating * :</p>
                                    <div class="text-primary">
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <label for="message">Review *</label>
                                        <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Beri nilai" class="btn btn-primary px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->
@endsection