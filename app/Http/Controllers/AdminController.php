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
    

   



}
