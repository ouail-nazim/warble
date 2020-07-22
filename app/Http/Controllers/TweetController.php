<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;


class TweetController extends Controller
{
    public function index()
    {
        //app()->bind('error_message',function (){return 'a user update';});

        $tweets=auth()->user()->timeLine();
        return view('tweets.index')->with(['tweets'=>$tweets]);
    }
    public function store(){
        request()->validate([
            'body'=>'required|max:255'
        ]);
        Tweet::create([
           'user_id'=>auth()->id(),
            'body'=>request('body')
        ]);
        return redirect('/home?updated=store');
    }

    public function delete(Tweet $tweet){
        $tweet->delete();
        return back();
    }

    public function like(Tweet $tweet){
        if ($tweet->isLikedBy(auth()->user()))
        {
            $like=$tweet->likes;
            foreach ($like as $item) {
               if(($item->user_id)==(auth()->user()->id)){
                   $item->delete();
               }
            }
        }else{
            $tweet->like(auth()->user());
        }

        return back();
    }
    public function dislike(Tweet $tweet){
        if ($tweet->isDisLikedBy(auth()->user()))
        {
            $like=$tweet->likes;
            foreach ($like as $item) {
                if(($item->user_id)==(auth()->user()->id)){
                    $item->delete();
                }
            }
        }else {
            $tweet->dislike(auth()->user());
        }
        return back();
    }
}
