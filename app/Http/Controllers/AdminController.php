<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function home(){
        $title = "Admin";
        return view('admin.index', ['title' => $title, 'user' => 'Admin']);
    }
    public function dashboard(){
        $title = "Admin";
        return "Dashbaord";
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

}
