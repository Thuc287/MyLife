<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\Like;

class UserController extends Controller
{

    public function home()
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->where('posts.status', 0)
            ->orderByDesc('date','ASC')
            ->select('users.avt', 'users.username', 'users.fullname', 'posts.caption', 'posts.img', 'posts.id', 'posts.date', 'posts.likes', 'posts.comments')
            ->get();
        return view('home')->with(['posts' => $posts, 'layout' => 'Layout.user']);
    }

    public function MyHome()
    {
        $user_id = Session::get('id');
        $posts = DB::select("select * from posts where user_id='$user_id");
        return view('home')->with(['posts' => $posts, 'layout' => 'Layout.user']);
    }
    public function UserHome(Request $request)
    {
        $username = $request->username;
        $users = DB::select("select * from users where username='$username'");
        $user = head($users);
        $posts = DB::select("SELECT * from posts where user_id='$user->id'");
        return view('home')->with(['posts' => $posts, 'layout' => 'Layout.user']);
    }
    public function createComment(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $comment = new Comment();
        $comment->user_id = Session::get('id');
        $comment->post_id = Session::get('post_id');
        $comment->content = $request->content;
        $comment->date = date('Y/m/d - H:i:s');
        $comment->save();
        Session::flash('alert-info', 'Comment succe..!');
        return redirect()->back();
    }
    public function like(int $post_id)
    {
        $user_id = Session::get('id');
        $likes = DB::select("select * from likes where post_id='$post_id' and user_id='$user_id'");
        if ($likes == null) {
            $like = new Like();
            $like->user_id = Session::get('id');
            $like->post_id = $post_id;
            $like->save();
            $likes = DB::select("select likes from posts where id='$post_id'");
            $like = head($likes)->likes + 1;
            echo ($like);
            DB::update("update posts set likes='$like' where id='$post_id'");
        }else{
                DB::delete("delete from likes where post_id='$post_id' and user_id='$user_id'");
                $likes = DB::select("select likes from posts where id='$post_id'");
                $like = head($likes)->likes - 1;
                echo ($like);
                DB::update("update posts set likes='$like' where id='$post_id'");
        }

        return redirect()->back();
    }
    public function destroyComment(int $id)
    {
        DB::delete("delete from comments where id='$id'");
        Session::flash('alert-info', 'Delete comment succe..!');
        return redirect()->back();
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
