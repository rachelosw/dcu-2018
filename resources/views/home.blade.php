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
    <p>Learn more about this event</p>
    <a href="{{route('about')}}" class="btn-get-started scrollto">Learn more</a>
  </div>
  </div>
  <div class="carousel-item">
  <img class="img-fluid" src="{{ asset('img/slider2.jpg') }}" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
    <h2>{{ $countdown }} days to go</h2>
    <p>before the registration closed. Make sure you get yourself a seat.</p>
    <a href="{{route('about')}}" class="btn-get-started scrollto">Learn more</a>
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

    <section id="about" class="section-bg">
      <div class="container-fluid">
        <div class="section-header  col-sm-10 offset-sm-1">
          <h3 class="section-title">Doctor's Career Updates 2018</h3>
          <span class="section-divider"></span>
          <p class="section-description">
          Doctor’s Career Updates (DCU) is the foremost, the biggest, and the most illustrious seminar exploring assorted careers in medical fields in Indonesia as it proudly presents you medical doctors from ranging fields and backgrounds as its speakers.
          </p>
        
        </div>
    </section>
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
        <img src="{{ asset('img/specials.png') }}" class="img-fluid"><br>
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
          <p class="section-description">Follow these steps to register yourself</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="icon ion-ios-paper-outline"></i></div>
              <h4 class="title"><a href="">Register yourself</a></h4>
              <p class="description">Sign up for an account <a href="{{ route('register') }}">here.</a> Please make sure to fill in your data correctly.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="icon ion-ios-pricetag-outline"></i></div>
              <h4 class="title"><a href="">Make your payment</a></h4>
              <p class="description">Pay for the amount written on the payment page via bank transfer, before uploading the picture of your payment proof.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInLeft">
              <div class="icon"><i class="icon ion-ios-clock-outline"></i></div>
              <h4 class="title"><a href="">Wait for confirmation</a></h4>
              <p class="description">Our seminar staff will verify your data and payment. Then we will change your status to <b>accepted</b></p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box wow fadeInRight">
              <div class="icon"><i class="icon ion-ios-checkmark-outline"></i></div>
              <h4 class="title"><a href="">Choose your Seminar Package</a></h4>
              <p class="description">After your registration is confirmed, pick a <a href="#">DCU Opportunity</a> seminar package of your choice. You will get a confirmation email with the seminars schedule attached.</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- #more-features -->

    <!--==========================
      Clients
    ============================-->
    <section id="clients">
     
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
              <h4><span>Student</span> <sup>Rp</sup>{{ number_format($price_student_early, 0) }}</h4>
              <h4><span>Non-student</span> <sup>Rp</sup>{{ number_format($price_early, 0) }}</h4>
                
            </div>
          </div>

          <div class="col-md-6">
            <div class="box wow fadeInRight">
              <h3>Normal</h3>
              <h4><span>Student</span> <sup>Rp</sup>{{ number_format($price_student_normal, 0) }}</h4>
              <h4><span>Non-student</span> <sup>Rp</sup>{{ number_format($price_normal, 0) }}</h4>
            </div>
          </div>

          <p>* Early bird rate only applies until {{$close_early}}</p>

        </div>
      </div>
    </section>


   

  </main>

  @include('inc.footer')
  
@endsection
