@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Notice Edit Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Notice Edit Form</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Notice Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('notice.update',$data->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Notice Title</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="notice_title" value="{{$data->notice_title}}" placeholder="Enter Notice Title">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Notice Details</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="notice_details" rows="5" cols="10">{{$data->notice_details}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Publish Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="pub_date" value="{{date('l d F Y',strtotime($data->publish_date))}}" placeholder="Please Choose Publish Date">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">UPDATE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection