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
                        <form class="form-horizontal form-material" method="POST" action="{{route('admin.saveSettings') }}" aria-label="{{ __('Settings') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="account_number" class="col-md-12">{{ __('Nomor Rekening') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="account_number" class="form-control form-control-line" value="{{ $data->account_number }}" required autofocus>
                                        @if ($errors->has('account_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('account_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="account_bank" class="col-md-12">{{ __('Bank') }}</label>
                                    <div class="col-md-12">
                                    <input type="text" name="account_bank" class="form-control form-control-line" value="{{ $data->account_bank }}" required autofocus>
                                    @if ($errors->has('account_bank'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_bank') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="account_name" class="col-md-12">{{ __('Nama Rekening') }}</label>
                                    <div class="col-md-12">
                                    <input type="text" name="account_name" class="form-control form-control-line" value="{{ $data->account_name }}" required autofocus>
                                    @if ($errors->has('account_name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('account_name') }}</strong>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="open_registration" class="col-md-12">{{ __('Waktu pembukaan registrasi') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="open_registration" id="datetimepicker" value="{{ $data->open_registration }}" class="form-control" required autofocus> 
                                        
                                        @if ($errors->has('open_registration'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('open_registration') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="close_early_bird" class="col-md-12">{{ __('Waktu tutup early bird') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="close_early_bird" id="datetimepicker2" value="{{ $data->close_early_bird }}" class="form-control" required autofocus> 
                                        
                                        @if ($errors->has('close_early_bird'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('close_early_bird') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="close_registration" class="col-md-12">{{ __('Waktu tutup registrasi') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="close_registration" id="datetimepicker3" value="{{ $data->close_registration }}" class="form-control" required autofocus> 
                                        
                                        @if ($errors->has('close_registration'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('close_registration') }}</strong>
                                            </span>
                                    @endif
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="price_normal" class="col-md-12">{{ __('Harga normal') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="price_normal" value="{{ $data->price_normal }}" class="form-control form-control-line" required autofocus> 
                                        @if ($errors->has('price_normal'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price_normal') }}</strong>
                                            </span>
                                    @endif
                                        </div>

                                </div>
                                <div class="form-group">
                                    <label for="price_early" class="col-md-12">{{ __('Harga early bird') }}</label>
                                    <div class="col-md-12">
                                        <input type="text" name="price_early" value="{{ $data->price_early }}" class="form-control form-control-line" required autofocus> 
                                        @if ($errors->has('price_early'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('price_early') }}</strong>
                                            </span>
                                    @endif
                                        </div>

                                </div>
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Change settings</button>
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

  $('#datetimepicker2').datetimepicker({
      format: 'YYYY-MM-DD HH:mm'
  });

  $('#datetimepicker3').datetimepicker({
      format: 'YYYY-MM-DD HH:mm'
  });
});
                                </script>
        