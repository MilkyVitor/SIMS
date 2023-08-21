<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class InquiryController extends Controller
{
    //
    public function showInquiry(){
        $title = 'School Information Management';
        $banner = DB::table('inq_banner')->where('isActive', 1)->get();
        $announcement = DB::table('inq_announcement')->where('isActive', 1)->get();
        return view('inquiry', ['title' => $title],['banner' => $banner, 'announcement' => $announcement]);
    }

    public function checkUser(Request $request) {
        $validation = $request->validate(['email' => 'required', 'password' => 'required']);

        if(auth()->attempt($validation)){
            $user = auth()->user();

            if($user->account_type == 'admin'){
                $title = "SIMS Admin";
                $type = "Admin";
                return redirect()->route('admin');
            } else {
                return redirect('/');
            }

        } else {
            return redirect('/')->with('error', 'Credentials are wrong!');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

}
