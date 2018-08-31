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
                <p class="lead">Terimakasih sudah mendaftarkan dirimu. Ikuti 3 langkah di bawah ini untuk memastikan kehadiranmu di DCU 2018.</p>
                <a class="btn btn-primary btn-lg" href="{{ route('auth.payment') }}" role="button">Make your payment</a>
                <a class="btn btn-primary btn-lg" href="{{route('auth.upload')}}" role="button">Confirm payment</a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <div class="icon text-center"><i class="fas fa-money-bill"></i></div>
                    <p>Lakukan pembayaran. Kamu wajib menyelesaikan pembayaran sebelum maju ke tahap selanjutnya. Setelah itu, konfirmasi pembayaranmu dengan meng-<i>upload</i> bukti transfer.</p>
                    </div>
                    <div class="col-md-4">
                    <div class="icon text-center"><i class="far fa-clock"></i></div>
                    <p>Silakan menunggu. Panitia akan mengonfirmasi data-data <i>profile</i> dan pembayaranmu. Kamu akan mendapat notifikasi melalui email jika pembayaranmu sudah dikonfirmasi.</p>
                    </div>
                    <div class="col-md-4">
                    <div class="icon text-center"><i class="fas fa-check"></i></div>
                    <p>Setelah panitia mengonfirmasi pembayaranmu, kamu bisa memilih paket seminar <b>DCU Opportunities</b> yang kamu minati. Kamu hanya bisa melakukan pemilihan sekali dan pilihanmu tidak bisa diubah lagi.</p>
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
