@extends('layouts.app')

@include('inc.header')

@section('content')
<section id="call-to-action">
<div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h2 class="cta-title">Confirm payment</h2>
        </div>

    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 form-container">
        <div class="form">
                @if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your upload<br><br>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
        @if ($message = Session::get('success'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button>
		        <strong>{{ $message }}</strong>
		</div>
		<img src="/images/{{ Session::get('path') }}" class="img-fluid"><br><br>
		@endif
        <form action="{{ route('auth.uploaded') }}" enctype="multipart/form-data" method="POST">
        @csrf

                        <div class="form-group row">
                            <label for="upload" class="col-sm-4 col-form-label text-md-right">{{ __('Upload payment proof') }}</label>

                            <div class="col-md-6">
                            <input type="file" name="image" />
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Upload') }}
                                </button><br><br>
                                <a href="{{ URL::previous() }}">< Go Back</a>
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
    
