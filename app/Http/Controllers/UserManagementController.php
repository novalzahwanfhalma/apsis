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
    // view detail 
    public function viewDetail($id)
    {   
        $data = DB::table('users')->where('id',$id)->get();
        return view('usermanagement.view_users',compact('data'));
    }

      
    // profile user
    public function profile()
    {
        return view('usermanagement.profile_user');
    }

    // update 
    public function update(Request $request)
    {

        $update = [

            'id'            =>$request->id,
            'name'          =>$request->name,
            'email'         =>$request->email,
            'phone_number'  =>$request->phone_number,
            'status'        =>$request->status,
            'role_name'     =>$request->role_name
        ];
        User::where('id',$request->id)->update($update);
        return redirect()->back()->with('update','Users Update Success.');
    }

    public function delete($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->back()->with('update','Data deleted successfully!');
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









