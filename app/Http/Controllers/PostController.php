<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexPost(Request $request)
    {
        $post_id=$request->post_id;
        $posts = DB::select("SELECT posts.'id', posts.'caption',posts.'img', posts.'user_id',users.'img', users.'username'
         FROM posts, users where posts.'user_id'=users.'id' and posts.'id'='$post_id' ");
        $post=head($posts);
        $comments= DB::select("select * from comments where post_id='$post_id'");
        Session::put("post_id",$post_id);
        return view('Home/index', []);
    }


    public function createPost(Request $request)
    {
        try {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $validation = $request->validate([
                'img' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            ]);
            if ($validation!=true) {
                Session::flash('alert-info', 'File photo not acess..!');
                return redirect()->back();
            }
             $post = new Post();
            $post->user_id = Session::get('id');
            $post->caption = $request->caption;
            $post->status = 0;
            $post->date = date('Y/m/d');
            $post->likes=0;
            $post->comments=0;
            if ($request->hasFile('img')) {
                $file = $request->img;

                // Lưu tên hình vào column img
                $post->img = $file->hashName();

                // Chép file vào thư mục "storate/public/img"
                $fileSaved = $file->storeAs('public/img', $post->img);
            }
            $post->save();
        Session::flash('alert-info', 'Taọ bài thành công chờ kiểm duyệt ..!');
            return redirect()->back();

        } catch (Throwable $e) {
            Session::flash('alert-info', 'File ảnh của bạn không hợp lệ !');
            // echo ($e);
              return redirect()->back();
        }
    }
    public function destroyPost(int $post_id)
    {
        DB::delete("delete from posts where id='$post_id'");
        DB::delete("delete from comments where post_id='$post_id'");
        Session::flash('alert-info', 'Delete post succe..!');
        return redirect()->back();
    }
}
