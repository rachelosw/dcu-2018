@extends('layouts.admin')
@include('inc.admin-header')
@section('admin-index')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Kategori Seminar {{ $category->category_name }}</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Kategori</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    </div>
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                        <form class="form-horizontal form-material" method="POST" action="{{route('admin.categoryEdited', $category) }}" aria-label="{{ __('Edit Kategori Seminar') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                                <div class="form-group">
                                    <label for="description" class="col-md-12">{{ __('Deskripsi') }}</label>
                                    <div class="col-md-12">
                                    <textarea rows="5" name="description" class="form-control form-control-line" required autofocus>{{ $category->description }}</textarea>
                                
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Kategori</button>
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
        