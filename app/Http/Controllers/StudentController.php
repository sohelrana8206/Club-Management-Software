<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Image;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::select('*')->orderBy('id','desc')->get();

        return view('admin/student_list',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student_type = DB::table('student_types')->get();
        return view('admin/student_add_form',['data'=> $student_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student_name = $request->input('student_name');
        $fathers_name = $request->input('fathers_name');
        $mothers_name = $request->input('mothers_name');
        $present_address = $request->input('present_address');
        $edu_status = $request->input('edu_status');
        $std_mobile = $request->input('std_mobile');
        $fathers_mobile = $request->input('fathers_mobile');
        $admit_date = date('Y-m-d',strtotime($request->input('admit_date')));
        $admit_fee = $request->input('admit_fee');
        $student_type = $request->input('student_type');

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/students/thumbnail');
            $img = Image::make($image->path());
            $img->resize(300, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/students'), $fileName);

            $data = array(
                'student_name'=>$student_name,
                "student_photo"=>$fileName,
                "student_fathers_name"=>$fathers_name,
                "student_mothers_name"=>$mothers_name,
                "student_address"=>$present_address,
                "student_education"=>$edu_status,
                "student_mobile"=>$std_mobile,
                "student_fathers_mobile"=>$fathers_mobile,
                "admission_date"=>$admit_date,
                "admission_fee"=>$admit_fee,
                "student_type_id"=>$student_type,
                "create_user"=>session('userID'),
                "created_at"=>date('Y-m-d h:i:s')
            );
            Student::create($data);

            return back()
                ->with('toast_success','Student Information Successfully Added.');
        }else{
            return back()
                ->with('toast_success','Image Upload Problem.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student_info = Student::with('student_type_name')->find($id);

        require_once base_path() . '/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf();
        $html = view('admin/std_info',['data'=> $student_info]);
        $mpdf->WriteHTML($html);
        $mpdf->Output('student.pdf','I');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Student::find($id);
        $student_type = DB::table('student_types')->get()->pluck('student_type_name','id');
        return view('admin/student_edit_form',['data' => $data, 'student_type' => $student_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student_name = $request->input('student_name');
        $fathers_name = $request->input('fathers_name');
        $mothers_name = $request->input('mothers_name');
        $present_address = $request->input('present_address');
        $edu_status = $request->input('edu_status');
        $std_mobile = $request->input('std_mobile');
        $fathers_mobile = $request->input('fathers_mobile');
        $admit_date = date('Y-m-d',strtotime($request->input('admit_date')));
        $admit_fee = $request->input('admit_fee');
        $student_type = $request->input('student_type');

        if($request->hasFile('photo')){
            $image = $request->file('photo');
            $extension = $image->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $destinationPath = public_path('/uploads/students/thumbnail');
            $img = Image::make($image->path());
            $img->resize(300, 350, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$fileName);
            $image->move(public_path('uploads/students'), $fileName);

            $data = array(
                'student_name'=>$student_name,
                "student_photo"=>$fileName,
                "student_fathers_name"=>$fathers_name,
                "student_mothers_name"=>$mothers_name,
                "student_address"=>$present_address,
                "student_education"=>$edu_status,
                "student_mobile"=>$std_mobile,
                "student_fathers_mobile"=>$fathers_mobile,
                "admission_date"=>$admit_date,
                "admission_fee"=>$admit_fee,
                "student_type_id"=>$student_type,
                "update_user"=>session('userID'),
                "updated_at"=>date('Y-m-d h:i:s')
            );
            $record = Student::find($id);
            $record->update($data);

            return back()
                ->with('toast_success','Student Information Successfully Updated.');
        }else{
            $data = array(
                'student_name'=>$student_name,
                "student_fathers_name"=>$fathers_name,
                "student_mothers_name"=>$mothers_name,
                "student_address"=>$present_address,
                "student_education"=>$edu_status,
                "student_mobile"=>$std_mobile,
                "student_fathers_mobile"=>$fathers_mobile,
                "admission_date"=>$admit_date,
                "admission_fee"=>$admit_fee,
                "student_type_id"=>$student_type,
                "update_user"=>session('userID'),
                "updated_at"=>date('Y-m-d h:i:s')
            );
            $record = Student::find($id);
            $record->update($data);

            return back()
                ->with('success','Student Information Successfully Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Student::find($id);
        $record->delete();
    }

    public function students_payment_history(Request $request){
        $stdID = $request->input('id');
        $student = Student::find($stdID);
        $studentID = $student->id;
        $student_name = $student->transactions($studentID);

        return view('admin/reports/student_payment_history',['student_name'=> $student_name]);
    }
}
