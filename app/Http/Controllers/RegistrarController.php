<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use App\Models\StudentInfo;
use App\Models\User;
use App\Models\Section;
use App\Models\Classes;
use App\Models\Schedules;
use App\Models\DocumentRequests;
use App\Models\Announcements;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RegistrarController extends Controller
{
    private $title;
    private $school;
    private $user;

    public function __construct(){
        $this->title = "SIMS Registrar";
        $this->school = "School Information Management System";
        $this->user = 'Registrar';
        $this->constants = ['title' => $this->title, 'user' => $this->user, 'school' => $this->school];
    }

    public function home() {
        $title = "SIMS Registrar";
        $school = "School Information Management System";
        $user = 'Registrar';

        return view('Registrar.home', $this->constants);
    }

    public function showStudentRegistration(){
        $title = "SIMS Registrar";
        $school = "School Information Management System";
        $user = 'Registrar';

        $srdata = StudentInfo::where('isRegistered', 'Yes')->where('isPaid', 'No')->get();
        $enrollee = StudentInfo::where('isRegistered', 'Yes')->where('isPaid', 'Yes')->where('isEnrolled', 'No')->get();
        $students = StudentInfo::where('isEnrolled', 'Yes')->get();

        return view('Registrar.sr',  $this->constants,['srdata' => $srdata, 'enrollee' => $enrollee, 'students' => $students]);
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

        $createuser = new User;
        $createuser->name = $request->name;
        $createuser->email = $request->emailaddress;
        $createuser->password = Hash::make($request->name);
        $createuser->account_type = "Student";
        $createuser->unique_id = $request->userID;

        if($accept) {
            if($createuser->save()){
                return redirect('/student-registration')->with('success', 'Student has been Enrolled!');
            }
        }
    }

    public function showAnnouncements() {
        $announcements = Announcements::where('isActive', 1)->get();
        return view('Registrar.ann', $this->constants, ['announcements' => $announcements]);
    }

    public function getAnnouncementData($id){
        $data = Announcements::where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function updateAnnouncement(Request $request) {

        if($request->hasFile('image')){
            $imagename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imagename);
        } else if(!$request->hasFile('image')) {
            $imagename = "Logo.png";
        }

         $update = Announcements::where('ID', $request->annID)->update([
            'Headline' => $request->headline, 
            'Description' => $request->description,
            'PostedAt' => $request->postedAt,
            'Image' => $imagename
         ]);

         if($update) {
            return redirect('/announcement')->with('success', 'You have updated the announcement!');
         }
    }

    public function removeAnnouncement(Request $request) {
        $delete = Announcements::where('ID', $request->annID)->update(['isActive' => 0]);
        if($delete){
            return redirect('/announcement')->with('success', 'You have remove the announcement!');
        }
    }

    public function addAnnouncement(Request $request) {
        $validated = $request->validate(['headline' => 'required', 
        'description' => 'required', 
        'postedAt' => 'required', 
        'author' => 'required',
         
        
        ]);

      

        

        $addAnnouncement = new Announcements;
        $addAnnouncement->Headline = $validated['headline'];
        $addAnnouncement->Description = $validated['description'];
        $addAnnouncement->PostedAt = $validated['postedAt'];
        $addAnnouncement->Author = $validated['author'];
        if($request->hasFile('image')){
            $imagename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imagename);
            $addAnnouncement->Image = $imagename;
        } else if (!$request->hasFile('image')) {
            $addAnnouncement->Image = "Logo.png";
        }

        $addAnnouncement->Attachment = "";
        $addAnnouncement->isActive = 1;


        if($addAnnouncement->save()){
            return redirect('/announcement')->with('success', 'Announcement added!');
        } else {
            echo "Error";
        }

    }

    public function showClasses(){
         $section = Section::where('isActive', 1)->get();
         $schedules = DB::table('schedule')
                      ->join('sections', 'sections.ID', '=' , 'schedule.section_id')
                      ->where('schedule.isActive', 1)->get();
         return view('Registrar.cm', $this->constants, ['section' => $section, 'schedules' => $schedules]);
    }

    public function getSectionStudentsData(Request $request){
        $data = DB::table('student')
                ->join('student_info', 'student.student_id', '=', 'student_info.user_id')
                ->where('section_id', $request->sectionID)->get();
        $section = Section::where('ID', $request->sectionID)->first();
         return view('Registrar.cm-ssv', $this->constants, ['data' => $data, 'section' => $section]);
    }

    public function getStudentInfo($id) {
        $data = StudentInfo::where('user_id', $id)->first();

        return response()->json(['data' => $data]);
    }

    public function getScheduleData($id){
        $data = DB::table('schedule')
                ->join('sections', 'sections.ID', '=' , 'schedule.section_id')
                ->where('schedule.ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function editSchedule(Request $request){
         $update = Schedules::where('ID', $request->scheduleID)
                    ->update(['subject' => $request->subject, 'time_from' => $request->timefrom, 'time_to' => $request->timeto, 'room' => $request->room, 'teacher' => $request->teacher]);
        
        if($update){
            return redirect('/class-manage')->with('success', "You updated a schedule for ". $request->gradesection .", updating system...");
        }
    }

    public function removeSchedule(Request $request){
         $delete = Schedules::where('ID', $request->scheduleID)
                    ->update(['isActive' => 0]);
        
        if($delete){
            return redirect('/class-manage')->with('success', "You have removed a schedule for ". $request->gradesection .", updating system...");
        }
    }

    public function documentRequests(){
         $students = StudentInfo::join('document_requests', 'student_info.user_id', '=', 'document_requests.student_id')
         ->where(['isActive' => 1, 'date_acknowledged' => NULL])
         ->get();
         return view('Registrar.dr', $this->constants, ['students' => $students]);
       
    }

    public function getDocumentLists(Request $request){
        $data = DocumentRequests::join('student_info', 'student_info.user_id', '=', 'document_requests.student_id')
                ->where('student_id', $request->studentID)
                ->get();
        return view('Registrar.drv', $this->constants, ['data' => $data]);
    }

    public function acknowledgeDocs(Request $request) {
        $acknowledge = DocumentRequests::where(['student_id' => $request->studentID, 'date_acknowledged' => NULL ]) 
                ->update(['date_acknowledged' => now()]);
        
        if($acknowledge) {
            return redirect('/document-requests')->with('success', 'You had acknowledged a request! Informing them now...');
        }
    }

}
