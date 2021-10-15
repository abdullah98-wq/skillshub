<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(){

        $data['skills']=Skill::paginate(3);
        $data['cats']=Cat::select('id', 'name')->get();
                  return view('admin.skills.index')->with($data);
      }
      public function store( Request $request){

        $request->validate([
            'name_en'=>'required|string|max:50',
            'name_ar'=>'required|string|max:50',
        ]);
        Skill::create([
            'name'=>json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,
                'cat_id'=>$request->cat_id
            ])
        ])
;          // dd(request()->all());
              return back();
    }
}
