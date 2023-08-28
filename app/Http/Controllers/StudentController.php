<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    private $user; 
    private $title; 
    private $school;
    private $constants;


    public function __construct(){
        $this->user = 'Student';
        $this->title = 'SIMS '.$this->user;
        $this->school = 'School Information Management System';
        $this->constants = ['title' => $this->title, 'user' => $this->user, 'school' => $this->school];


    }
    public function home(){
        return view('Student.home', $this->constants);
    }

}
