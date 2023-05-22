<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Setting;
use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //! function show me the dashboard :
    public function index()
    {
        $count['logo'] = Setting::where('id' , 1) -> pluck('logo') ;        
        return view('dashboard' , $count) ;
    }

    //! function show me the login page :
    public function loginPage()
    {
        return view('auth.login') ;
    }

    //! landing page before the login :
    public function landingPage()
    {
        return view('pages.Home.index') ;
    }
}
