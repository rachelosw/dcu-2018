@extends('layouts.app')

@include('inc.header')

@section('content')
<section id="call-to-action">
<div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h2 class="cta-title">Payment</h2>
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
            <h3 class="display-4">Please make a payment via bank transfer to the following account:</h3>
                <div class="jumbotron">
                <p class="lead">{{ $account_bank }} {{ $account_number }} a/n {{ $account_name }}</p>
        
                </div>
                <div class="row">
                    <h2>Rp {{ number_format($price_student, 0) }}</h2> <span> student</span>
                    
                </div>
                <div class="row">
                <h2>Rp {{ number_format($price, 0) }}</h2> <span> non-student</span>
                    @if ($type === 'early')
                    <p>*Harga di atas merupakan harga early bird, segera bayar sebelum {{ $early_end_date }} untuk mendapatkan harga ini.</p> 
                    @endif
                    </div>


            </div>
            
            </div>
        </div>
    </div>
</div>
</section>

@include('inc.footer')
@endsection
