<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentInfo;
use App\Models\PaymentInfo;
use App\Models\StudentTransact;
use Illuminate\Support\Facades\DB;



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

    public function paymentManagement() {
        return view('Cashier.pm', $this->constants);
    }

    public function getLists(Request $request) {
        $paymentmethod = $request->paymentmethod;
         $studentlists = PaymentInfo::join('student_info', 'student_info.user_id', '=' , 'payment_info.student_id')
         ->where(['payment_info.isActive' => 1, 'payment_method' => $request->paymentmethod])->get();
         return view('Cashier.pmsl', $this->constants, ['studentlists' => $studentlists, 'paymentmethod' => $paymentmethod]);
    }

    public function getInformation(Request $request) {
        $information = PaymentInfo::join('student_info', 'student_info.user_id', '=' , 'payment_info.student_id')
            ->select('*', 'payment_info.ID as piID')
            ->where('student_id', $request->studentID)->first();
        $id = $information->piID;
        $transactions = DB::table('payment_transactions')->where('payment_info_id', $id)->get();
         return view('Cashier.pmv', $this->constants, ['information' => $information, 'transactions' => $transactions]);
    }

    public function getTransactData($id) {
        $data = DB::table('payment_transactions')->where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function setPaid(Request $request) {
       
         $information = PaymentInfo::where('ID', $request->paymentinfoID)->first();
         $id = $information->ID;
         $transactions = DB::table('payment_transactions')->where('payment_info_id', $id)->get();
         $setpaid = DB::table('payment_transactions')->where('ID', $request->transactID)->update(['isPaid' => 1, 'evaluated_by' => $request->evaluator]);
        if($setpaid) {
           return redirect('/payment-management')->with('success', 'You have confirmed payment for '.$information->student_id);
        }
    }
}
