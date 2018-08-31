@extends('layouts.admin')
@include('inc.admin-header')
@section('admin-index')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Basic Table</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Basic Table</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                        <a class="btn btn-success" href="{{route('admin.addSeminar') }}">Tambah seminar</a>
                            <h3 class="box-title">Daftar Seminar</h3>
                            <div class="table-responsive">
                                <table id="table" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Seminar</th>
                                            <th>Kategori</th>
                                            <th>Paket</th>
                                            <th>Waktu seminar</th>
                                            <th>Lokasi</th>
                                            <th>Pembicara</th>
                                            <th>Foto pembicara</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $seminar)
                                        <tr class="item{{$seminar->id}}">
                                            <td>{{ $seminar->id }}</td>
                                            <td>{{ $seminar->seminar_name }}</td>
                                            <td>{{ $seminar->seminar_category}}</td>
                                            <td>{{ $seminar->seminar_package}}</td>
                                            <td>{{ $seminar->seminar_time }}</td>
                                            <td>{{ $seminar->location }}</td>
                                            <td>{{ $seminar->speaker }}</td>
                                            <td>@if ($seminar->speaker_photo_image !== null)
                                            <button id="proof-button" class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#proof-modal-{{$seminar->id}}">Lihat foto</button>
                                            <div id="proof-modal-{{$seminar->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Foto pembicara</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                        <img src="{{URL::asset('images').'/'.$seminar->speaker_photo_image}}" class="img-fluid">
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect waves-light" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        Tidak ada foto
                                        @endif
                                            </td>
                                            <td>{{ $seminar->description }}</td>
                                            <td>
                                            <a href="{{route('admin.editSeminar', $seminar)}}" class="btn btn-default waves-effect">Edit</a>
                                            @if ($seminar->seminar_category === 'DCU Opportunities')
                                            <button id="change-packet" class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#change-packet-{{ $seminar->id }}">Change packet</button>
                                            
                                            <div id="change-packet-{{$seminar->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Ganti paket</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                        <form action="{{ route('admin.changePacket', $seminar) }}" method="POST" class="remove-record-model">
                                                            @csrf
                                                            @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="packet" class="col-md-12">{{ __('Paket Seminar') }}</label>
                                                                    <div class="col-md-12">
                                                                    <select name="packet" class="form-control form-control-line">
                                                                            @if ($seminar->seminar_package !== null)
                                                                            <option>{{$seminar->seminar_package}}</option>
                                                                            @endif
                                                                            <option>A</option>
                                                                            <option>B</option>
                                                                            <option>C</option>
                                                                            <option>D</option>
                                                                        </select>
                                                                    @if ($errors->has('packet'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('packet') }}</strong>
                                                                            </span>
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-action waves-effect waves-light">Ganti</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <button id="delete-button" class="btn btn-danger waves-effect waves-light remove-record" data-toggle="modal" data-target="#delete-modal-{{$seminar->id}}">Delete</button>
                                            </td>
                                        </tr>
                                        <div id="delete-modal-{{$seminar->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <form action="{{ route('admin.deleteSeminar', $seminar) }}" method="POST" class="remove-record-model">
                                                    {{method_field('DELETE')}}
                                                    {!! csrf_field() !!}
                                                    <div class="modal-body">
                                                        <h4>Hapus seminar berjudul {{$seminar->seminar_name}}?</h4>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
    