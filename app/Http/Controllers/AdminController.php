<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
  public function showAudit()
  {
    $posts = DB::select("select * from posts where status=0");
    return view();
  }
  public function auditPost(int $post_id)
  {
    DB::update("update posts set status=1 where id=$post_id");
    return redirect()->back();
  }
  public function reportUser(int $user_id)
  {
    DB::update("update users set status=0 where id=$user_id");
    return redirect()->back();
  }

  public function showUsers()
  {
    $users = DB::select("select * from users");
    return view();
  }
}
