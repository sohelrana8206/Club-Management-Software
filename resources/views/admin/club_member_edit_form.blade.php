@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Club Member Edit Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Club Member Edit Form</li>
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
                            <h2><strong>Club Member Edit</strong> Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('club_members.update',$data->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PUT')
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Member ID</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="member_id" value="{{$data->member_id}}" placeholder="Enter Member ID">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <p><b>Member Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="member_name" value="{{$data->member_name}}" placeholder="Enter Member Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Present Address</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="present_address" rows="5" cols="10">{{$data->member_address}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Member Photo</b></p>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="photo" placeholder="Upload Student Photo">
                                    </div>
                                    <img style="border: 1px solid #ccc;padding: 2px" width="80px" src="{{asset('public/uploads/club_members/thumbnail/'.$data->member_photo)}}">
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Member Email</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" value="{{$data->member_email}}" placeholder="Enter Member Email Address">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Member Mobile No.</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="member_mobile" value="{{$data->member_mobile}}" placeholder="Enter Members Mobile Number">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Membership Type</b></p>
                                    <select class="form-control show-tick" name="membership_type">
                                        <option value="">Please Select</option>
                                        @foreach($membership_type as $type)
                                            <option @if($data->membership_type_id == $type->id) {{'selected="selected"'}} @endif value="{{$type->id}}">{{$type->membership_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Membership Reference</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="_mem_ref" value="{{$data->membership_reference}}" placeholder="Enter Membership Reference Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Join Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="admit_date" value="{{date('l d F Y',strtotime($data->member_join_date))}}" placeholder="Please Choose Admission Date">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Membership Fee</b></p>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="admit_fee" value="{{$data->membership_fee}}" placeholder="Enter Students Admission Fee">
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