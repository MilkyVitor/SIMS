<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Announcements;
use App\Models\Home;




class AdminController extends Controller
{

    public function logOut(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function home(){
        $title = "SIMS Administrator";
        $school = "School Information Management System";
        $constants = ['title' => $title, 'user' => 'Admin', 'school' => $school];

        return view('Administrator.home', $constants);
    }
    public function updateMasterPage(){
        $title = "SIMS Administrator";
        $school = "School Information Management System";
        $home = DB::table('inq_home')->where('isActive', 1)->get();
        $announcements = DB::table('inq_announcement')->where('isActive', 1)->get();

        $constants = ['title' => $title, 'user' => 'Admin', 'school' => $school, 'home' => $home, 'announcements' => $announcements];

        return view('Administrator.ump', $constants);
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
    

   



}
