<div class="logo">
    <img width="100px" src="{{public_path('assets/images/IRCL-logo.png')}}">
</div>
<h2 class="club-name">Iqbal Road Club Ltd.</h2>
<h4>Student Information:</h4>
<table class="table table-style-four">
    <tr>
        <td>Name</td>
        <td> : </td>
        <td>{{$data->student_name}}</td>
        <td rowspan="3">
            <div style="padding: 5px;">
                <img style="border: 1px solid #ccc;padding: 2px" width="150px" src="{{public_path('uploads/students/thumbnail/'.$data->student_photo)}}">
            </div>
        </td>
    </tr>
    <tr>
        <td>Father's Name</td>
        <td> : </td>
        <td>{{$data->student_fathers_name}}</td>
    </tr>
    <tr>
        <td>Mother's Name</td>
        <td> : </td>
        <td>{{$data->student_mothers_name}}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td> : </td>
        <td>{{$data->student_address}}</td>
    </tr>
    <tr>
        <td>Student Education</td>
        <td> : </td>
        <td>{{$data->student_education}}</td>
    </tr>
    <tr>
        <td>Student Mobile</td>
        <td> : </td>
        <td>{{$data->student_mobile}}</td>
    </tr>
    <tr>
        <td>Guardian Mobile</td>
        <td> : </td>
        <td>{{$data->student_fathers_mobile}}</td>
    </tr>
    <tr>
        <td>Student Type</td>
        <td> : </td>
        <td>{{$data->student_type_name->student_type_name}}</td>
    </tr>
    <tr>
        <td>Admission Date</td>
        <td> : </td>
        <td>{{date('d M, Y', strtotime($data->admission_date))}}</td>
    </tr>
</table>