@extends('template/admin_master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>All Members Dues List
                        <small class="text-muted">Iqbal Road Club Ltd</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{url('dashboard')}}"><i class="zmdi zmdi-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active">All Members Dues List</li>
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
                            <h2><strong>All Members Dues List</strong></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>Member ID</th>
                                        <th>Member Name</th>
                                        <th>Dues Months</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Member ID</th>
                                        <th>Member Name</th>
                                        <th>Dues Months</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($memberInfo as $row)
                                        <tr>
                                            <td>{{$row->member_id}}</td>
                                            <td>{{$row->member_name}}</td>
                                            <td>
                                                <?php
                                                $memID = $row->id;
                                                $filtered = $data->filter(function ($value, $key) use ($memID) {
                                                    return $value->transactionable_id == $memID;
                                                });
                                                ?>
                                                <?php
                                                $last_data = $filtered->last();
                                                $months_for = explode('/',$last_data->months_for);
                                                $first_month = $months_for[0];
                                                $second_month = $months_for[1];
                                                ?>
                                                @if(!empty($second_month))
                                                    @if(date('Y-m',strtotime($second_month)) == date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($second_month)) > date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($second_month.' + 1 month')) == date('Y-m'))
                                                        {{date('M Y',strtotime($second_month.' + 1 month'))}}
                                                    @else
                                                        <?php
                                                        $year1 = date('Y', strtotime($second_month));
                                                        $year2 = date('Y');

                                                        $month1 = date('m', strtotime($second_month));
                                                        $month2 = date('m');
                                                        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                                        ?>
                                                        {{date('M Y',strtotime($second_month.' + 1 month')).' to '.date('M Y')}}
                                                    @endif
                                                @else
                                                    @if(date('Y-m',strtotime($first_month)) == date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($first_month)) > date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($first_month.' + 1 month')) == date('Y-m'))
                                                        {{date('M Y',strtotime($first_month.' + 1 month'))}}
                                                    @else
                                                        <?php
                                                        $year1 = date('Y', strtotime($first_month));
                                                        $year2 = date('Y');

                                                        $month1 = date('m', strtotime($first_month));
                                                        $month2 = date('m');
                                                        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                                        ?>
                                                        {{date('M Y',strtotime($first_month.' + 1 month')).' to '.date('M Y')}}
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                <?php
                                                $last_data = $filtered->last();
                                                $months_for = explode('/',$last_data->months_for);
                                                $first_month = $months_for[0];
                                                $second_month = $months_for[1];
                                                ?>
                                                @if(!empty($second_month))
                                                    @if(date('Y-m',strtotime($second_month)) == date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($second_month)) > date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($second_month.' + 1 month')) == date('Y-m'))
                                                        <p style="font-weight: bolder;"> 500/-</p>
                                                    @else
                                                        <?php
                                                        $year1 = date('Y', strtotime($second_month));
                                                        $year2 = date('Y');

                                                        $month1 = date('m', strtotime($second_month));
                                                        $month2 = date('m');
                                                        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                                        ?>
                                                        <p style="font-weight: bolder;"> {{$diff*500}}/-</p>
                                                    @endif
                                                @else
                                                    @if(date('Y-m',strtotime($first_month)) == date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($first_month)) > date('Y-m'))
                                                        {{'NULL'}}
                                                    @elseif(date('Y-m',strtotime($first_month.' + 1 month')) == date('Y-m'))
                                                        <p style="font-weight: bolder;"> 500/-</p>
                                                    @else
                                                        <?php
                                                        $year1 = date('Y', strtotime($first_month));
                                                        $year2 = date('Y');

                                                        $month1 = date('m', strtotime($first_month));
                                                        $month2 = date('m');
                                                        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
                                                        ?>
                                                        <p style="font-weight: bolder"> {{$diff*500}}/-</p>
                                                    @endif
                                                @endif
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