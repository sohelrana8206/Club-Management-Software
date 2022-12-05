<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th>SR. NO</th>
            <th>Accounts</th>
            <th>Transaction</th>
            <th>Transaction For</th>
            <th>Voucher</th>
            <th>Transaction Date</th>
            <th>Amount</th>
        </tr>
        </thead>
        <tbody>
        @if(!empty($opening_balance))
            <tr>
                <td></td>
                <td colspan="5">Opening Balance</td>
                <td><strong>{{$opening_balance}}/-</strong></td>
            </tr>
            @endif
        <?php $count = 1;?>
        @foreach($transaction_result as $row)
            <tr>
                <td>{{$count}}</td>
                <td>{{$row->account_title->account_title}}</td>
                <td>
                    <?php
                    if($row->transaction_type_id == 1){
                        echo 'Cash';
                    }else{
                        echo 'Bank';
                    }
                    ?>
                </td>
                <td>{{$row->received_payment}}</td>
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
                <td colspan="5">{{$text}}</td>
                <td><strong>{{$closing_balance}}/-</strong></td>
            </tr>
            @endif
        </tbody>
    </table>
</div>