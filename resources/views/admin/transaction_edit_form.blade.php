@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Transactions Edit Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">Transactions Edit Form</li>
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
                            <h2><strong>Transactions Edit</strong> Form</h2>
                        </div>
                        <div class="body">
                            <form action="{{route('transactions.update',$data->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Accounts Head</b></p>
                                        <select class="form-control show-tick acc_head" data-href="{{ url('accountTypeByAjax')}}" name="acc_head_id">
                                            <option value="">Please Select</option>
                                            @foreach($accounts_head as $accounts)
                                                <option @if($data->account_head_id == $accounts->id) {{'selected="selected"'}} @endif value="{{$accounts->id}}">
                                                    {{$accounts->account_title}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Transaction Type</b></p>
                                        <select class="form-control show-tick" name="tran_type_id">
                                            <option value="">Please Select</option>
                                            @foreach($tran_type as $tran)
                                                <option @if($data->transaction_type_id == $tran->id) {{'selected="selected"'}} @endif value="{{$tran->id}}">
                                                    {{$tran->transaction_type_name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Transaction For</b></p>
                                        <select class="form-control show-tick" name="re_pay" required>
                                            <option value="">Please Select</option>
                                            <option @if($data->received_payment == "Received") {{'selected="selected"'}} @endif value="Received">Received</option>
                                            <option @if($data->received_payment == "Payment") {{'selected="selected"'}} @endif value="Payment">Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="transaction_for">
                                            @if(!empty($list_data))
                                                <p><b>{{$name}} Name</b></p>
                                                <select class="form-control show-tick" name="acc_type_id">
                                                    <option value="">Please Select</option>
                                                    @foreach($list_data as $list)
                                                        <option @if($data->transactionable_id == $list->id) {{'selected="selected"'}} @endif value="{{$name.'_'.$list->id}}">
                                                            {{$list->dataName}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="last_payment_data"></div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <p><b>Comments</b></p>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comments" cols="10" rows="5">{{$data->comment}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $months = explode('/',$data->months_for);
                                ?>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <p><b>Month Form</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control monthpicker month_form" name="month_form" value="{{date('F Y',strtotime($months[0]))}}" placeholder="Please Choose From Month">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p><b>Month To</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control monthpicker month_to" name="month_to" value="<?php if(!empty($months[1])){echo date('F Y',strtotime($months[1]));} ?>" placeholder="Please Choose To Month">
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <p><b>Amount</b></p>
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="tran_amount" value="{{$data->amount}}" placeholder="Enter Transaction Amount">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Voucher No</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="voucher_no" value="{{$data->voucher_no}}" placeholder="Enter Voucher Number">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <p><b>Transaction Date</b></p>
                                        <div class="form-group">
                                            <input type="text" class="form-control datetimepicker" name="tran_date" value="{{date('l d F Y',strtotime($data->transaction_date))}}" placeholder="Please Choose Transaction Date">
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