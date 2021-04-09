<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserManagementController extends Controller
{
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









