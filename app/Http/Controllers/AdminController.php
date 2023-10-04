<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Announcements;
use App\Models\Home;
use App\Models\User;
use Carbon\Carbon;




class AdminController extends Controller
{
    private $title;
    private $school;
    private $user;

    public function __construct(){
        $this->title = "SIMS Administrator";
        $this->school = "School Information Management System";
        $this->user = 'Administrator';
        $this->constants = ['title' => $this->title, 'user' => $this->user, 'school' => $this->school];
    }

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function home(){
       

        return view('Administrator.home', $this->constants);
    }
    public function updateMasterPage(){
        $home = Home::where('isActive', 1)->get();
        $announcements = Announcements::where('isActive', 1)->get();
        $about = DB::table('inq_about')->get();

        // $constants = ['title' => $title, 'user' => 'Admin', 'school' => $school];

        return view('Administrator.ump', $this->constants, ['home' => $home, 'announcements' => $announcements, 'about' => $about]);
    }

    public function getHomeData(Request $request){
        $data = DB::table('inq_home')->where('ID', $request['id'])->first();

        return response()->json(['data' => $data]);
    }

    public function updateHomeTab(Request $request) {
        $validated = $request->validate(['homeTabID' => 'required','title' => 'required', 'sub_title' => 'required', 'image' => 'required|image|mimes:jpeg,png,jpg|max:100000']);

        $imagename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imagename);

        $updateHome = Home::where('ID', 1)->update([
            'title' => $validated['title'],
            'sub_title' => $validated['sub_title'], // Use underscore instead of hyphen
            'image_url' => $imagename
        ]);

