@extends('layouts.app')

@include('inc.header')

@section('content')
<section id="call-to-action">
<div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h2 class="cta-title">Dashboard</h2>
        </div>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
        <div class="row">
            <div class="col-md-3 dashboard-sidebar">
                <ul>
                    <li><a href="{{ route('auth.edit') }}">Edit profile</a></li>
                    <li><a href="{{ route('auth.upload') }}">Re-upload payment proof</a></li>
</ul>
            </div>
            <div class="col-md-9 dashboard-container">
            <h3 class="display-4">Hi, {{Auth::user()->name}}!</h3>
                <div class="jumbotron">
                <div class="icon"><i class="far fa-clock"></i></div>
                <p class="lead">Thank you for uploading your payment proof. Our seminar staff will review your data and payment. You will get an email notification when your payment has been confirmed</p>
                <a class="btn btn-primary btn-lg" href="{{ route('auth.upload') }}" role="button">Re-upload your payment proof</a>
                </div>
                


            </div>
            
            </div>
        </div>
    </div>
</div>
</section>

@include('inc.footer')
@endsection
