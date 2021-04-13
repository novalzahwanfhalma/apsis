<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserManagementController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->get();
        return view('usermanagement.user_control',compact('data'));
    }
    // profile user
    public function profile()
    {
        return view('usermanagement.profile_user');
    }
    // save 
    public function profileStore(Request $request)
    {
        $request->validate([
            'firstName'       => 'required|string',
            'lastName'        => 'required|string',
            'email'           => 'required|string|email',
            'changeProfile'   => 'required|string',
            'website'         => 'required|string',
            'street'          => 'required|string',
            'city'            => 'required|string',
            'state'           => 'required|string',
            'userName'        => 'required|string',
            'password'        => 'required|string',
            'confirmPassword' => 'required|string',
        ]);
        return dd('OK');
    }
}









