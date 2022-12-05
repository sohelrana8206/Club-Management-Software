<div class="logo">
    <img width="100px" src="{{public_path('assets/images/IRCL-logo.png')}}">
</div>
<h2 class="club-name">Iqbal Road Club Ltd.</h2>
<h4>Club Member's Information:</h4>
<table class="table table-style-four">
    <tr>
        <td>Member ID</td>
        <td> : </td>
        <td>{{$data->member_id}}</td>
        <td rowspan="3">
            <div style="padding: 5px;">
                <img style="border: 1px solid #ccc;padding: 2px" width="150px" src="{{public_path('uploads/club_members/thumbnail/'.$data->member_photo)}}">
            </div>
        </td>
    </tr>
    <tr>
        <td>Name</td>
        <td> : </td>
        <td>{{$data->member_name}}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td> : </td>
        <td>{{$data->member_address}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td> : </td>
        <td>{{$data->member_email}}</td>
    </tr>
    <tr>
        <td>Mobile</td>
        <td> : </td>
        <td>{{$data->member_mobile}}</td>
    </tr>
    <tr>
        <td>Referance</td>
        <td> : </td>
        <td>{{$data->membership_reference}}</td>
    </tr>
    <tr>
        <td>Join Date</td>
        <td> : </td>
        <td>{{date('d M, Y', strtotime($data->member_join_date))}}</td>
    </tr>
</table>