<div class="logo">
    <img width="100px" src="{{public_path('assets/images/IRCL-logo.png')}}">
</div>
<h2 class="club-name">Iqbal Road Club Ltd.</h2>
<h4>Club Members Subscription Payment Information:</h4>
<table class="table table-style-four">
    <tr>
        <td>Member ID</td>
        <td> : </td>
        <td>{{$data->get_member_info->members_id}}</td>
        <td rowspan="3">
            <div style="padding: 5px;">
                <img style="border: 1px solid #ccc;padding: 2px" width="150px" src="{{public_path('uploads/club_members/thumbnail/'.$data->get_member_info->members_photo)}}">
            </div>
        </td>
    </tr>
    <tr>
        <td>Members Name</td>
        <td> : </td>
        <td>{{$data->get_member_info->members_name}}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td> : </td>
        <td>{{$data->get_member_info->members_address}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td> : </td>
        <td>{{$data->get_member_info->members_email}}</td>
    </tr>
    <tr>
        <td>Mobile</td>
        <td> : </td>
        <td>{{$data->get_member_info->members_mobile}}</td>
    </tr>
    <tr>
        <td>Subscriptions For</td>
        <td> : </td>
        <td>{{date('M\'y',strtotime($data->months_from)).' - '.date('M\'y',strtotime($data->months_to))}}</td>
    </tr>
    <tr>
        <td>Total Amount</td>
        <td> : </td>
        <td>{{$data->get_tran_info->transaction_amount}}</td>
    </tr>
    <tr>
        <td>Voucher Number</td>
        <td> : </td>
        <td>{{$data->get_tran_info->voucher_no}}</td>
    </tr>
    <tr>
        <td>Payment Date</td>
        <td> : </td>
        <td>{{date('d M, Y', strtotime($data->get_tran_info->transaction_date))}}</td>
    </tr>
</table>