@extends('layouts.app')

@include('inc.header')

@section('content')

<section id="intro">

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
  
</ol>
<div class="carousel-inner">
  <div class="carousel-item active">
    <img class="img-fluid" src="{{ asset('img/slider1.jpg') }}" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
    <h2>Welcome to DCU 2018</h2>
    <p>Pelajari lebih lanjut tentang DCU tahun ini</p>
    <a href="#about" class="btn-get-started scrollto">Learn more</a>
  </div>
  </div>
  <div class="carousel-item">
  <img class="img-fluid" src="{{ asset('img/slider2.jpg') }}" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
    <h2>{{ $countdown }} days to go</h2>
    <p>Segera daftarkan dirimu sebelum pendaftaran ditutup!</p>
    <a href="#about" class="btn-get-started scrollto">Learn more</a>
  </div>
  
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
</a>
</div>


  </section><!-- #intro -->

  <main id="main">

    <!-- <section id="about" class="section-bg">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Doctor's Career Updates 2018</h3>
          <span class="section-divider"></span>
          <p class="section-description">
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque<br>
            sunt in culpa qui officia deserunt mollit anim id est laborum
          </p>
          <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            
    </div>
</div>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img wow fadeInLeft">
            <img src="img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content wow fadeInRight">
            <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elite storium paralate</h2>
            <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>

            <ul>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>

            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Libero justo laoreet sit amet cursus sit amet dictum sit. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec
            </p>
          </div>
        </div>

      </div>
    </section> -->
    <section id="features">
      <div class="container">

        <div class="row">

          
        <div class="col-sm-3">
        <img src="{{ asset('img/inspiration.png') }}" class="img-fluid">
        <a href="{{ route('dcu-inspiration') }}" class="btn-common">Learn more</a>
        </div>

        <div class="col-sm-3">
        <img src="{{ asset('img/opportunity.png') }}" class="img-fluid"><br>
        <a href="{{ route('dcu-opportunity') }}" class="btn-common">Learn more</a>
        </div>

        <div class="col-sm-3">
        <img src="{{ asset('img/specials.png') }}" class="img-fluid">
        <a href="{{ route('dcu-specials') }}" class="btn-common">Learn more</a>
        </div>

        <div class="col-sm-3">
        <img src="{{ asset('img/care.png') }}" class="img-fluid"><br>
        <a href="{{ route('dcu-care') }}" class="btn-common">Learn more</a>
        </div>

      </div>

    </section><!-- #features -->


    <!--==========================
      More Features Section
    ============================-->
    <section id="more-features" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Don't miss it!</h3>
          <span class="section-divider"></span>
          <p class="section-description">Ikuti langkah-langkah berikut untuk mendaftar</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="icon ion-ios-paper-outline"></i></div>
              <h4 class="title"><a href="">Register yourself</a></h4>
              <p class="description">Daftarkan dirimu di <a href="{{ route('register') }}">sini.</a> Isi lengkap data-datamu dan pastikan terisi dengan benar.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="icon ion-ios-pricetag-outline"></i></div>
              <h4 class="title"><a href="">Make your payment</a></h4>
              <p class="description">Lakukan pembayaran sesuai dengan harga yang tertera di halaman pembayaran. Setelah itu, upload bukti pembayaranmu.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="icon ion-ios-clock-outline"></i></div>
              <h4 class="title"><a href="">Wait for confirmation</a></h4>
              <p class="description">Panitia akan me-review data-data dan pembayaranmu. Setelah itu panitia akan mengubah status pendaftaranmu menjadi terkonfirmasi.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="icon ion-ios-checkmark-outline"></i></div>
              <h4 class="title"><a href="">Choose your Seminar Package</a></h4>
              <p class="description">Setelah terkonfirmasi, pilihlah paket seminar <a href="#">DCU Opportunities</a> pilihanmu. Setelah itu kamu akan mendapat email konfirmasi dan jadwal seminar.</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #more-features -->

    <!--==========================
      Clients
    ============================-->
    <section id="clients">
      <div class="container">

        <div class="row wow fadeInUp">

          <div class="col-md-2">
            <img src="img/clients/client-1.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-2.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-3.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-4.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-5.png" alt="">
          </div>

          <div class="col-md-2">
            <img src="img/clients/client-6.png" alt="">
          </div>

        </div>
      </div>
    </section>
    <section id="pricing" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Pricing</h3>
          <span class="section-divider"></span>
          
        </div>

        <div class="row">

          <div class="col-md-6">
            <div class="box featured wow fadeInLeft">
              <h3>Early bird</h3>
              <h4><sup>Rp</sup>{{$price_early}}</h4>
            </div>
          </div>

          <div class="col-md-6">
            <div class="box wow fadeInRight">
              <h3>Normal</h3>
              <h4><sup>Rp</sup>{{$price_normal}}</h4>
            </div>
          </div>

         

        </div>
      </div>
    </section>


   

  </main>

  @include('inc.footer')
  
@endsection
