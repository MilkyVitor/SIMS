<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function home(){
        $title = "SIMS Administrator";
        $school = "School Information Management System";

        $data = DB::table('inq_announcement')->where('isActive', 1)->get();
        return view('Administrator.home', ['title' => $title, 'user' => 'Admin', 'school' => $school, 'data' => $data]);
    }
    public function dashboard(){
        $title = "Admin";
        return "Dashbaord";
    }

    

   



}
