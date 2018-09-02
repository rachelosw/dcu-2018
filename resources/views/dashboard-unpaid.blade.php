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
                    <li><a href="{{ route('auth.payment') }}">Make payment</a></li>
                    <li><a href="{{ route('auth.upload') }}">Confirm payment</a></li>
</ul>
            </div>
            <div class="col-md-9 dashboard-container">
            <h3 class="display-4">Hi, {{Auth::user()->name}}!</h3>
                <div class="jumbotron">
                <div class="icon"><i class="fas fa-pencil-alt"></i></div>
                <p class="lead">Thank you for registering yourself for DCU 2018. Please follow these steps to get yourself a seat on our seminars.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('auth.payment') }}" role="button">Make your payment</a>
                <a class="btn btn-primary btn-lg" href="{{route('auth.upload')}}" role="button">Confirm payment</a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="icon text-center"><i class="fas fa-money-bill"></i></div>
                    <p>Make your payment, then kindly <i>upload</i> your payment proof.</p>
                    </div>
                    <div class="col-md-4">
                    <div class="icon text-center"><i class="far fa-clock"></i></div>
                    <p>Please wait, our seminar staff will verify your payment. You will get an email notification when your registration have been accepted.</p>
                    </div>
                    <div class="col-md-4">
                    <div class="icon text-center"><i class="fas fa-check"></i></div>
                    <p>Upon confirmation, you can pick the DCU Opportunity seminars package of your choice. Then, you will get an email with the seminars schedule attached.</p>
                    </div>
                </div>


            </div>
            
            </div>
        </div>
    </div>
</div>
</section>

@include('inc.footer')
@endsection
