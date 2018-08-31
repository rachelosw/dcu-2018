@extends('layouts.admin')
@include('inc.admin-header')
@section('admin-index')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Profile Page</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                        <form class="form-horizontal form-material" method="POST" action="{{route('admin.seminarEdited', $seminar) }}" aria-label="{{ __('Edit Seminar') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                                <div class="form-group">
                                    <label for="seminar_name" class="col-md-12">{{ __('Judul Seminar') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="seminar_name" class="form-control form-control-line" value="{{ $seminar->seminar_name }}" required autofocus>
                                        @if ($errors->has('seminar_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('seminar_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="seminar_category" class="col-md-12">{{ __('Kategori seminar') }}</label>
                                    <div class="col-md-12">
                                    <select name="seminar_category" class="form-control form-control-line">
                                            <option>{{ $seminar->seminar_category }}</option>
                                            @foreach ($categories as $category)
                                            <option>{{ $category }}</option>
                                            @endforeach
                                        </select>
                                    @if ($errors->has('seminar_category'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('seminar_category') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seminar_time" class="col-md-12">{{ __('Waktu seminar') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="seminar_time" id="datetimepicker" value="{{ $seminar->seminar_time }}" class="form-control" required autofocus> 
                                        
                                        @if ($errors->has('seminar_time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('seminar_time') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="speaker" class="col-md-12">{{ __('Lokasi') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="location" value="{{ $seminar->location }}" class="form-control form-control-line" required autofocus> 
                                        @if ($errors->has('location'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span>
                                    @endif
                                        </div>

                                </div>
                                <div class="form-group">
                                    <label for="speaker" class="col-md-12">{{ __('Pembicara') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="speaker" value="{{ $seminar->speaker }}" class="form-control form-control-line" required autofocus> 
                                        @if ($errors->has('speaker'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('speaker') }}</strong>
                                            </span>
                                    @endif
                                        </div>

                                </div>
                                <div class="form-group">
                                    <label for="speaker_photo_image" class="col-md-12">{{ __('Upload Foto pembicara') }}</label>
                                    <div class="col-md-12">
                                    <input type="file" name="speaker_photo_image" class="form-control form-control-line">
                                    @if ($errors->has('speaker_photo_image'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('speaker_photo_image') }}</strong>
                                            </span>
                                    @endif
                                        
                                    </div>
                                </div>
                            
                                <div class="form-group">
                                    <label for="description" class="col-md-12">{{ __('Deskripsi seminar') }}</label>
                                    <div class="col-sm-12">
                                        <textarea rows="5" name="description" class="form-control form-control-line" required autofocus>{{ $seminar->description }}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Edit seminar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>

        @include('inc.admin-js')
        <script type="text/javascript">
$(function () {
  $('#datetimepicker').datetimepicker({
      format: 'YYYY-MM-DD HH:mm'
  });
});
                                </script>
        