@extends('layout.admin_layout')
@section('content')



    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users List</h1>
                </div>

            </div>
        </div>
    </section>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Information List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Facebook</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->mobile_number_1}} <br>{{$user->mobile_number_2}}</td>
                                <td><a target="_blank" href="{{$user->facebook_url}}">Facebook</a></td>
                                <td>{{$user->created_at}}</td>
                                @if($user->login_status==1 && $user->delete_status==1)
                                    <td class="text-success">Approve</td>
                                @elseif($user->login_status==1 && $user->delete_status==0)
                                    <td class="text-success"></td>
                                @elseif($user->login_status==0 && $user->delete_status==0)
                                    <td class="text-danger">Delete</td>
                                @else
                                    <td class="text-warning">Pending</td>
                                @endif

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            @if($user->delete_status==1 && $user->delete_status==0)
                                                <li><a href="{{route('userRecycle',['id'=>Crypt::encrypt($user->id)])}}"><i class="fa fa-recycle"></i>Recycle</a></li>
                                            @elseif($user->login_status==0 && $user->delete_status==0)
                                                <li><a href="{{route('userRecycle',['id'=>Crypt::encrypt($user->id)])}}"><i class="fa fa-recycle"></i>Recycle</a></li>
                                            @elseif($user->login_status==0 && $user->delete_status==1)
                                                <li><a href="{{route('userApprove',['id'=>Crypt::encrypt($user->id)])}}"><i class="fa fa-play-circle"></i>Approve</a></li>
                                                <li><a href="{{route('userDelete',['id'=>Crypt::encrypt($user->id)])}}"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>
                                            @elseif($user->login_status==1 && $user->delete_status==1)
                                                <li><a href="{{route('userSuspend',['id'=>Crypt::encrypt($user->id)])}}"><i class="fa fa-pause-circle"></i>Suspend</a></li>
                                                <li><a  href="{{route('userDelete',['id'=>Crypt::encrypt($user->id)])}}"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

                                            @endif
                                        </ul>
                                    </div>

                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Facebook</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix justify-content-end">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection