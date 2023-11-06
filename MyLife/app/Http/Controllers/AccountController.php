<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use PHPUnit\Event\TestSuite\Loaded;
use Throwable;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function signIn(Request $request)
    {
        $infor = $request->infor;
        $pwd = $request->pwd;

        if ($infor === '9999' && $pwd === '9999') {
            Session::flash('alert-info', 'LogIn Admin success..!');
            return redirect()->back();
        } else {
            $test = DB::select("SELECT * from users where username='$infor' and pwd='$pwd'");
            $test1 = DB::select("SELECT * from users where phone='$infor' and pwd='$pwd'");

            if ($test != null or $test1 != null) {
                if ($test != null) {
                    Session::put('id', head($test)->id);
                    Session::put('pwd', head($test)->pwd);
                    Session::put('img', head($test)->img);
                    Session::put('username', head($test)->username);

                } else {
                    Session::put('id', head($test1)->id);
                    Session::put('pwd', head($test1)->pwd);
                    Session::put('img', head($test1)->img);
                    Session::put('username', head($test1)->username);
                }
                Session::flash('alert-info', 'LogIn success..!');
                return redirect()->back()->with('alert', 44444444444444);
            } else {
                Session::flash('alert-info', 'Account does not exist..!');
                return redirect()->back()->with('alert', 44444444444444);
            }
        }

    }
    public function signOut(Request $request)
    {
        Session::flush();
        return redirect();
    }
    public function signUp(Request $request)
    {
        try {
            $validation = $request->validate([
                'img' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
            ]);
            if ($validation!=true) {
                Session::flash('alert-info', 'File photo not acess..!');
                return redirect()->back();
            }
             $user = new User();
            $user->username = $request->username;
            $user->pwd = $request->pwd;
            $user->phone = $request->phone;
            $user->status = 1;

            if ($request->hasFile('img')) {
                $file = $request->img;
                // Lưu tên hình vào column sp_hinh
                $user->img = $file->hashName();
                $user->save();
                // Chép file vào thư mục "storate/public/img"
                $fileSaved = $file->storeAs('public/img', $user->img);
            }
            Session::flash('alert-info', 'Create success..!');
            return redirect()->back();

        } catch (Throwable $e) {
            Session::flash('alert-info', 'Username or Phone already exist...!');
            // echo ($e);
             return redirect()->back();
        }
    }

}