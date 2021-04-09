<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Staff;

class FormController extends Controller
{
    // view form
    public function index()
    {
        return view('form.form');
    }

    // save 
    public function saveRecord(Request $request)
    {
        try{
        
        $userID       = $request->userID;
        $fullName     = $request->fullName;
        $emailAddress = $request->emailAddress;
        $position     = $request->position;
        $department   = $request->department;

        $Staff = new Staff();
        $Staff->user_id       = $userID;
        $Staff->full_name     = $fullName;
        $Staff->email_address = $emailAddress;
        $Staff->position      = $position;
        $Staff->department    = $department;
        $Staff->save();
        Toastr::success('Data added successfully :)','Success');
        return redirect()->back();

        }catch(\Exception $e){

            Toastr::error('Data added fail :)','Error');
            return redirect()->back();
        }
    }
}
