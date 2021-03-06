@extends('layouts.app')

@include('inc.header')

@section('content')
<section id="call-to-action">
<div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h2 class="cta-title">Select DCU Opportunities Seminar</h2>
        </div>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="row">
            <div class="col-md-3 dashboard-sidebar">
                <li><a href="{{ route('auth.edit') }}">Edit profile</a></li>
                <li><a href="#">Select Seminar</a>
            </div>
            <div class="col-md-9 dashboard-container">
            <h3 class="display-4">Hi, {{Auth::user()->name}}!</h3>
                <div class="jumbotron">
                <div class="icon"><i class="fas fa-check-square"></i></i></div>
                <p class="lead">Terimakasih, pembayaranmu sudah kami terima dan konfirmasi.</p>
                <hr class="my-4">
                <p>Selanjutnya, silakan pilih seminar <i>DCU Opportunities</i> pilihanmu</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Select seminar</a>
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
</section>

@include('inc.footer')
@endsection
