<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Pusher\Pusher;

class MessageController extends Controller
{
    public function index()
    {

        $contacts=auth()->user()->follows;
        return view('messages.messages')->with([
            'contacts'=>$contacts
        ]);
    }

    public function show($id)
    {
        $user=User::where('id',$id)->first();

        $my_id=auth()->id();
        $messages=Message::where(function ($query) use ($id,$my_id){
            $query->where('from',$my_id)->where('to',$id);
        })->orWhere(function ($query) use ($id,$my_id){
            $query->where('from',$id)->where('to',$my_id);
        })->get();
        return view('messages.usermessages')->with([
            'messages'=>$messages,
            'user'=>$user
        ]);

    }

    public function send(Request $request)
    {
        $from=auth()->id();
        $resiverid=$request->resiverid;
        $message=$request->message;
        $data=new Message();
        $data->from=$from;
        $data->to=$resiverid;
        $data->message=$message;
        $data->is_read=0;
        $data->save();

        //pusher
        $options =array(
        'cluster' => 'eu',
        'useTLS' => true
        );
        $pusher=new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data=['from'=>$from,'to'=>$resiverid];
        $pusher->trigger('my-channel','my-event',$data);

    }
}
