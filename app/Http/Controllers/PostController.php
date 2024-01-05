<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Throwable;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;


class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function viewComments(int $post_id, Request $request)
  {
    // $post = DB::table('posts')
    //     ->join('users', 'posts.user_id', '=', 'users.user_id')
    //     ->where('posts.post_id', $post_id)
    //     ->select('users.avt', 'users.username', 'users.fullname', 'posts.caption', 'posts.img', 'posts.post_id', 'posts.date', 'posts.likes', 'posts.comments')
    //     ->get()->first();
    // Session::put('post', $post);
    // echo($post);
    $comments = DB::table('comments')
      ->join('users', 'comments.user_id', '=', 'users.user_id')
      ->where('post_id', $post_id)
      ->orderByDesc('comments.date', 'ASC')
      ->select('users.avt','users.fullname','comments.content','comments.date')
      ->get();
  }
  public function comment(Request $request)
  {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $comment = new Comment();
    $comment->post_id = $request->post_id;
    $comment->user_id = Session::get('user_id');
    $comment->content = $request->content;
    $comment->date = date('Y/m/d');
    $comment->save();
    DB::update("UPDATE posts set comments=comments + 1  where post_id='$request->post_id'");

  }

  public function createPost(Request $request)
  {
    try {
      date_default_timezone_set('Asia/Ho_Chi_Minh');
      $validation = $request->validate([
        'img' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
      ]);
      if ($validation != true) {
        Session::flash('alert-info', 'File photo not acess..!');
        return redirect()->back();
      }
      $post = new Post();
      $post->user_id = Session::get('user_id');
      $post->caption = $request->caption;
      $post->status = 0;
      $post->date = date('Y/m/d');
      $post->likes = 0;
      $post->comments = 0;
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
    $img = Post::Where('post_id', $post_id)->first()->img;
    Storage::delete('public/img/' . $img);
    DB::delete("delete from posts where post_id='$post_id'");
    DB::delete("delete from comments where post_id='$post_id'");
    DB::delete("delete from likes where post_id='$post_id'");
    Session::flash('alert-info', 'Delete post succe..!');
  }
}
