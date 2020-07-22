<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
   protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select tweet_id , sum(liked) tlikes,sum(!liked) tdislikes from likes group by tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'

        );
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function like($user=null,$liked = true){
        $this->likes()->updateOrCreate([
                'user_id'=>$user ? $user->id : auth()->id()
            ],[
                'liked'=> $liked,
        ]);
    }
    public function dislike($user=null){
        $this->like($user,false);
    }
    public function isLikedBy(User $user)
    {
        return (bool)  $user->likes
                            ->where('tweet_id',$this->id)
                            ->where('liked',true)
                            ->count();
    }
    public function isDisLikedBy(User $user)
    {
        return (bool)  $user->likes
            ->where('tweet_id',$this->id)
            ->where('liked',false)
            ->count();
    }



}
