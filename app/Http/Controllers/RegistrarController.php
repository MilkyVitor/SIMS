<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrarController extends Controller
{
    public function home() {
        $title = "SIMS Registrar";
        $school = "School Information Management System";
        $user = 'Registrar';

        return view('Registrar.home', ['title' => $title, 'user' => $user, 'school' => $school]);
    }

    public function showStudentRegistration(){
        $title = "SIMS Registrar";
        $school = "School Information Management System";
        $user = 'Registrar';

        return view('Registrar.sr', ['title' => $title, 'user' => $user, 'school' => $school]);
    }

    public function sendRegistration(Request $request){
        $validated = $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required'
        ]);

        echo $validated['firstname']." ".$validated['middlename']." ".$validated['lastname'];
    }
}
