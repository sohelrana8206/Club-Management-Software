<h3 class="mb-0 mt-5 text-center">{{$acc_head_name->account_title}}</h3>
<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th>SR. NO</th>
            <th>Transaction</th>
            <th>Voucher</th>
            <th>Transaction Date</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($opening_balance))
            <tr>
                <td></td>
                <td colspan="3">Opening Balance</td>
                <td><strong>{{$opening_balance}}/-</strong></td>
            </tr>
        @endif
        <?php $count = 1;?>
        @foreach($transaction_result as $row)
            <tr>
                <td>{{$count}}</td>
                <td>
                    <?php
                    if($row->transaction_type_id == 1){
                        echo 'Cash';
                    }else{
                        echo 'Bank';
                    }
                    if(!empty($dataInfo)){
                        $dataID = $row->transactionable_id;
                        $filtered = $dataInfo->filter(function ($value, $key) use ($dataID) {
                            return $value->id == $dataID;
                        });
                        $last_data = $filtered->last();
                        echo '<p style="margin-bottom: 0;font-weight: 700">'.$last_data->dataName.'</p>';
                    }
                    $months_for = explode('/',$row->months_for);
                    $first_month = $months_for[0];
                    $second_month = $months_for[1];
                    if(!empty($second_month)){
                        echo '<p style="margin-bottom: 0;font-weight: 700">'.date('F Y',strtotime($first_month)).' - '.date('F Y',strtotime($second_month)).'</p>';
                    }else{
                        echo '<p style="margin-bottom: 0;font-weight: 700">'.date('F Y',strtotime($first_month)).'</p>';
                    }
                    ?>
                </td>
                <td>{{$row->voucher_no}}</td>
                <td>
                    {{ date('d F, Y',strtotime($row->transaction_date))}}
                </td>
                <td>{{$row->amount}}</td>
            </tr>
            <?php $count++; ?>
        @endforeach
        @if(!empty($closing_balance))
            <tr>
                <td></td>
                <td colspan="3">Closing Balance</td>
                <td><strong>{{$closing_balance}}/-</strong></td>
            </tr>
        @endif
        </tbody>
    </table>
</div>