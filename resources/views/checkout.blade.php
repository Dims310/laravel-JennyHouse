@extends('layouts.main')

@section('title', 'Keranjang')

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
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">JH</span>Checkout</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="{{ route('shoppingPage') }}" class="nav-item nav-link">Home</a>
                            <a href="" class="nav-item nav-link active">Checkout</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Kategori</a>
                                <div class="dropdown-menu rounded-0 m-0">
                                    <a href="{{ route('category', ['category' => 'Haircare']) }}" class="dropdown-item">Haircare</a>
                                    <a href="{{ route('category', ['category' => 'Cosmetics']) }}" class="dropdown-item">Cosmetics</a>
                                    <a href="{{ route('category', ['category' => 'Haircolor']) }}" class="dropdown-item">Haircolor</a>
                                </div>
                            </div>
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
    <!-- Navbar End -->

    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ route('shoppingPage') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Page Header Start -->
    @if (Auth::user())
        <!-- Checkout Start -->
        <form action="{{ route('checkoutStore') }}" method="post">
            @csrf
            <div class="container-fluid pt-5">
                <div class="row px-xl-5">
                    <div class="col-lg-8">
                        <div class="mb-4">
                                <p class="mb-4 text-info">Pastikan alamat dengan teliti. Alamat Anda akan tersimpan secara otomatis setelah melakukan checkout.</p>
                                <h4 class="font-weight-semi-bold mb-4">Alamat</h4>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Nama Penerima</label>
                                        <input class="form-control" type="text" name="name" value="{{ $name ?? '...'}}">
                                        @if($errors->has('name'))
                                            <ul>
                                                @foreach($errors->get('name') as $error)
                                                    <li style="color: red">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Nomor Telepon</label>
                                        <input class="form-control" type="text" name="phone_number" value="{{ $phone_number ?? '...'}}">
                                        @if($errors->has('phone_number'))
                                            <ul>
                                                @foreach($errors->get('phone_number') as $error)
                                                    <li style="color: red">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Alamat</label>
                                        <input class="form-control" type="text" name="address" value="{{ $address ?? '...'}}">
                                        @if($errors->has('address'))
                                            <ul>
                                                @foreach($errors->get('address') as $error)
                                                    <li style="color: red">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Kode Pos</label>
                                        <input class="form-control" type="text" name="postal_code" value="{{ $postal_code ?? '...'}}">
                                        @if($errors->has('postal_code'))
                                            <ul>
                                                @foreach($errors->get('postal_code') as $error)
                                                    <li style="color: red">{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="font-weight-medium mb-3">Produk</h5>
                                @foreach ($carts as $item)
                                <div class="d-flex justify-content-between">
                                    <p>{{ $item->product_title}}</p>
                                    <p>{{ $item->qty }}</p>
                                </div>
                                @endforeach
                                <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">Rp. {{ number_format($subtotal,2,',','.') }}</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Biaya Kirim</h6>
                                    <h6 class="font-weight-medium">Rp. 0,00 <del>7.500,00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">Rp. {{ number_format($subtotal+0,2,',','.') }}</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card border-secondary mb-5">
                            <div class="card-header bg-secondary border-0">
                                <h4 class="font-weight-semi-bold m-0">Payment</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                        <label class="custom-control-label" for="paypal">Paypal</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                        <label class="custom-control-label" for="directcheck">Direct Check</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                        <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" type="submit">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </form>
    <!-- Checkout End -->
    @else
    <form action="{{ route('checkoutStore') }}" method="post">
        @csrf
        <!-- Checkout Start -->
        <div class="container-fluid pt-5">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <p class="mb-4 text-danger">Anda belum login, informasi alamat tidak akan tersimpan untuk pembelian selanjutnya.</p>
                        <h4 class="font-weight-semi-bold mb-4">Alamat</h4>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nama Penerima</label>
                                <input class="form-control" type="text" name="name" value="">
                                @if($errors->has('name'))
                                    <ul>
                                        @foreach($errors->get('name') as $error)
                                            <li style="color: red">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" value="">
                                @if($errors->has('email'))
                                    <ul>
                                        @foreach($errors->get('email') as $error)
                                            <li style="color: red">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Nomor Telepon</label>
                                <input class="form-control" type="text" name="phone_number" value="">
                                @if($errors->has('phone_number'))
                                    <ul>
                                        @foreach($errors->get('phone_number') as $error)
                                            <li style="color: red">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Alamat</label>
                                <input class="form-control" type="text" name="address" value="">
                                @if($errors->has('address'))
                                    <ul>
                                        @foreach($errors->get('address') as $error)
                                            <li style="color: red">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Kode Pos</label>
                                <input class="form-control" type="text" name="postal_code" value="">
                                @if($errors->has('postal_code'))
                                    <ul>
                                        @foreach($errors->get('postal_code') as $error)
                                            <li style="color: red">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-medium mb-3">Products</h5>
                            @foreach ($carts as $item)
                                <div class="d-flex justify-content-between">
                                    <p>{{ $item->product_title}}</p>
                                    <p>{{ $item->qty }}</p>
                                </div>
                            @endforeach
                            <hr class="mt-0">
                                <div class="d-flex justify-content-between mb-3 pt-1">
                                    <h6 class="font-weight-medium">Subtotal</h6>
                                    <h6 class="font-weight-medium">Rp. {{ number_format($subtotal,2,',','.') }}</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-medium">Biaya Kirim</h6>
                                    <h6 class="font-weight-medium">Rp. 0,00 <del>7.500,00</del></h6>
                                </div>
                            </div>
                            <div class="card-footer border-secondary bg-transparent">
                                <div class="d-flex justify-content-between mt-2">
                                    <h5 class="font-weight-bold">Total</h5>
                                    <h5 class="font-weight-bold">Rp. {{ number_format($subtotal+0,2,',','.') }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->
    </form>
    @endif
@endsection