@extends('layout.admin_layout')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Footer</h1>
                </div>

            </div>
        </div>
    </section>




    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Update footer</h3>

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
                    <form action="{{route('updateFooter',['id'=>Crypt::encrypt($singleFooter->id)])}}" method="post">

                    <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="address_info"  placeholder="Type footer address" class="form-control">{{$singleFooter->address_info}}</textarea>
                                    <span class="text-danger">{{$errors->first('address_info')}}</span>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea name="contact_info"  placeholder="Type footer contact" class="form-control">{{$singleFooter->contact_info}}</textarea>
                                    <span class="text-danger">{{$errors->first('contact_info')}}</span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary">Update footer</button>
                                <a href="{{route('showDashboard')}}" class="btn btn-primary">back</a>

                            </div>
                        </div>
                    </form>

                </div>



            </div>
        </div>
    </div>







@endsection