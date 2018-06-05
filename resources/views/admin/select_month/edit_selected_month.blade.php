@extends('layout.admin_layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Category</h1>
                </div>

            </div>
        </div>
    </section>

<div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Update category</h3>

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
                    <form action="{{route('updateMonthCategory',['id'=>Crypt::encrypt($categoryEdit->id)])}}" method="post">
                        <div class="row">

                            {{csrf_field()}}

                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" name="month_category" value="{{$categoryEdit->month_category}}" placeholder="Create a month category" class="form-control">
                                    <span class="text-danger">{{$errors->first('month_category')}}</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary">Update category</button>

                            </div>
                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>
@endsection