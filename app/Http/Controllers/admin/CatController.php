<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class CatController extends Controller
{
    //
    public function index(){

      $data['cats']=Cat::paginate(3);
        return view('admin.cats.index')->with($data);
    }
    public function store( Request $request){

        $request->validate([
            'name_en'=>'required|string|max:50',
            'name_ar'=>'required|string|max:50',
        ]);
        Cat::create([
            'name'=>json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar
            ])
        ])
;          // dd(request()->all());
              return back();
    }
    public function update( Request $request){

         $request->validate([
            'id'=>'required|exists:Cats,id',
            'name_en'=>'required|string|max:50',
            'name_ar'=>'required|string|max:50',
          ]);
          Cat::findorFail($request->id)->update([
              'name'=>json_encode([
                  'en'=>$request->name_en,
                  'ar'=>$request->name_ar
              ])
          ])
  ;          // dd(request()->all());
                return back();
      }
    public function delete($id){
       $cat=  Cat::findorFail($id);
         $cat->delete();
         return back();
    }
}

