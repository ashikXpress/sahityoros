@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>

            </div>
        </div>
    </section>





    <div class="row justify-content-center">

        <div class="col-md-4">
            <div class="img-thumbnail text-center" style="height: 240px">
                <img height="100%" src="{{asset('admin/dist/img/avatar.png')}}" alt="no img">
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Active Admin Profile</h3>
                    <div class="card-tools">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="{{route('adminPasswordChange',['id'=>Crypt::encrypt($admin->id)])}}">Password change</a></li>

                            </ul>
                        </div>
                    </div>
                 </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table">
                        <tbody>
                        <tr>

                            <td>Name: </td>
                            <td>{{$admin->name}}</td>

                        </tr>
                        <tr>

                            <td>Role: </td>
                            <td>{{$admin->admin_role}}</td>

                        </tr>
                        <tr>
                            <td>Mobile number: </td>
                            <td>{{$admin->mobile_number}}</td>

                        </tr>
                        <tr>
                            <td>Email: </td>
                            <td>{{$admin->email}}</td>

                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>



    </div>

    @if(\Auth::guard('admin')&& $admin->admin_role=='Super Admin')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Admin List
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->admin_role}}</td>
                                <td>{{$admin->mobile_number}}</td>
                                <td>{{$admin->email}}</td>
                                @if($admin->admin_status==1 && $admin->admin_delete==1)
                                    <td class="text-success">Active</td>
                                @elseif($admin->admin_status==0 && $admin->admin_delete==1)
                                    <td class="text-warning">Deactivated</td>
                                @elseif($admin->admin_status==0 && $admin->admin_delete==0)
                                    <td class="text-warning"></td>
                                @endif




                                @if($admin->admin_role=='Super Admin')
                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                <li> <a href="{{route('editAdmin',['id'=>Crypt::encrypt($admin->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>
                                @else
                                    <td style="text-align: center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right" role="menu">

                                                @if($admin->admin_delete==1 && $admin->admin_status==1)
                                                    <li><a href="{{route('editAdmin',['id'=>Crypt::encrypt($admin->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                    <li><a href="{{route('suspendAdmin',['id'=>Crypt::encrypt($admin->id)])}}"><i class="fa fa-pause-circle"></i>Suspend</a></li>
                                                    <li><a href="#" onclick="return checkDelete('{{route('deleteAdmin',['id'=>Crypt::encrypt($admin->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>
                                                @elseif($admin->admin_status==0 && $admin->admin_delete==1)
                                                    <li><a href="{{route('editAdmin',['id'=>Crypt::encrypt($admin->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                    <li><a href="{{route('approveAdmin',['id'=>Crypt::encrypt($admin->id)])}}"><i class="fa fa-play-circle"></i>Approve</a></li>
                                                    <li><a href="#" onclick="return checkDelete('{{route('deleteAdmin',['id'=>Crypt::encrypt($admin->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>
                                                @endif


                                            </ul>
                                        </div>
                                    </td>
                                @endif



                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th >SL</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix justify-content-end">
                    {{$admins->links()}}
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection