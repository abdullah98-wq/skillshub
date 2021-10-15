<?php

namespace App\Http\Controllers\admin;

use App\Events\ExamAddedevent;
use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Exam;
use App\Models\Questions;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function index(){

        $data['exams']=Exam::select('id','name','skill_id','img','questions_no','active')->paginate(3);
          return view('admin.exams.index')->with($data);
      }
      public function show($id)

      {
       $data['exams']=Exam::findorFail($id);
       return view('admin.exams.show')->with($data);

      }
      public function showquestions($id)

      {
       $data['exams']=exam::findorFail($id);
       return view('admin.exams.show-questions')->with($data);

      }

     public function create(){
         $data['skills']=Skill::select('id','name')->get();
         return view('admin.exams.create')->with($data);
     }
     public function store( Request $request){

/*      $request->validate([
            'name_en'=>'required|string|max:50',
            'name_ar'=>'required|string|max:50',
            'desc_en'=>'required|string|max:5000',
            'desc_ar'=>'required|string|max:5000',
            'img'=>'required|image|max:2048',
            'skill_id'=>'required|exists:skills,id',
            'questions_no'=>'required|integer',
            'difficulty'=>'required|integer|min:1|max:5',
            'duration_min'=>'required|integer|min:1'
        ]);*/
        /*$path=Storage::putFile("skills",$request->file('img'));*/
       $exam= Exam::create([
            'name'=>json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,

            ]),
            'desc'=>json_encode([
                'en'=>$request->desc_en,
                'ar'=>$request->desc_ar,

            ]),
           /* 'img'=>$path,*/
            'skill_id'=>$request->skill_id,
            'questions_no'=>$request->questions_no,
            'difficulty'=>$request->difficulty,
            'duration_min'=>$request->duration_min,
            'active'=>0
        ])
;         //  dd(request()->all());
              return redirect(url("dashboard/exams/create-questions/{$exam->id}"));
    }
    public function createQuestions(Exam $exam){
     //   if(session('prev')!=="exam/$exam->id"){
        //   return redirect('/dashboard/exams');
//}
        $data['exam_id']=$exam->id;
        $data['question_no']=$exam->questions_no;

         return view('admin.exams.create-questions')->with($data);
       }
       public function storeQuestions(Exam $exam,Request $request){
         //dd($request->all());
       /*  $request->validate([
             'title'=>'required|array',
             'title.*'=>'required|array|max:500',
             'right_ans'=>'required|array',
             'right_ans.*'=>'required|array|in:1,2,3,4',
             'option_1'=>'required|array',
             'option_1.*'=>'required|array|max:225',
             'option_2'=>'required|array',
             'option_2.*'=>'required|array|max:225',
             'option_3'=>'required|array',
             'option_3.*'=>'required|array|max:225',
             'option_4'=>'required|array',
             'option_4.*'=>'required|array|max:225',
         ]);*/
         for($i=0;$i<$exam->questions_no;$i++){
             Questions::create([
                 'exam_id'=>$exam->id,
                 'title'=>$request->title[$i],
                 'right_ans'=>$request->right_ans[$i],
                 'option_1'=>$request->option_1[$i],
                 'option_2'=>$request->option_2[$i],
                 'option_3'=>$request->option_3[$i],
                 'option_4'=>$request->option_4[$i],
             ]);

         }
         $exam->update([
             'active'=>1,
         ]);
          event(new ExamAddedevent);
         return redirect(url('dashboard/exams'));
       }
     public function edit(Exam $exam){
         $data['skills']=Skill::select('id','name')->get();
         $data['exam']=$exam;

         return view('admin.exams.edit')->with($data);
     }
     public function update(Exam $exam, Request $request){

        /*      $request->validate([
                    'name_en'=>'required|string|max:50',
                    'name_ar'=>'required|string|max:50',
                    'desc_en'=>'required|string|max:5000',
                    'desc_ar'=>'required|string|max:5000',
                    'img'=>'required|image|max:2048',
                    'skill_id'=>'required|exists:skills,id',
                    'questions_no'=>'required|integer',
                    'difficulty'=>'required|integer|min:1|max:5',
                    'duration_min'=>'required|integer|min:1'
                ]);*/
                /*$path=Storage::putFile("skills",$request->file('img'));*/
               $exam->update([
                    'name'=>json_encode([
                        'en'=>$request->name_en,
                        'ar'=>$request->name_ar,

                    ]),
                    'desc'=>json_encode([
                        'en'=>$request->desc_en,
                        'ar'=>$request->desc_ar,

                    ]),
                   /* 'img'=>$path,*/
                    'skill_id'=>$request->skill_id,
                    'questions_no'=>$request->questions_no,
                    'difficulty'=>$request->difficulty,
                    'duration_min'=>$request->duration_min,
                    'active'=>0
                ])
        ;         //  dd(request()->all());
                      return back();
            }

            public function delete(Exam $exam,Request $request){
                $exam->questions->delete();
                $exam->delete();
                  return back();
             }
}
