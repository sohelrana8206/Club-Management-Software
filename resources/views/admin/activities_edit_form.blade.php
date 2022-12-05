@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Activities Edit Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Activities Edit Form</li>
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
                            <h2><strong>Activities Edit</strong> Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('activity.update',$data->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Activities Title</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="activities_title" value="{{$data->title}}" placeholder="Enter Activities Title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Activities Details</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" id="editor" name="activities_details">{{$data->details}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Activities Image</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="img[]" placeholder="Upload Activities Image">
                                    </div>
                                    <img align="left" width="100px" src="{{url('public/uploads/activities/thumbnail/'.$data->image)}}">
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Activities Video</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="video_path"  value="{{$data->video_path}}" placeholder="Enter Activities Video Path">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-8">
                                    <p><b>Activities Extra Image</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="img[]" multiple placeholder="Upload Activities Extra Image">
                                    </div>
                                    <?php
                                    if(!empty($data->extra_img)){
                                    $extImg = explode(',',$data->extra_img);
                                    foreach($extImg as $img){ ?>
                                    <img width="70px" src="{{url('public/uploads/activities/thumbnail/'.$img)}}">
                                    <?php }} ?>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Activities Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="activities_date" value="{{date('l d F Y',strtotime($data->publish_date))}}" placeholder="Please Choose Admission Date" required>
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