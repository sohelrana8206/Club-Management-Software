<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model
{
    protected $fillable = [
        'student_name',
        'student_photo',
        'student_fathers_name',
        'student_mothers_name',
        'student_address',
        'student_education',
        'student_mobile',
        'student_fathers_mobile',
        'admission_date',
        'admission_fee',
        'student_type_id',
        'status',
        'create_user',
    ];

    public function student_type_name(){
        return $this->belongsTo('App\Student_type','student_type_id');
    }

    public function transactions($studentID)
    {
        $students = DB::table('transactions')
            ->join('students','transactions.transactionable_id' , '=','students.id','LEFT')
            ->where('transactions.transactionable_id', $studentID)
            ->where('transactions.transactionable_type', 'Student')
            ->orderBy('transactions.id', 'desc')
            ->select('transactions.*','students.*')
            ->get();

        return $students;
    }

    public function all_students_due()
    {
        $students = DB::table('transactions')
            ->where('transactionable_type', 'Student')
            ->select('*')
            ->get();

        return $students;
    }
}
