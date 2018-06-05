@extends('layout.admin_layout')
@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users Month wise Document</h1>
                </div>

            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Month wise Document List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-custom-responsive">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Posted by</th>
                            <th>Email</th>
                            <th>Month</th>
                            <th>Date</th>
                            <th>Download Doc/Docx file</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        @foreach($documents as $document)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{\Illuminate\Support\Str::words($document->title, $words = 10, $end = '..')}}</td>
                                <td>{{$document->user->name}}</td>
                                <td>{{$document->user->email}}</td>
                                <td>{{$document->month_name}}</td>
                                <td>{{$document->created_at}}</td>
                                <td><a href="{{asset($document->file)}}">Download</a></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-gear tiny-icon"></i><span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                            <li><a href="#" onclick="return checkDelete('{{route('monthWiseDocDelete',['id'=>Crypt::encrypt($document->id)])}};')"><i class="fa fa-trash tiny-icon"></i>Delete</a>
                                            </li>


                                        </ul>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Posted by</th>
                            <th>Email</th>
                            <th>Month</th>
                            <th>Date</th>
                            <th>Download Doc/Docx file</th>
                            <th style="text-align: center;">Action</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix justify-content-end">
                    {{$documents->links()}}
                </div>
            </div>
        </div>
    </div>







@endsection