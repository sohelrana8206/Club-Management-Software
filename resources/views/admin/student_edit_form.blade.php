@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Student Add Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Student Edit Form</li>
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
                            <h2><strong>Student Edit</strong> Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('student.update',$data->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Student Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="student_name" value="{{$data->student_name}}" placeholder="Enter Student Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Student Photo</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="photo" placeholder="Upload Student Photo">
                                    </div>
                                    <img style="border: 1px solid #ccc;padding: 2px" width="80px" src="{{asset('public/uploads/students/thumbnail/'.$data->student_photo)}}">
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Fathers Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fathers_name" value="{{$data->student_fathers_name}}" placeholder="Enter Students Father Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Mothers Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mothers_name" value="{{$data->student_mothers_name}}" placeholder="Enter Students Mother Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Present Address</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="present_address" rows="5" cols="10">{{$data->student_address}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Education Status</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="edu_status" value="{{$data->student_education}}" placeholder="Enter Students Education">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Student Mobile</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="std_mobile" value="{{$data->student_mobile}}" placeholder="Enter Students Mobile Number">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Student Fathers Mobile</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fathers_mobile" value="{{$data->student_fathers_mobile}}" placeholder="Enter Students Fathers Mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Admission Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="admit_date" value="{{date('l d F Y',strtotime($data->admission_date))}}" placeholder="Please Choose Admission Date">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Admission Fee</b></p>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="admit_fee" value="{{$data->admission_fee}}" placeholder="Enter Students Admission Fee">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Student Type</b></p>
                                    {{Form::select('student_type', $student_type, $data->student_type_name,['class' => 'form-control show-tick'])}}
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