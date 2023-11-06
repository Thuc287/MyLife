<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function home()
    {
        $posts = DB::select("SELECT posts.'id', posts.'caption',posts.'img', posts.'user_id',users.'img', users.'username'
         FROM posts, users where posts.'user_id'=users.'id' and posts.'status'=1 ");
        return view('home')->with(['posts'=> $posts,'layout'=>'Layout.user']);
    }

    public function showMyHome()
    {
        $user_id = Session::get('id');
        $posts = DB::select("select * from posts where user_id='$user_id");
        return view('home')->with(['posts'=> $posts,'layout'=>'Layout.user']);
    }
    public function showUserHome(Request $request)
    {
        $username = $request->username;
        $users = DB::select("select * from users where username='$username'");
        $user = head($users);
        $posts = DB::select("SELECT * from posts where user_id='$user->id'");
        return view('home')->with(['posts'=> $posts,'layout'=>'Layout.user']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateImg(Request $request)
    {
        $img = $request->file();

        DB::update("update users set img='$img'");

        Session::flash('alert-info', 'Update img succe..!');
        return redirect();
    }
    public function updateUsername(Request $request)
    {
        $img = $request->file();

        DB::update("update users set img='$img'");

        Session::flash('alert-info', 'Update img succe..!');
        return redirect();
    }
    public function updatePwd(Request $request)
    {
        $id = Session::get('id');
        $oldpwd = $request->oldpwd;
        $newpwd = $request->newpwd;
        $pwd = Session::get('pwd');
        if ($oldpwd == $pwd && $newpwd == $pwd) {
            Session::flash('alert-info', 'This is old password..!');
            return redirect()->back();
        } elseif ($oldpwd == $pwd && $newpwd != $pwd) {
            DB::update("update users set pwd='$newpwd' where id='$id");
            Session::flash('alert-info', 'Update password succe..!');
            return redirect()->back();
        } else {
            Session::flash('alert-info', 'Update img succe..!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = Session::get('id');
        $pwd = Session::get('pwd');
        $pwdInput = $request->pwd;
        if ($pwd == $pwdInput) {
            DB::delete("delete from users where id='$id' ");
            DB::delete("delete from posts where user_id='$id'");
            DB::delete("delete from comments where user_id='$id'");
            Session::flash('alert-info', 'Delete account succe..!');
            return redirect();
        } else {
            Session::flash('alert-info', 'Password not exact..!');
            return redirect()->back();
        }
    }
}
