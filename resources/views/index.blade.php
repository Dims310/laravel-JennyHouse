<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />

    <!-- My Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- Semantic Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.5.0/dist/semantic.min.css">


    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css"/>

    <title>Jennyhouse</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img id="logo" src="img/Jennyhouse.png" alt="Jennyhouse">
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-link" aria-current="page" href="{{ route('category', ['category' => 'Haircare']) }}">Haircare</a>
            <a class="nav-link" href="{{ route('category', ['category' => 'Cosmetics']) }}">Cosmetic</a>
            <a class="nav-link" href="{{ route('category', ['category' => 'Haircolor']) }}">Haircolor</a>
            <a class="nav-item btn btn-primary tombol" href="{{ route('shoppingPage') }}">Halaman Belanja</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">
          <img class="img-fluid float-left" src="img/landing-page/SPSTEX.png">
        </h1>
      </div>
    </div>
    <!-- akhir jumbotron -->
    <!-- container  -->
    <div class="container">
     
      <!-- Info panel -->
      <div class="row justify-content-center">
       <div class="col-12 info-panel">
        <div class="row">
          <div class="col-lg">
            <div>
              <i class="ui leaf green icon float-right"></i>
            </div>
            <h4>Clean Beauty</h4>
            <p>Berkomitmen membuat kosmetik dari bahan-bahan alami untuk membantu Anda tetap sehat. </p>
          </div>
          <div class="col-lg">
            <div>
              <i class="ui check icon float-right"></i>
            </div>
            <h4>Positive Vibes</h4>
            <p>Kami memperluas aktivitas dan kebijakan kami di semua aspek (bahan, wadah ramah linkungan, pengemasan, pesan), seperti tidak ada zat berbahaya. </p>
          </div>
          <div class="col-lg">
            <div>
              <i class="ui heart red icon float-right"></i>
            </div>
            <h4>Together</h4>
            <p>Kami ingin memberikan pengalaman bahagia dengan merek dan produk dengan mengejar nilai dan emosi yang melampaui produk.</p>
          </div>
        </div>
      </div>
      
      <!-- akhir info panel -->

      <!-- workingspace -->
      <div class="row workingspace">
        <div class="col-lg-6">
          <img src="img/landing-page/jhproducts.webp" alt="workingspace" class="img-fluid" style="border-radius: 12px;"> 
        </div>
        <div class="col-lg-5">
          <h3><span>Jennyhouse</span></h3>
          <p>Kami memperluas aktivitas yang ramah lingkungan, bertujuan menciptakan inovasi kosmetik berbahan alami. Klik tombol dibawah ini, untuk melihat seluruh produk.</p>
         <a href="{{ route('shoppingPage') }}" class="btn btn-info tombol">Lihat halaman belanja -></a>
        </div>
      </div>
      <!-- akhir workingspace -->
    </div>
    <!-- akhir container -->
    <!-- testimonial -->
    <section class="testimonial">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h5>"Semenjak saya memakai skincare jennyhouse, kulit saya benar-benar bersih dan glowing"</h5>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="'col-6 justify-content-center d-flex">
        <figure class="figure">
          <img src="img/landing-page/tester1.png" class="figure-img img-fluid rounded-circle" alt="testi 1">
        </figure>
        <figure class="figure">
          <img src="img/landing-page/tester2.png" class="figure-img img-fluid rounded-circle utama" alt="testi 2">
          <figcaption class="figure-caption">
            <h5>Sunny Jimin</h5>
            <p>Designer</p>
          </figcaption>
        </figure>
        <figure class="figure">
          <img src="img/landing-page/tester3.png" class="figure-img img-fluid rounded-circle" alt="testi 3">
        </figure> 
      </section>
    <!-- akhir testimonial -->

    <!-- footer -->
    <div class="row footer">
      <div class="col text-center" style="margin-bottom: 15px;">
        <p>2023 All Rights Reserved<span>&copy;</span> by Group 16</p>
      </div>
    </div>
    <!-- akhir footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
