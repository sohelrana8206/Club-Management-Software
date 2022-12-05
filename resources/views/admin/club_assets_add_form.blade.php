@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Club Assets Add Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Club Assets Add Form</li>
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
                            <h2><strong>Club Assets Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('route' => 'club_assets.store')) }}
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Club Assets Name</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="club_assets_name" placeholder="Enter Club Assets Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Quantity</b></p>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Status</b></p>
                                    {{Form::select('status', ['1' => 'Active', '0' => 'Inactive'], '1')}}
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Comments</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="comments"></textarea>
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