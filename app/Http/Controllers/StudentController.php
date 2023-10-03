<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    public function schedule() {
        $user_id = Auth::user()->unique_id;
        $student = DB::table('student')->where('student_id', $user_id)->first();
        $schedule = DB::table('schedule')
        ->join('sections', 'schedule.section_id', '=', 'sections.ID')
        ->where('section_id', $student->section_id)->get();
        return view('Student.s', $this->constants, ['schedule' => $schedule]);
    }

    public function paymentRecords() {
        $user_id = Auth::user()->unique_id;

        $payment_info = DB::table('payment_info')->where(['isActive' => 1, 'student_id' => $user_id])->first();
        $payment_transactions = DB::table('payment_transactions')->where('payment_info_id', $payment_info->ID)->get();
        return view('Student.pr', $this->constants, ['payment_info' => $payment_info, 'payment_transactions' => $payment_transactions]);
    }
}
