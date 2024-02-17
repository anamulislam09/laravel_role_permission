<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    public function Admin(){
        // dd("Hello");
        return view('admin.home');
    }

      // admin custome logout
      public function logout(){
        Auth()->logout();
        $notification = array('message'=>'You are logout out','alert_type'=>'success');
        return redirect()->route('admin.login')->with($notification);
    }
}
