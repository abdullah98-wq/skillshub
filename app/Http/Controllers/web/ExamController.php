<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    //

    public function show($id){

        $data['exam']=Exam::findorFail($id);

        $user=Auth::user();
        if($user!==null){
            $pivotRow=$user->exam()->where('exam_id',$id)->first();
            $data['enter_exam']=true;
            if($pivotRow!==null&&$pivotRow->pivot->status=='closed'){
                $data['enter_exam']=false;

            }


        }

        return view('web.exams.show')->with($data);
    }

    public function questions($examId){
        $data['exam']=Exam::findorFail($examId);
        return view('web.exams.questions')->with($data);
        if(session('prev')!=="start/$examId"){
            return redirect(url("exam/questions/$examId"));

        }
    }

    public function start($examId,Request $request){
      $user=Auth::user();
      if(!$user->$exams->contains($examId)){
          $user->exams()->attach($examId);
      }else{
          $user->exams()->updateExistingpivot('$examId',[
              'status'=>'closed'
          ]);
      }
     $request->session()->flash('prev',"start/$examId");
      return redirect(url("exam/questions/$examId"));

    }


    public function submit($examId,Request $request){

     $request->validate([
        'answers'=>'required|array',
        'answers.*'=>'required|in :1,2,3,4',
     ]);
     $points=0;
     $score=0;
        $exam=Exam::findorFail($examId);
        foreach($exam->questions as $question){
            if(isset($request->answers[$question->id])){
                $userans=$request->answers[$question->id];
                $rightans=$question->right_ans;
                if($userans==$rightans){
                    $points+=1;
                }
            }
        }
        $ques_num=$exam->questions->count();

            $score=($points/$ques_num)*100;


            $user=Auth::user();
            $pivotRow=$user->exams()->where('exam_id',$examId)->first();
              $starttime=$pivotRow->pivot->created_at;
              $submittime=Carbon::now();

              $time_Mins=$submittime->diffInMinutes($starttime);
                 if($time_Mins>$pivotRow->duration_mins){
                     $score=0;
                 }
              $user->exams()->updateExistingpivot($examId,[
                  'score'=>$score,
                  'time_Mins'=>$time_Mins,
              ]);

              $request->session()->flash("sucess","you finishe exam suceesfully" ,$score);
              return redirect(url("exam/show/$examId"));

    }
}
