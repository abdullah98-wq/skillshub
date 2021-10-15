<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index(){
        $student_role=role::where('name','student')->first();
        $data['students']=User::where('role_id',$student_role->id)->orderby('id','desc')->paginate(3);

        return view('admin.student.index')->with($data);

    }
    public function showScores($id){

      $student=  User::findorFail($id);
       if($student->role->name!=='student'){
          return back();

       }
         $data['student']=$student;
     //    $data['exams']=$student->exams->first();
           return view('admin.student.show-scores')->with($data);

    }
    public function openExam($examId,$studentId){

        $student=  User::findorFail($studentId);
        $student->exams()->updateExistingpivot($examId,[
            'status'=>'opened',
        ]);
        return back();
    }
}
