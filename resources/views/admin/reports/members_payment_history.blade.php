@if(count($member_name) > 0)
<h6>Payment History for {{$member_name[0]->member_name}}</h6>

<?php
$last_data = $member_name->first();
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
        {{'Total Subscription Dues for the month of '.date('M Y',strtotime($second_month.' + 1 month'))}}
        <p style="font-weight: bolder;text-align: center">Total Dues 500/-</p>
    @else
        <?php
        $year1 = date('Y', strtotime($second_month));
        $year2 = date('Y');

        $month1 = date('m', strtotime($second_month));
        $month2 = date('m');
        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        ?>
        {{'Total Subscription Dues for the month of '.date('M Y',strtotime($second_month.' + 1 month')).' to '.date('M Y')}}
        <p style="font-weight: bolder;text-align: center">Total Dues {{$diff*500}}/-</p>
    @endif
@else
    @if(date('Y-m',strtotime($first_month)) == date('Y-m'))
        {{'NULL'}}
    @elseif(date('Y-m',strtotime($first_month)) > date('Y-m'))
        {{'NULL'}}
    @elseif(date('Y-m',strtotime($first_month.' + 1 month')) == date('Y-m'))
        {{'Total Subscription Dues for the month of '.date('M Y',strtotime($first_month.' + 1 month'))}}
        <p style="font-weight: bolder;text-align: center">Total Dues 500/-</p>
    @else
        <?php
        $year1 = date('Y', strtotime($first_month));
        $year2 = date('Y');

        $month1 = date('m', strtotime($first_month));
        $month2 = date('m');
        $diff = (($year2 - $year1) * 12) + ($month2 - $month1);
        ?>
        {{'Total Subscription Dues for the month of '.date('M Y',strtotime($first_month.' + 1 month')).' to '.date('M Y')}}
        <p style="font-weight: bolder;text-align: center">Total Dues {{$diff*500}}/-</p>
    @endif
@endif

<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th>SR. NO</th>
            <th>Payment Month</th>
            <th>Transaction Date</th>
        </tr>
        </thead>
        <tbody>
        <?php $count = 1; ?>
        @foreach($member_name as $row)
            <tr>
                <td>{{$count}}</td>
                <td>
                    <?php
                        $months = explode('/',$row->months_for);
                    ?>
                    {{ date('M\'Y',strtotime($months[0]))}}
                        @if(!empty($months[1]))
                            <strong style="font-size: larger"> to </strong>
                            {{ date('M\'Y',strtotime($months[1]))}}
                        @endif
                </td>
                <td>
                    {{ date('d F, Y',strtotime($row->transaction_date))}}
                </td>
            </tr>
            <?php $count++; ?>
        @endforeach
        </tbody>
    </table>
</div>
    @else
    {{'No payment history found of this member.'}}
    @endif