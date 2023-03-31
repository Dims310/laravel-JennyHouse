@extends('layouts.main')

@section('title', 'Register')

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
                  <a href="{{ route('shoppingPage') }}" class="nav-item nav-link">Home</a>
                </div>
              <div class="navbar-nav ml-auto py-0">
                <a href="{{ route('loginPage') }}" class="nav-item nav-link">Login</a>
                <a href="{{ route('registerPage') }}" class="nav-item nav-link active">Register</a>
              </div>
            </nav>
            <hr/>
            <form action="" method="post" class="ml-lg-2" style="width: 700px;">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control">
                    @if($errors->has('name'))
                        <ul>
                            @foreach($errors->get('name') as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="text" name="phone_number" class="form-control">
                    @if($errors->has('phone_number'))
                        <ul>
                            @foreach($errors->get('phone_number') as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                    @if($errors->has('email'))
                        <ul>
                            @foreach($errors->get('email') as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    @if($errors->has('password'))
                        <ul>
                            @foreach($errors->get('password') as $error)
                                <li style="color: red">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
            </form>
          </div>
        </div>
      </div>
      <!-- Navbar End -->
@endsection