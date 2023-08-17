<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{
    //
    public function showInquiry(){
        $banner = DB::table('inq_banner')->where('isActive', 1)->get();
        return view('inquiry', ['banner' => $banner]);
    }

}
