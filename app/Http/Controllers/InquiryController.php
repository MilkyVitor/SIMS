<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Announcements;
use App\Models\Home;
use App\Models\User;
use PDF;

class InquiryController extends Controller
{
    //
    public function showInquiry(){
        $title = 'School Information Management';
        $home = Home::where('isActive', 1)->first();
        $announcement = Announcements::where('isActive', 1)->get();
        $about = DB::table('inq_about')->first();
        return view('inquiry', ['title' => $title],[ 'announcement' => $announcement, 'home' => $home, 'about' => $about]);
    }

    public function checkUser(Request $request) {
        $validation = $request->validate(['email' => 'required', 'password' => 'required']);

        if(auth()->attempt($validation)){
            $user = auth()->user();
            if($user->account_type == 'Administrator'){
                return redirect()->route('Administrator');
            } else if($user->account_type == 'Registrar'){
                return redirect()->route('Registrar');
            }else if($user->account_type == 'Cashier'){
                return redirect()->route('Cashier');
            }else if($user->account_type == 'Student'){
                return redirect()->route('Student');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/')->with('error', 'Credentials are wrong!');
        }
    }

    public function logout(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function showGeneralAnnouncements(Request $request){
        $title = "SIMS ".$request['accountType'];
        $school = "School Information Management System";
        $user = $request['accountType'];
        $folder = $request['accountType'];

        $data = DB::table('inq_announcement')->where('isActive', 1)->where('PostedAt', 'General')->get();
        return view('announcements', ['title' => $title, 'school' =>$school, 'user' => $user, 'data' => $data, 'folder' => $folder ]);
    }

    public function showProgramsOffered(Request $request){
        $title = "SIMS ".$request['accountType'];
        $school = "School Information Management System";
        $user = $request['accountType'];
        $folder = $request['accountType'];
        
        return view('programs', ['title' => $title, 'school' =>$school, 'user' => $user, 'folder' => $folder ]);
    }

    
    public function pdfPage() {
        $users = User::get(); /* Get Users table data */
  
        $data = [ /* Array to store title, date and users */
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => $users
        ]; 
            
        $pdf = PDF::loadView('pdf', $data); /* integrate the view of 'pdf' to visualize the pdf document and supply with $data  */
     
        return $pdf->stream('itsolutionstuff.pdf'); /* return to download */
    }


}
