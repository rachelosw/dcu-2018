@extends('layouts.app')

@include('inc.header')

@section('content')
<section id="call-to-action">
<div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h2 class="cta-title">Select DCU Opportunity Seminar Package</h2>
        </div>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 package-container">
        <div class="row">
                    <div class="col-md-3">
                        @php
                        $packageA = App\SeminarPacket::where('name', 'A')->first();
                        $isSeminarAClosed = $packageA->isClosed;
                        @endphp
                        <div class="package-box @if($isSeminarAClosed)
                        disabled
                        @endif">
                        @foreach ($seminarA as $seminar)
                        <div class="seminar-box">
                        <div class="jumbotron">
                        <p class="lead">{{$seminar->seminar_name}}</p>
                        <hr class="my-4">
                        <p><i class="far fa-clock"></i> {{$seminar->seminar_time}}</p>
                        <p><i class="fas fa-map-marked-alt"></i> {{$seminar->location}}</p>
                        <p><i class="fas fa-user-tie"></i> {{$seminar->speaker}}</p>
                        </div>
                        </div>
                        @endforeach
                        @if ($isSeminarAClosed)
                            Seminar ini sudah memenuhi kuota
                        @else
                        <center><button class="btn" data-toggle="modal" data-target="#modal-a" role="button">Select</button></center>
                        <div id="modal-a" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Select Seminar Package</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <form action="{{ route('auth.seminarChosen', $packageA) }}" method="POST" class="remove-record-model">
                                                            @csrf
                                                            @method('PATCH')
                                                    <div class="modal-body">
                                                        <p>Pilih paket A?</p>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                    <button type="submit" class="btn btn-action waves-effect waves-light" >Pilih</button>
                                                        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                        @endif
                    </div>
                    </div>
                    <div class="col-md-3">
                        @php
                        $packageB = App\SeminarPacket::where('name', 'B')->first();
                        $isSeminarBClosed = $packageB->isClosed;
                        @endphp
                        <div class="package-box @if($isSeminarBClosed)
                        disabled
                        @endif">
                        @foreach ($seminarB as $seminar)
                        <div class="seminar-box">
                        <div class="jumbotron">
                        <p class="lead">{{$seminar->seminar_name}}</p>
                        <hr class="my-4">
                        <p><i class="far fa-clock"></i> {{$seminar->seminar_time}}</p>
                        <p><i class="fas fa-map-marked-alt"></i> {{$seminar->location}}</p>
                        <p><i class="fas fa-user-tie"></i> {{$seminar->speaker}}</p>
                        </div>
                        </div>
                        @endforeach
                        @if ($isSeminarBClosed)
                        Seminar ini sudah memenuhi kuota
                        @else
                    <center><button class="btn" data-toggle="modal" data-target="#modal-b" role="button">Select</button></center>
                    <div id="modal-b" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Select Seminar Package</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form action="{{ route('auth.seminarChosen', $packageB) }}" method="POST" class="remove-record-model">
                                                        @csrf
                                                        @method('PATCH')
                                                <div class="modal-body">
                                                    <p>Pilih paket B?</p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-action waves-effect waves-light" >Pilih</button>
                                                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                    @endif
                    </div>
                    </div>
                    <div class="col-md-3">
                        @php
                        $packageC = App\SeminarPacket::where('name', 'C')->first();
                        $isSeminarCClosed = $packageC->isClosed;
                        @endphp
                        <div class="package-box @if($isSeminarCClosed)
                        disabled
                        @endif">
                        @foreach ($seminarC as $seminar)
                        <div class="seminar-box">
                        <div class="jumbotron">
                        <p class="lead">{{$seminar->seminar_name}}</p>
                        <hr class="my-4">
                        <p><i class="far fa-clock"></i> {{$seminar->seminar_time}}</p>
                        <p><i class="fas fa-map-marked-alt"></i> {{$seminar->location}}</p>
                        <p><i class="fas fa-user-tie"></i> {{$seminar->speaker}}</p>
                        </div>
                        </div>
                        @endforeach
                        @if ($isSeminarCClosed)
                        Seminar ini sudah memenuhi kuota
                    @else
                    <center><button class="btn" data-toggle="modal" data-target="#modal-c" role="button">Select</button></center>
                    <div id="modal-c" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Select Seminar Package</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form action="{{ route('auth.seminarChosen', $packageC) }}" method="POST" class="remove-record-model">
                                                        @csrf
                                                        @method('PATCH')
                                                <div class="modal-body">
                                                    <p>Pilih paket C?</p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-action waves-effect waves-light" >Pilih</button>
                                                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                    @endif
                    </div>
                    </div>
                    <div class="col-md-3">
                        @php
                        $packageD = App\SeminarPacket::where('name', 'D')->first();
                        $isSeminarDClosed = $packageD->isClosed;
                        @endphp
                        <div class="package-box @if($isSeminarDClosed)
                        disabled
                        @endif">
                        @foreach ($seminarD as $seminar)
                        <div class="seminar-box">
                        <div class="jumbotron">
                        <p class="lead">{{$seminar->seminar_name}}</p>
                        <hr class="my-4">
                        <p><i class="far fa-clock"></i> {{$seminar->seminar_time}}</p>
                        <p><i class="fas fa-map-marked-alt"></i> {{$seminar->location}}</p>
                        <p><i class="fas fa-user-tie"></i> {{$seminar->speaker}}</p>
                        </div>
                        </div>
                        @endforeach
                        @if ($isSeminarDClosed)
                        Seminar ini sudah memenuhi kuota
                    @else
                    <center><button class="btn" data-toggle="modal" data-target="#modal-d" role="button">Select</button></center>
                    <div id="modal-d" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Select Seminar Package</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
                                                <form action="{{ route('auth.seminarChosen', $packageD) }}" method="POST" class="remove-record-model">
                                                        @csrf
                                                        @method('PATCH')
                                                <div class="modal-body">
                                                    <p>Pilih paket D?</p>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                <button type="submit" class="btn btn-action waves-effect waves-light" >Pilih</button>
                                                    <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                    @endif
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
