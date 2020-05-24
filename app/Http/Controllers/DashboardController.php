<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    //Middleware to check Authentication.
    public function __construct(){
        $this->middleware('auth');
    }

    
    //Since the dashboard will be our main page for Authenticated Users we changed the controllers name and brought a different view.
    public function index(){

        //We get the ID From User's Session.
        $user_id = auth()->user()->id; 

        $user = User::findOrFail($user_id); 

        //A Nice Way to pass multiple Models and not use Compact.
        return view('dashboard',[
            'listings'=>$user->listings,
            'user'=>$user,
        ]); 
    }
}

