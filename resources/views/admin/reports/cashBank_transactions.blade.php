@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Cash & Bank Transaction Account
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Cash & Bank Transaction Account</li>
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
                            <h2><strong>Cash & Bank Transaction Account</strong></h2>
                        </div>
                        <div class="body">
                            <div class="search_form">
                                <form id="search_form" method="post" data-href="{{url('cashBankAjaxResult')}}">
                                    @csrf
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Transaction Type</b></p>
                                        <select class="form-control show-tick" name="tran_type_id" id="tran_type_id">
                                            <option value="">Please Select</option>
                                            <option value="1">Cash</option>
                                            <option value="2">Bank</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Transaction For</b></p>
                                        <select class="form-control show-tick" name="re_pay" id="re_pay">
                                            <option value="">Please Select</option>
                                            <option value="Received">Received</option>
                                            <option value="Payment">Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Month Form</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control datetimepicker month_form" name="month_form" id="month_form" placeholder="Please Choose From Month">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Month To</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control datetimepicker month_to" name="month_to" id="month_to" placeholder="Please Choose To Month">
                                        </div>
                                    </div>
                                </div>

                                <button id="submit" class="btn btn-raised btn-primary btn-round waves-effect">SEARCH</button>
                                </form>
                            </div>
                            <div class="search_result"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>
@endsection