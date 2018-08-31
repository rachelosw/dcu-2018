@extends('layouts.app')

@include('inc.header')

@section('content')
<section id="call-to-action">
<div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h2 class="cta-title">Edit Profile</h2>
        </div>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 form-container">
        <div class="form">
                    <form method="POST" action="{{route('auth.update', Auth::user())}}" aria-label="{{ __('Update') }}">
                    @csrf
                    @method('PATCH')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal lahir') }}</label>

                          
                                <div class='col-md-6'>
                                <input type='text' class="form-control" id='datetimepicker' class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ Auth::user()->birthday }}" required autofocus>
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="institution" class="col-md-4 col-form-label text-md-right">{{ __('Institusi') }}</label>

                            <div class="col-md-6">
                                <input id="institution" type="text" class="form-control" name="institution" value="{{ Auth::user()->institution }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ktp_ktm_number" class="col-md-4 col-form-label text-md-right">{{ __('No. KTP/KTM') }}</label>

                            <div class="col-md-6">
                                <input id="ktp_ktm_number" type="text" class="form-control{{ $errors->has('ktp_ktm_number') ? ' is-invalid' : '' }}" name="ktp_ktm_number" value="{{ Auth::user()->ktp_ktm_number }}" required autofocus>

                                @if ($errors->has('ktp_ktm_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ktp_ktm_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" required autofocus>{{ Auth::user()->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('No. HP') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ Auth::user()->phone_number }}" required autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="line_id" class="col-md-4 col-form-label text-md-right">{{ __('ID Line') }}</label>

                            <div class="col-md-6">
                                <input id="line_id" type="text" class="form-control{{ $errors->has('line_id') ? ' is-invalid' : '' }}" name="line_id" value="{{ Auth::user()->line_id }}" required autofocus>

                                @if ($errors->has('line_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('line_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@include('inc.footer')
@endsection
