<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    public function home()
    {
        // $posts = DB::select("SELECT posts.'id', posts.'caption',posts.'img', posts.'user_id',users.'img', users.'username'
        //  FROM posts, users where posts.'user_id'=users.'id' ");
        $posts = DB::table('posts')
        ->join('users','posts.user_id','=','users.id')
        ->select('users.img','users.username','posts.caption','posts.img','posts.date','posts.views')
        ->get();
        return view('home')->with(['posts'=>$posts,'layout'=>'Layout.guest']);
    }

    public function showUserHome(Request $request)
    {
        $username=$request->username;
        $users= DB::select("select * from users where username='$username'");
        $user=head($users);
        $posts = DB::select("SELECT * from posts where user_id='$user->id'");
        return view('home')->with(['user'=>$user,'posts'=>$posts,'layout'=>'Layout.guest']);
    }

}