        if($updateHome) {
            return redirect('/update-master-page')->with('success', 'Home tab information updated!');
        }
    }
    
    public function addAnnouncement(Request $request) {
        $validated = $request->validate(['headline' => 'required', 
        'description' => 'required', 
        'postedAt' => 'required', 
        'author' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:100000',
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
            return redirect()->route('update-master-page')->with('success', 'Announcement added!');
        } else {
            echo "Error";
        }

    }

    public function getAnnouncementData(Request $request){
        $data = Announcements::where('ID', $request['id'])->first();

        return response()->json(['data' => $data]);
    }

    public function editAnnouncement(Request $request) {
        $validated = $request->validate([
            'announcementID' => 'required',
            'headline' => 'required', 
            'description' => 'required',
             'author' => 'required',
              'postedAt' => 'required',
              'image' => 'required|image|mimes:jpeg,png,jpg|max:100000'
        ]);

        $imagename = time() . '.' . $request->image->extension();
       

        $updateannouncement = Announcements::where('ID', $validated['announcementID'])->update([
            'Headline' => $validated['headline'],
            'Description' => $validated['description'],
            'PostedAt' => $validated['postedAt'],
            'Author' => $validated['author'],
            'Image' => $imagename
        ]);

        $request->image->storeAs('public/images', $imagename);

        if($updateannouncement) {
            return redirect('/update-master-page')->with('success', 'Announcement information updated!');
        }
    }

    public function deleteAnnouncement(Request $request) {
         $delete = Announcements::where('ID', $request->announcementID)->update(['isActive'=> 0]);


        if($delete){
            return redirect('/update-master-page')->with('success', 'Announcement removed from '. $request->postedAt); 
        }
    }

    public function getAboutData(Request $request) {
        $data = DB::table('inq_about')->where('ID', $request['id'])->first();
        return response()->json(['data' => $data]);
    }

    public function editAbout(Request $request) {
        $validated = $request->validate([
            'about' => 'required',
            'mission' => 'required',
            'vision' => 'required',
        ]);

            $updateabout = DB::table('inq_about')->where('ID', $request->aboutID)
            ->update(['About' => $validated['about'], 'Mission' => $validated['mission'], 'Vision' => $validated['vision']]);

            if($updateabout) {
                return redirect('/update-master-page')->with('success', 'About information updated!');
            }
        
        
    }

    public function addAccount(Request $request) {
        $addaccount = new User;
        $addaccount->name = $request->name;
        $addaccount->email = $request->email;
        $addaccount->password = Hash::make("password");
        $addaccount->account_type = $request->type;
        $addaccount->unique_id = strtoupper(Str::random(6));

        if($addaccount->save()){
            return redirect('/Administrator');
        }
     
    }

    public function showAccounts($type) {
        $accounts = User::where('account_type', $type)->get();

        return view('Administrator.acc', $this->constants, ['accounts' => $accounts]);
    }
    
    public function controlPanel(){
        $control = DB::table('control_panel')->where('isActive', 1)->get();
        return view('Administrator.cp', $this->constants, ['control' => $control]);
    }

    public function toggle(Request $request){
        if($request->status == 1){
            $changed = 0;
            $status = "Off";
        } else {
            $changed = 1;
            $status = "On";
        }
        $toggle = DB::table('control_panel')->where('ID', $request->ID)->update(['status' => $changed]);
        return redirect()->route('control-panel')->with('success', "Toggled ".$status." for ".$request->function );
    }

    public function feedback(){
        $feedback = DB::table('feedback')->where('isActive', 1)->get();
        return view('Administrator.s', $this->constants, ['feedback' => $feedback]);
    }

    public function getFeedbackData($id) {
        $data = DB::table('feedback')->where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function acknowledgeFeedback(Request $request){
        if($request->comment == ""){
            $comment = NULL;
        } else {
            $comment = $request->comment;
        }
        $acknowledge = DB::table('feedback')->where('ID', $request->feedbackID)->update(['acknowledged_by' => $request->name, 'isAcknowledged' => 1, 'date_acknowledged' => now(), 'comment' => $comment]);
        return redirect()->route('feedback')->with('success', 'You have acknowledged '.$request->from.' feedback');
    }

    public function classManagement() {
        $grade = DB::table('grade_level')->get();
        $subjects = DB::table('subjects')->where('isActive', 1)->get();
        $rooms = DB::table('rooms')->where('isActive', 1)->get();
        return view('Administrator.cm', $this->constants, ['grade' => $grade, 'subjects' => $subjects, 'rooms' => $rooms]);
    }

    public function getgradeData($id) {
        $data = DB::table('grade_level')->where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function activateGrade(Request $request) {
        // echo $request->gradeID;
        // echo $request->email;
        // echo $request->password;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $activate = DB::table('grade_level')->where('ID', $request->gradeID)->update(['isActive' => 1]);
            return redirect()->route('class-management')->with('success', 'You have activated '.$request->gradename);
        } else {
            return redirect()->route('class-management')->with('error', 'Wrong password!');
        }
    }

    public function getsubjectData($id) {
        $data = DB::table('subjects')->where('ID', $id)->first();
        return response()->json(['data' => $data]);
    }

    public function editSubject(Request $request) {
        $edit = DB::table('subjects')->where('ID', $request->subID)->update(['name' => $request->subjectname, 'level' => $request->level]);
        if($edit) {
            return redirect()->route('class-management')->with('success', 'You have edited a subject!');
        }
    }

    public function deleteSubject(Request $request) {
      
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $remove = DB::table('subjects')->where('ID', $request->subID)->update(['isActive' => 0]);
            if($remove) {
                return redirect()->route('class-management')->with('success', 'You have removed a subject!');
            }
        } else {
            return redirect()->route('class-management')->with('error', 'Wrong password!');
        }
        
    }

    public function getRoomsData($id) {
        $data = DB::table('rooms')->where('ID', $id)->first();
        return response()->json(['data' => $data ]);
    }

    public function editRoom(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $edit = DB::table('rooms')->where('ID', $request->roomID)->update(['name' => $request->roomname]);
            return redirect()->route('class-management')->with('success', 'You have edited a room!');
        } else {
            return redirect()->route('class-management')->with('error', 'Wrong password! Cancelling edit...');
        }
        
    }

    public function removeRoom(Request $request) {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $delete = DB::table('rooms')->where('ID', $request->roomID)->update(['isActive' => 0]);
            return redirect()->route('class-management')->with('success', 'You have removed a room');
        } else {
            return redirect()->route('class-management')->with('error', 'Wrong password! Cancelling removal...');
           
        }
    }

    public function academicRecords() {
        return view('Administrator.ar', $this->constants);
    }

    public function searchRecords(Request $request) {
        $from = Carbon::parse($request->from)->format('F d, Y');
        $to = Carbon::parse($request->to)->format('F d, Y');
        switch ($request->table) {
            case 'student_info':
                    $students = DB::table('student_info')->whereBetween('updated_at', [$request->from, $request->to])->get();
                    return redirect()->route('academic-records')->with(['students' => $students, 'from' => $from, 'to' => $to]);
            break;
            case 'document_requests':
                    $dr = DB::table('document_requests')->whereBetween('updated_at', [$request->from, $request->to])->get();
                    return redirect()->route('academic-records')->with(['dr' => $dr, 'from' => $from, 'to' => $to]);
            break;
            case 'feedback':
                    $fb = DB::table('feedback')->whereBetween('updated_at', [$request->from, $request->to])->get();
                    return redirect()->route('academic-records')->with(['fb' => $fb, 'from' => $from, 'to' => $to]);
            break;
            case 'payment_info':
                    $pi = DB::table('payment_info')->whereBetween('updated_at', [$request->from, $request->to])->get();
                    return redirect()->route('academic-records')->with(['pi' => $pi, 'from' => $from, 'to' => $to]);
            break;
            case 'inq_announcement':
                    $ann = DB::table('inq_announcement')->whereBetween('updated_at', [$request->from, $request->to])->get();
                    return redirect()->route('academic-records')->with(['ann' => $ann, 'from' => $from, 'to' => $to]);
            break;
        }
        


    }
   



}
