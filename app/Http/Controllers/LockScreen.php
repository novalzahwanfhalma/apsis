<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LockScreen extends Controller
{    
    // lock screen
    public function lockScreen()
    {
        return view('lockscreen.lockscreen');
    }
}
