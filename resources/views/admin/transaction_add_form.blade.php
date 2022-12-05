@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Transaction Add Form
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">CTransaction Add Form</li>
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
                            <h2><strong>Transaction Add</strong> Form</h2>
                        </div>
                        <div class="body">
                            {{ Form::open(array('route' => 'transactions.store')) }}
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Accounts Head</b></p>
                                    <select class="form-control show-tick acc_head" data-href="{{ url('accountTypeByAjax')}}" name="acc_head_id">
                                        <option value="">Please Select</option>
                                        @foreach($accounts_head as $accounts)
                                            <option value="{{$accounts->id}}">
                                                {{$accounts->account_title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Transaction Type</b></p>
                                    <select class="form-control show-tick" name="tran_type_id" required>
                                        <option value="">Please Select</option>
                                        @foreach($tran_type as $tran)
                                            <option value="{{$tran->id}}">
                                                {{$tran->transaction_type_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Transaction For</b></p>
                                    <select class="form-control show-tick" name="re_pay" required>
                                        <option value="">Please Select</option>
                                        <option value="Received">Received</option>
                                        <option value="Payment">Payment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="transaction_for"></div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="last_payment_data"></div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <p><b>Comments</b></p>
                                    <div class="form-group">
                                        <textarea class="form-control" name="comments" cols="10" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <p><b>Month Form</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control monthpicker month_form" name="month_form" placeholder="Please Choose From Month">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <p><b>Month To</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control monthpicker month_to" name="month_to" placeholder="Please Choose To Month">
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <p><b>Amount</b></p>
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="tran_amount" placeholder="Enter Transaction Amount">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Voucher No</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="voucher_no" placeholder="Enter Voucher Number">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <p><b>Transaction Date</b></p>
                                    <div class="form-group">
                                        <input type="text" class="form-control datetimepicker" name="tran_date" placeholder="Please Choose Transaction Date">
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