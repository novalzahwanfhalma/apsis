<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;

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
        $id           = $request->id;
        $fullName     = $request->fullName;
        $email        = $request->email;
        $phone_number = $request->phone_number;
        $status       = $request->status;
        $role_name    = $request->role_name;
        
        $update = [

            'id'           => $id,
            'name'         => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
        ];

        User::where('id',$request->id)->update($update);
        return redirect()->route('userManagement')->with('update','User has been updated success.');
    }
    // delete
    public function delete($id)
    {
        $delete = User::find($id);
        $delete->delete();
        return redirect()->route('userManagement')->with('update','User has been deleted success.');
    }
}









