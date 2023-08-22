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
}
