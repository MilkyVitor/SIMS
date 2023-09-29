<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentInfo;
use App\Models\PaymentInfo;
use App\Models\StudentTransact;
use App\Models\PaymentAdditionals;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;




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

    public function paymentAdditionals() {
        $additionals = PaymentAdditionals::where('isActive', 1)
        ->select('bill_id', 'title', 'amount')
        ->distinct()    
        ->get();
        return view('Cashier.pa', $this->constants, ['additionals' => $additionals]);
    }

    public function getAdditionals($id){
        $data = PaymentAdditionals::where('bill_id', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function viewListStudents(Request $request) {
        $info = PaymentAdditionals::where('bill_id', $request->billID)
        ->first();
        $lists = PaymentAdditionals::join('student_info', 'student_info.user_id', '=', 'payment_additionals.student_id')
        ->select('*', 'payment_additionals.ID as pID','payment_additionals.isPaid as StatusPaid')
        ->where('bill_id', $request->billID)->get();
        $additionalstitle = $info->title;
        return view('Cashier.pav', $this->constants, ['lists' => $lists, 'additionalstitle' => $additionalstitle]);
    }

    public function getName($id) {
        $data = PaymentAdditionals::join('student_info', 'student_info.user_id', '=', 'payment_additionals.student_id')
        ->select('*', 'payment_additionals.ID as pID')
        ->where('payment_additionals.ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function setPaidAdd(Request $request) {
        $setPaid = PaymentAdditionals::where('ID', $request->ID)->update(['isPaid' => 1]);
        $info = PaymentAdditionals::join('student_info', 'student_info.user_id', '=', 'payment_additionals.student_id')
        ->where('payment_additionals.ID', $request->ID)->first();
        if($setPaid){
            return redirect('/payment-additionals')->with('success', 'You have set paid '.$info->first_name.' '.$info->last_name.' for '.$info->title);
        }
    }

    public function issueAdd(Request $request){


        $students = StudentInfo::where('grade_level', $request->grade)->select('user_id')->get();
        $billID = strtoupper(Str::random(10));
        foreach($students as $student){
            $add = new PaymentAdditionals;
            $add->bill_id = $billID;
            $add->title = $request->title;
            $add->description = $request->description;
            $add->amount = $request->amount;
            $add->issued_by = $request->issuer;
            $add->student_id = $student->user_id;
            $add->isPaid = 0;
            $add->isActive = 1;
            $add->save();
        }
        return redirect('/payment-additionals')->with('success', 'You have updated details');

       
    }

    public function editDetails(Request $request) {
        echo $request->title;
        $edit = PaymentAdditionals::where('bill_id', $request->billID)
        ->update(['title' => $request->title, 'description' => $request->description]);
        if($edit) {
            return redirect('/payment-additionals')->with('success', 'You have updated details');
        }
    }

    public function accountNumbers() {
        $numbers = DB::table('account_numbers')->where('isActive', 1)->get();
        return view('Cashier.an', $this->constants, ['numbers' => $numbers]);
    }

    public function getNumberData($id) {
        $data = DB::table('account_numbers')->where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function editNumber(Request $request) {
        $edit = DB::table('account_numbers')->where('ID', $request->ID)->update(['number' => $request->number]);
        if($edit){
            return redirect('/account-numbers')->with('success', 'You have updated number!');
        }
    }

    public function deleteNumber(Request $request) {
        $edit = DB::table('account_numbers')->where('ID', $request->ID)->update(['isActive' => 0]);
        if($edit){
            return redirect('/account-numbers')->with('success', 'You have deleted a number!');
        }
    }
}
