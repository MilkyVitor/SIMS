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

            if($user->account_type == 'Administrator'){
                // $title = "SIMS Admin";
                // $type = "Admin";
                return redirect()->route('Administrator');

                // return redirect()->route('Administrator')->with(['account' => $user->account_type]);
            } else if($user->account_type == 'Registrar'){
                return redirect()->route('Registrar');
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

    public function showGeneralAnnouncements(Request $request){
        $title = "SIMS ".$request['accountType'];
        $school = "School Information Management System";
        $user = $request['accountType'];
        $folder = $request['accountType'];

        $data = DB::table('inq_announcement')->where('isActive', 1)->where('PostedAt', 'General')->get();
        return view('announcements', ['title' => $title, 'school' =>$school, 'user' => $user, 'data' => $data, 'folder' => $folder ]);
    }

    public function showProgramsOffered(Request $request){
        $title = "SIMS ".$request['accountType'];
        $school = "School Information Management System";
        $user = $request['accountType'];
        $folder = $request['accountType'];
        
        return view('programs', ['title' => $title, 'school' =>$school, 'user' => $user, 'folder' => $folder ]);
    }


}