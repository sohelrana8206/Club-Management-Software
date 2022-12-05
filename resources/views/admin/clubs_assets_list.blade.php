@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Club Assets List
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Club Assets List</li>
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
                            <h2><strong>Club</strong> Assets </h2>
                            <a class="header-dropdown" href="{{route('club_assets.create')}}"><button class="btn btn-default">+ Add Club Assets</button></a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Club Asset Name</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Comments</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Club Asset Name</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Comments</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($data as $row)
                                        <tr>
                                            <td>{{$row->inventory_name}}</td>
                                            <td>{{$row->quantity}}</td>
                                            <td>
                                                @if($row->status ==1)
                                                    {{'Active'}}
                                                @else {{'Inactive'}}
                                                @endif
                                            </td>
                                            <td>{{$row->comments}}</td>
                                            <td>
                                                <a href="{{route('club_assets.edit',$row->id)}}" title="Edit">
                                                    <i class="material-icons">mode_edit</i>
                                                </a>
                                                <a style="cursor: pointer" class="del-club-assets" data-href="{{ route('club_assets.destroy', $row->id)}}" data-id="{{$row->id}}" title="Delete">
                                                    <i class="material-icons">delete</i>
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