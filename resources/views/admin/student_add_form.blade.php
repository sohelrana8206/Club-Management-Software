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
                        <li class="breadcrumb-item active">Student Add Form</li>
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
                            <h2><strong>Student Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('route' => 'student.store', 'files'=> true)) }}
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Student Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="student_name" placeholder="Enter Student Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Student Photo</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="photo" placeholder="Upload Student Photo">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Fathers Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fathers_name" placeholder="Enter Students Father Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Mothers Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="mothers_name" placeholder="Enter Students Mother Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Present Address</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="present_address" rows="5" cols="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Education Status</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="edu_status" placeholder="Enter Students Education">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Student Mobile</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="std_mobile" placeholder="Enter Students Mobile Number">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Student Fathers Mobile</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="fathers_mobile" placeholder="Enter Students Fathers Mobile">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Admission Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="admit_date" placeholder="Please Choose Admission Date">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Admission Fee</b></p>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="admit_fee" placeholder="Enter Students Admission Fee">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Student Type</b></p>
                                    <select class="form-control show-tick" name="student_type">
                                        <option value="">Please Select</option>
                                        @foreach($data as $type)
                                            <option value="{{$type->id}}">{{$type->student_type_name}}</option>
                                        @endforeach
                                    </select>
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