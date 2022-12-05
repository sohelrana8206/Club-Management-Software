@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Student List
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Student List</li>
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
                            <h2><strong>Student</strong> List </h2>
                            <a class="header-dropdown" href="{{route('student.create')}}"><button class="btn btn-default">+ Add Student</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Address</th>
                                        <th>Mobile Number</th>
                                        <th>Admission Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Address</th>
                                        <th>Mobile Number</th>
                                        <th>Admission Date</th>
                                        <th>Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->student_name}}</td>
                                            <td>{{$row->student_address}}</td>
                                            <td>{{$row->student_mobile}}</td>
                                            <td>{{$row->admission_date}}</td>
                                            <td>
                                                @if($row->status ==1)
                                                    {{'Active'}}
                                                @else {{'Inactive'}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('student.show',$row->id)}}" title="Show">
                                                    <i class="material-icons">visibility</i>
                                                </a>

                                                <a href="{{route('student.edit',$row->id)}}" title="Edit">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>

                                                <a style="cursor: pointer" class="del-ac" data-href="{{ route('student.destroy', $row->id)}}" data-id="{{$row->id}}" title="Delete">
                                                    <i class="material-icons">delete</i>
                                                </a>

                                                <a data-id="{{$row->id}}" data-href="{{url('students_payment_history')}}" class="payment_history" style="cursor: pointer">
                                                    <i class="material-icons">assignment</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection

<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class=" payment_history_data">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>