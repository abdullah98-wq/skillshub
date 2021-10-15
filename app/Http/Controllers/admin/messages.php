<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactResponseMail;
class messages extends Controller
{
    public function index(){
        $data['messages']=Message::orderby('desc','id')->paginate(3);
        return view('admin.messages.index')->with($data);
    }
    public function show(Message $messages){
        $data['messages']=$messages;
        return view('admin.messages.show')->with($data);
    }
    public function response(Message $messages ,Request $request){
        $request->validate([
            'title'=>'string',
            'body'=>'string'
        ]);
        $recieverMail=$messages->email;
        $recieverName=$messages->name;

        Mail::to($recieverMail)->send(new ContactResponseMail($recieverName,$request->title,$request->body));

    }
}
