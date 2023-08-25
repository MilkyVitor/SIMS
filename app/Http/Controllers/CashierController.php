<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentInfo;
use App\Models\StudentTransact;

class CashierController extends Controller
{
    //

    private $user; 
    private $title; 
    private $school;
    private $constants;


    public function __construct(){
        $this->user = 'Cashier';
        $this->title = 'SIMS '.$this->user;
        $this->school = 'School Information Management System';
        $this->constants = ['title' => $this->title, 'user' => $this->user, 'school' => $this->school];


    }
    public function home(){
        return view('Cashier.home', $this->constants);
    }

    public function showPaymentRegistration(){
        $prdata = StudentInfo::where('isPaid', 'No')->get();
        return view('Cashier.pr', $this->constants, ['prdata' => $prdata]);
    }

    public function getDetails($id){
        $data = StudentInfo::where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function markPaid(Request $request) {
        $mark = StudentInfo::where('ID', $request->studInfoID)->update(['isPaid' => 'Yes']);
        $addtransact = new StudentTransact;
        $addtransact->user_id = $request->userID;
        $addtransact->payment_interval = $request->paymentinterval;
        $addtransact->is_essentials_paid = $request->isEssentialsPaid;
        $addtransact->isActive = 1;

        if($mark && $addtransact->save()) {
            return redirect('/payment-registration')->with('success', 'Student has proceeded for Enrollment!');
        } else {
            echo "Error";
        }
    }
}
