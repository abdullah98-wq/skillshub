<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(){
       $superAdmin=role::where('name','super_admin')->first();
       $Admin=role::where('name','admin')->first();
      $data['admins']=User::whereIn('role_id',[$superAdmin->id,$Admin->id])->orderby('id','desc')->paginate(3);

      return view('admin.admin.index')->with($data);
    }
    public function create(){
          $data['roles']=role::select('id','name')->whereIn('name',['super_admin','admin'])->get();
        return view('admin.admin.create')->with($data);
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|string|max:255',
            'password'=>'required|string|min:5|max:15|confirmed',
            'role_id'=>'required|exists:roles,id',
        ]);
         user::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'role_id'=>$request->role_id
         ]);
         return redirect(url('dashboard/admin'));
    }
}
