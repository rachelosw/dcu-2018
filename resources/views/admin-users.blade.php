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
                            <h3 class="box-title">Basic Table</h3>
                            <div class="table-responsive">
                                <table id="table" class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Registration type</th>
                                            <th>Email</th>
                                            <th>Tanggal daftar</th>
                                            <th>Tanggal lahir</th>
                                            <th>Institusi</th>
                                            <th>Nomor KTP/KTM</th>
                                            <th>Alamat</th>
                                            <th>Nomor HP</th>
                                            <th>ID Line</th>
                                            <th>Login terakhir</th>
                                            <th>Bukti pembayaran</th>
                                            <th>Paket pilihan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data as $user)
                                        <tr class="item{{$user->id}}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->status }}</td>
                                            <td>{{ $user->registration_type}}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->birthday }}</td>
                                            <td>{{ $user->institution }}</td>
                                            <td>{{ $user->ktp_ktm_number }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>{{ $user->line_id }}</td>
                                            
                                            <td>{{ $user->last_login }}</td>

                                            @php
                                                $proof = $proofs->where('email', $user->email)->first();
                                            @endphp
                                    
                                            <td>@if ($proof !== null)
                                            <button id="proof-button" class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#proof-modal-{{$user->id}}">Lihat bukti</button>
                                            <div id="proof-modal-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    
                                                    <div class="modal-body">
                                                        <img src="{{URL::asset('images').'/'.$proof->receipt_image_file_name}}" class="img-fluid">
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @elseif ($user->status === 'accepted')
                                            Sudah dihapus
                                            @else
                                            Belum upload
                                            @endif
                                            </td>
                                            <td>{{ $user->seminar_packet}}</td>
                                            <td>
                                            @if ($user->status === 'pending')
                                            <button id="approve-button" class="btn btn-default waves-effect waves-light" data-toggle="modal" data-target="#approve-modal-{{$user->id}}">Approve</button>
                                            @endif
                                            <button id="delete-button" class="btn btn-danger waves-effect waves-light remove-record" data-toggle="modal" data-target="#delete-modal-{{$user->id}}">Delete</button>

                                            </td>
                                        </tr>
                                        
                                        
                                        <div id="delete-modal-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <form action="{{ route('admin.deleteUser', $user) }}" method="POST" class="remove-record-model">
                                                    {{method_field('DELETE')}}
                                                    {!! csrf_field() !!}
                                                    <div class="modal-body">
                                                        <h4>Hapus pendaftar bernama {{$user->name}}?</h4>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="approve-modal-{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                            <div class="modal-dialog" style="width:55%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="custom-width-modalLabel">Delete Record</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <form action="{{ route('admin.approveUser', $user) }}" method="POST" class="remove-record-model">
                                                    {{method_field('PUT')}}
                                                    {!! csrf_field() !!}
                                                    <div class="modal-body">
                                                        <h4>Approve pendaftar bernama {{$user->name}}?</h4>
                                                    </div>
                                                    
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Approve</button>
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
    