@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Activities Details
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Activities Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Activities</strong> Details </h2>
                            <a class="header-dropdown" href="{{url('activity')}}"><button class="btn btn-default">Activities List</button></a>
                        </div>
                        <div class="body">
                            <h3>{{$data->title}}</h3>
                            <div class="row">
                                <div class="col-12">
                                    <div class="body_img">
                                        <img align="left" width="300px" src="{{url('public/uploads/activities/thumbnail/'.$data->image)}}">
                                    </div>
                                    {!! $data->details !!}
                                </div>
                            </div>
                            <div class="row mt-3">
                                <?php
                                    if(!empty($data->extra_img)){
                                    $extImg = explode(',',$data->extra_img);
                                        foreach($extImg as $img){ ?>
                                            <div class="col-3">
                                                <img src="{{url('public/uploads/activities/thumbnail/'.$img)}}">
                                            </div>
                                    <?php }} ?>
                            </div>
                            <p style="background: #191818;padding: 10px;color: #fff;border-radius: 15px;width: 23%;text-align: center;float: right;" class="mt-3"><strong>Publish Date: {{date('d F, Y',strtotime($data->publish_date))}}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection