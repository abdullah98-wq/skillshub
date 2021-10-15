<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class contactController extends Controller
{
     public function index(){
         $data['set']=Setting::first();
        return view('web.contact.index')->with($data);
    }
   public function send(Request $request){
       $validatior=Validator::make($request->all()
           ,[
           'name'=>'required|string|max:255',
           'email'=>'required|email|max:255',
           'subject'=>'nullable|string|max:255',
           'body'=>'required|string',
           ]);
           if($validatior->fails()){
                  $error= $validatior->errors();
               return redirect(url('contact'))->withErrors($error);
           }
           Message::create([
              'name'=>$request->name,
              'email'=>$request->email,
              'subject'=>$request->subject,
              'body'=>$request->body,
           ]);

           $request->session()->flash('sucess','your message sent sucessfuly');
           return back();


   }
}
