@extends('layouts.app')

@include('inc.header')

@section('content')



  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="seminar-about" class="section-bg">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">{{ $category->category_name}}</h3>
          <span class="section-divider"></span>
          
          <div class="container">
    <div class="row">
        <div class='col-sm-6'>
            
        </div>
        
        </script>
    </div>
</div>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img wow fadeInLeft">
            <img src="img/about-img.jpg" alt="">
          </div>

          <div class="col-lg-6 content wow fadeInRight">
            <p>
                {{ $category->description }}
            </p>
          </div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Product Featuress Section
    ============================-->
    <section id="about">
      <div class="container">

        <div class="row">

          <div class="col-sm-8 offset-sm-2">
            @foreach ($seminars as $seminar)
            <div class="jumbotron wow fadeIn">
            <h3 class="lead">{{ $seminar->seminar_name }}</h3>
            <img src="{{URL::asset('images').'/'.$seminar->speaker_photo_image}}" class="img-fluid"><br><br>
            
            <h5><i class="fas fa-user-tie"></i> {{$seminar->speaker}}</h5>
            <p class="description">{{$seminar->description}}</p>
            </div>
            @endforeach
          </div>

        </div>

      </div>

    </section><!-- #features -->


    
  </main>

  @include('inc.footer')
  
@endsection
