<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'username','name','avatar','cover', 'email', 'password','about'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }
    public function getAvatar(){
        if ($this->avatar == null){
            return "/images/user.png";
        }
        return '/storage/'.$this->avatar;
    }
    public function getCover(){
        if ($this->avatar == null){
            return "/images/cover.jpg";
        }
        return '/storage/'.$this->cover;
    }
    //get tweets of your followers and also yours
    public function timeLine(){
        $friends_id=$this->follows()->pluck('id');
        return Tweet::whereIn('user_id',$friends_id)
            ->orWhere('user_id',$this->id)
            ->withLikes()
            ->latest()
            ->paginate(30);
    }
    public function tweets(){
        return $this->hasMany(Tweet::class)->latest();
    }
    // get the following of the current user
    public function follows(){
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id');
    }
    // get the followers of the current user
    public function follower(){
        $follower=
            DB::table('follows')
                ->select(DB::raw('* '))
                ->whereRaw('following_user_id = ?',$this->id)
                ->get()
        ;
        return  $follower ;
    }
    //following a user
    public function follow(User $user){
        return $this->follows()->save($user);
    }
    public function unFollow(User $user){
        return $this->follows()->detach($user);
    }
    public function following(User $user){
       // return $this->follows->contains($user);
        return $this->follows()
            ->where('following_user_id',$user->id)
            ->exists();
    }

    public function likes(){
        return  $this->hasMAny(Like::class,'user_id');
    }

}
