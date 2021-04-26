<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Auth;


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
    // activity log
    public function activityLog()
    {
        $activityLog = DB::table('user_activity_logs')->get();
        return view('usermanagement.user_activity_log',compact('activityLog'));
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

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();
        
        $update = [

            'id'           => $id,
            'name'         => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
        ];

        $activityLog = [

            'user_name'    => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Update',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);
        User::where('id',$request->id)->update($update);
        Toastr::success('User updated successfully :)','Success');
        return redirect()->route('userManagement');
    }
    // delete
    public function delete($id)
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user=Session::get('user');

        $fullName     = $user->name;
        $email        = $user->email;
        $phone_number = $user->phone_number;
        $status       = $user->status;
        $role_name    = $user->role_name;

        $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

        $activityLog = [

            'user_name'    => $fullName,
            'email'        => $email,
            'phone_number' => $phone_number,
            'status'       => $status,
            'role_name'    => $role_name,
            'modify_user'  => 'Delete',
            'date_time'    => $todayDate,
        ];

        DB::table('user_activity_logs')->insert($activityLog);

        $delete = User::find($id);
        $delete->delete();
        Toastr::success('User deleted successfully :)','Success');
        return redirect()->route('userManagement');
    }
}









