@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Activities Add Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Activities Add Form</li>
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
                            <h2><strong>Activities Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('route' => 'activity.store', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Activities Title</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="activities_title" placeholder="Enter Activities Title" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Activities Details</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" id="editor" name="activities_details"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Activities Image</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="img[]" placeholder="Upload Activities Image" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Activities Video</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="video_path" placeholder="Enter Activities Video Path">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-8">
                                    <p><b>Activities Extra Image</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="img[]" multiple placeholder="Upload Activities Extra Image">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Activities Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="activities_date" placeholder="Please Choose Admission Date" required>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">ADD</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Vertical Layout -->
        </div>
    </section>
@endsection