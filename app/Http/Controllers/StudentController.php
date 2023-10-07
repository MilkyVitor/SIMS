<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PaymentInfo;
use App\Models\DocumentRequests;
use App\Models\StudentInfo;
use Illuminate\Support\Collection;
use PDF;

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

        $additionals = DB::table('payment_additionals')->where(['isActive' => 1, 'student_id' => $user_id])->get();
        return view('Student.pr', $this->constants, ['payment_info' => $payment_info, 'payment_transactions' => $payment_transactions, 'additionals' => $additionals]);
    }

    public function getTransactionDetails($id) {
        $data = DB::table('payment_transactions')->where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function sendReceipt(Request $request) {
        $imagename = time() . '.' . $request->attachment->extension();
        $request->attachment->storeAs('public/images', $imagename);
        $sendreceipt = DB::table('payment_transactions')->where(['isActive' => 1, 'ID' => $request->transactID])->update(['attachment' => $imagename, 'isUploaded' => 1]);
        if($sendreceipt){
            return redirect('/payment-records')->with('success', 'You had uploaded a payment receipt, waiting for evaluation.');
        }
    }

    public function gradesView(){
        $user_id = Auth::user()->unique_id;
        $gradestatus = DB::table('control_panel')->where('function', 'Grades View')->first();
        $grades = DB::table('grade_records')->where(['student_id' => $user_id, 'isActive' => 1])->get();
        return view('Student.gv', $this->constants, ['gradestatus' => $gradestatus, 'grades' => $grades]);
    }

    public function documentRequest() {
        $user_id = Auth::user()->unique_id;
        $drstatus = DB::table('control_panel')->select('status')->where('function', 'Document Request')->first();
        $payment_info = PaymentInfo::where(['student_id' => $user_id, 'isActive' => 1])->first();
        if($payment_info->balance <= 0){
            $dr = 'Yes';
            $docs = DocumentRequests::where('student_id' , $user_id)->get();
            $countOfDocs = $docs->count();
            return view('Student.dr', $this->constants, ['dr' => $dr, 'docs' => $docs, 'countOfDocs' => $countOfDocs, 'drstatus' => $drstatus->status]);
        } else {
            $dr = 'No';
           
            
            return view('Student.dr', $this->constants, ['dr' => $dr]);

        }
    }

    public function acknowledgePDF(Request $request) {
        $docs = DocumentRequests::whereNotNull('date_acknowledged')
        ->join('student_info', 'student_info.user_id', '=', 'document_requests.student_id')
        ->where(['student_id' => $request->userID, 'document_requests.isActive' => 1])->get();
        $info = $docs->first();
        if($docs->count() > 0) {
            $data = [
                'title' => 'SIMS PDF',
                'date' => date('F d, Y'),
                'docs' => $docs,
                'name' => $info->first_name." ".$info->last_name,
                'code' => $info->user_id
            ];
        } 
        $pdf = PDF::loadView('Student.dr-pdf', $data);
        return $pdf->stream('acknowledgement.pdf');
    }

    public function sendRequest(Request $request) {
        $count = 0;
        foreach($request->documents as $requested){
            $check = DocumentRequests::where('requested_doc', $requested)->first(); 
            if($check){
                $count++;
            }
        }

        if($count > 0){
            return redirect('/document-request')->with('error', 'One of your document is already requested. Try again!');
        } else {
            if($request->documents){
                foreach ($request->documents as $document) {
                    $dr = new DocumentRequests;
                    $dr->student_id = $request->studentID;
                    $dr->requested_doc = $document;
                    $dr->isActive = 1;
                    $dr->save();
                }
                return redirect('/document-request')->with('success', 'You had requested document!');
            } else {
                return redirect('/document-request')->with('error', 'You did not requested any document.');
            }
        }

    }

    public function promoteGradelevel() {
        //CHECK KUNG GOODS NA YUNG FF: BALANCE, GRADES, EXISTING YUNG NEXT LEVEL GRADE
        $user_id = Auth::user()->unique_id;
        $info = PaymentInfo::where(['student_id' => $user_id, 'isActive' => 1])->first();
        $studentinfo = StudentInfo::where('user_id', $user_id)->first();
        $currentgrade = DB::table('grade_level')->select('ID')->where('name', $studentinfo->grade_level)->first();
        $nextgrade = DB::table('grade_level')->select('name')->where('ID', $currentgrade->ID + 1)->first();
        $gradename = $nextgrade->name;

        if($info->balance <= 0 && $studentinfo->isPaid == 'Yes' && $studentinfo->isEnrolled == 'Yes'){
            return view('Student.pg', $this->constants, ['pg' => 'Yes']);
        } else if($studentinfo->isPaid == 'No' && $studentinfo->isEnrolled == 'No'){
            return view('Student.pg', $this->constants, ['pg' => 'Pending']);
        } else {
           if($nextgrade > 12){
                $gradename = Graduation;
           } 
            return view('Student.pg', $this->constants, ['pg' => 'No', 'studentinfo' => $studentinfo, 'gradename' => $gradename]);

        }
    }

    public function sendRegistration(Request $request) {
        $register = StudentInfo::where(['user_id' => $request->userID, 'isActive' => 1])
        ->update([
            'contact_number' => $request->contactnumber,
            'email_address' => $request->emailaddress,
            'student_address' => $request->homeaddress,
            'guardian_name' => $request->guardianname,
            'guardian_relation' => $request->guardianrelation,
            'guardian_address' => $request->guardianaddress,
            'guardian_contact' => $request->guardiancontact,
            'grade_level' => $request->grade,
            'isPaid' => 'No',
            'isEnrolled' => 'No'
        ]);

        if($register) {
            return view('Student.pg', $this->constants, ['pg' => 'Pending'])->with('success', 'You had promoted yourself for enrollment, wait for evaluation!');

        }

    }


}
