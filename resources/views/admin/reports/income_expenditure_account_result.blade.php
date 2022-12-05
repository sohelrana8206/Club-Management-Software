<h3 class="mb-0 mt-5 text-center">IQBAL ROAD CLUB LIMITED</h3>
<h4 class="mt-0 text-center">Receipts and Payments statements for the Month of {{$statement_month}}</h4>
<div class="table-responsive">
    <table style="background: #fff;font-size: 10px" class="table table-bordered">
        <thead>
        <tr>
            <th></th>
            <th width="25%" style="text-align: center">Amount in Taka<br>Month of {{$statement_month}}</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><strong>Opening Balance</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><span style="margin-left: 30px">Cash at bank</span></td>
            <td style="text-align: right">{{$opening_bank}}</td>
        </tr>
        <tr>
            <td><span style="margin-left: 30px">Cash in hand</span></td>
            <td style="text-align: right;">{{$opening_cash}}</td>
        </tr>
        <tr>
            <td style="text-align: right"><strong>Total Opining Balance</strong></td>
            <td style="text-align: right;"><strong style="border-top: 1px solid #444444;border-bottom: 1px solid #444444">{{$opening_bank + $opening_cash}}</strong></td>
        </tr>
        <tr>
            <td><strong>Receipts</strong></td>
            <td></td>
        </tr>
        <?php $totalReceipts = 0;?>
        @foreach($receipts as $row)
            <tr>
                <td><span style="margin-left: 30px">{{$row->account_title}}</span></td>
                <td style="text-align: right">{{$row->totalReceipts}}</td>
                <?php $totalReceipts += $row->totalReceipts; ?>
            </tr>
        @endforeach
        <tr>
            <td style="text-align: right"><strong>Total Collections</strong></td>
            <td style="text-align: right"><strong style="border-top: 1px solid #444444;border-bottom: 1px solid #444444">{{$totalReceipts}}</strong></td>
        </tr>
        <tr>
            <td><strong>Payments</strong></td>
            <td></td>
        </tr>
        <?php $totalPayments = 0;?>
        @foreach($payments as $item)
            <tr>
                <td><span style="margin-left: 30px">{{$item->account_title}}</span></td>
                <td style="text-align: right">{{$item->totalPayment}}</td>
                <?php $totalPayments += $item->totalPayment; ?>
            </tr>
        @endforeach
        <tr>
            <td style="text-align: right"><strong>Total Payments</strong></td>
            <td style="text-align: right"><strong style="border-top: 1px solid #444444;border-bottom: 1px solid #444444">{{$totalPayments}}</strong></td>
        </tr>
        <tr>
            <td style="text-align: right"><strong>Surplus / Deficit</strong></td>
            <td style="text-align: right"><strong style="border-top: 1px solid #444444;border-bottom: 1px solid #444444">{{$totalReceipts - $totalPayments}}</strong></td>
        </tr>
        <tr>
            <td><strong>Closing Balance</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><span style="margin-left: 30px">Cash at bank</span></td>
            <td style="text-align: right">{{$closing_bank}}</td>
        </tr>
        <tr>
            <td><span style="margin-left: 30px">Cash in hand</span></td>
            <td style="text-align: right;">{{$closing_cash}}</td>
        </tr>
        <tr>
            <td style="text-align: right"><strong>Total Closing Balance</strong></td>
            <td style="text-align: right;"><strong style="border-top: 1px solid #444444;border-bottom: 1px solid #444444">{{$closing_bank + $closing_cash}}</strong></td>
        </tr>
        </tbody>
    </table>
</div>