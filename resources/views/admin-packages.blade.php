@extends('layouts.admin')
@include('inc.admin-header')
@section('admin-index')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Seminar Packages</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Seminar Packages</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                    
                            <h3 class="box-title">Seminar Packages</h3>
                            <div class="table-responsive">
                                <table id="table" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Package</th>
                                            <th>Quota</th>
                                            <th>Registrants</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($packages as $package)
                                        <tr class="item{{$package->id}}">
                                            <td>{{ $package->id }}</td>
                                            <td>{{ $package->name }}</td>
                                            <td>{{ $package->quota}}</td>
                                            <td>{{ $package->registrant}}</td>
                                            <td>@if ($package->isClosed)
                                                Closed
                                                @else
                                                Open
                                                @endif</td>
                                            <td>
                                            <button id="change-quota" class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#change-quota-{{ $package->id }}">Change quota</button>
                                            
                                            <div id="change-quota-{{$package->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Set Quota</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                        <form action="{{ route('admin.setQuota', $package) }}" method="POST" class="remove-record-model">
                                                            @csrf
                                                            @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="packet" class="col-md-12">{{ __('Paket Seminar') }}</label>
                                                                    <div class="col-md-12">
                                                                    <input type="number" name="quota" class="form-control form-control-line" value="{{ old('quota') }}" required autofocus>
                                                                    @if ($errors->has('quota'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('quota') }}</strong>
                                                                            </span>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-action waves-effect waves-light">Update</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            
            
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    @include('inc.admin-js')
    <script>
        $(document).ready( function () {
            $('table').DataTable();
        } );
 </script>
    
    <!-- /#wrapper -->
    
        