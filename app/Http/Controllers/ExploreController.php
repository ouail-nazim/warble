<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExploreController extends Controller
{
    public function index()
    {

        return view('explore')->with(['users'=>User::all()]);
    }
    public function search()
    {
        $attributes=request()->validate([
            'username'=>['string','required','max:255'],
        ]);

        $user=User::where('name','like','%'.$attributes['username'].'%')
                    ->orWhere('username','like','%'.$attributes['username'].'%')
                    ->get();
        return view('explore')->with(['users'=>$user]);
    }
}
