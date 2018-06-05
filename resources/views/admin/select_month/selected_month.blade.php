@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create and Selected Category</h1>
                </div>

            </div>
        </div>
    </section>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Create Category</h3>

                    <span>
                    @if(session()->has('success'))
                            <span class="text-success">{{session()->get('success')}}</span>
                        @endif
                        @if(session()->has('error'))
                            <span class="text-danger">{{session()->get('error')}}</span>
                        @endif
                </span>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('createMonthCategory')}}" method="post">
                        <div class="row">

                            {{csrf_field()}}

                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" name="month_category" value="{{old('month_category')}}" placeholder="Create a month category" class="form-control">
                                    <span class="text-danger">{{$errors->first('month_category')}}</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary">Create category</button>

                            </div>
                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th style="text-align:center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$category->month_category}}</td>
                                @if($category->select_status=='unselected')
                                    <td class="text-warning">Unselected</td>

                                @else
                                    <td class="text-success">Selected</td>
                                @endif
                                <td style="text-align: center;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">

                                            @if($category->select_status=='unselected')
                                                <li><a href="{{route('categorySelected',['id'=>Crypt::encrypt($category->id)])}}"><i class="fa fa-arrow-right"></i>Select</a></li>
                                                <li><a href="{{route('categoryEdit',['id'=>Crypt::encrypt($category->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                <li><a href="#" onclick="return checkDelete('{{route('categoryDelete',['id'=>Crypt::encrypt($category->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

                                            @else
                                                <li><a href="{{route('categoryEdit',['id'=>Crypt::encrypt($category->id)])}}"><i class="fa fa-pencil tiny-icon"></i>Edit</a></li>
                                                <li><a href="#" onclick="return checkDelete('{{route('categoryDelete',['id'=>Crypt::encrypt($category->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a></li>

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
                            <th>Category Name</th>
                            <th>Status</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix justify-content-end">
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection