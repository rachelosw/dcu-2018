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
                </ul>
            </div>
            <div class="col-md-9 dashboard-container">
            <h3 class="display-4">Hi, {{Auth::user()->name}}!</h3>
                <div class="jumbotron">
                <div class="icon"><i class="fas fa-check-square"></i></i></div>
                <p class="lead">Thank you! You have completed all the steps of DCU seminar registration. Please check your email for seminar schedule. Looking forward to meeting you on the D-Day!</p>
                <hr class="my-4">
                
                </div>
            </div>
            
            </div>
        </div>
    </div>
</div>
</section>

@include('inc.footer')
@endsection
