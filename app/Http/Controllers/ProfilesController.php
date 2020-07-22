<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Config;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
       return view('profiles.show',['user'=>$user,'tweets'=>$user->tweets()->withLikes()->paginate(30)]);
    }

    public function edit(User $user)
    {
         if ($user->isNot(auth()->user())){
            abort(404);
        }else{
            return view('profiles.edit',['user'=>$user]);
        }
    }

    public function update(User $user)
    {
        if ($user->isNot(auth()->user())){
            abort(404);
        }else{
            $attributes=request()->validate([
                'username'=>['string','required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
                'name'=>['string','required','max:255'],
                'avatar'=>['image','mimes:png,jpg,jpeg,gif'],
                'cover'=>['image','mimes:png,jpg,jpeg,gif'],
                'email'=>['string','required','max:255','email',Rule::unique('users')->ignore($user)],
                'password'=>['string','required','max:255','min:8','confirmed'],
                'about'=>['max:500']
            ]);
            if (request('avatar')){
                $attributes['avatar']=request('avatar')->store('avatars');
            }
            if (request('cover')){
                $attributes['cover']=request('cover')->store('covers');
            }

            $user->update($attributes);
           // return view('profiles.show',['user'=>$user,'tweets'=>$user->tweets()->withLikes()->paginate(30)]);
            return redirect("profiles/$user->username"."?updated=edit");
        }

    }



}
