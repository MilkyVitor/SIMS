<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\StudentInfo;

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

        $srdata = StudentInfo::where('isRegistered', 'Yes')->where('isPaid', 'No')->get();
        $enrollee = StudentInfo::where('isRegistered', 'Yes')->where('isPaid', 'Yes')->where('isEnrolled', 'No')->get();

        return view('Registrar.sr', ['title' => $title, 'user' => $user, 'school' => $school, 'srdata' => $srdata, 'enrollee' => $enrollee]);
    }

    public function sendRegistration(Request $request){
        $validated = $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'gender' => 'required',
             'datebirth' => 'required',
            'placebirth' => 'required',
             'contactnumber' => 'required',
            'emailaddress' => 'required',
             'homeaddress' => 'required',
            'guardianName' => 'required',
            'guardianrelation' => 'required',
             'guardiancontact' => 'required',
             'guardianaddress' => 'required',
             'gradelevel' => 'required',
             'studentType' => 'required'
        ]);

        $register = new StudentInfo;
        $register->user_id = strtoupper(Str::random(6));
        $register->first_name = $validated['firstname'];
        $register->middle_name = $validated['middlename'];
        $register->last_name = $validated['lastname'];
        $register->suffix = $request->suffix;
        $register->gender = $validated['gender'];
        $register->date_birth = $validated['datebirth'];
        $register->place_birth = $validated['placebirth'];
        $register->contact_number = $validated['contactnumber'];
        $register->email_address = $validated['emailaddress'];
        $register->student_address = $validated['homeaddress'];
        $register->guardian_name = $validated['guardianName'];
        $register->guardian_relation = $validated['guardianrelation'];
        $register->guardian_contact = $validated['guardiancontact'];
        $register->guardian_address = $validated['guardianaddress'];
        $register->grade_level = $validated['gradelevel'];
        $register->student_type = $validated['studentType'];
        $register->isPaid = "No";
        $register->isEnrolled = "No";
        $register->isRegistered = "Yes";

        if($register->save()){
            return redirect('/student-registration')->with('success', 'Successfully registered a student. Proceed to cashier!');
        } else {
            return "error";
        }

        
  
    }

    public function detailsRegistration($id){
        $data = StudentInfo::where('ID', $id)->first();

        return response()->json(['data' => $data]);
    }

    public function acceptEnrollee(Request $request) {
        $accept = StudentInfo::where('ID', $request->studID)->update(['isEnrolled' => 'Yes']);

        if($accept) {
            return redirect('/student-registration')->with('success', 'Student has been Enrolled!');
        }
    }

}
