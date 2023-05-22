<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    //! function INDEX() ;
    public function index()
    {
        $infos = Setting::where('id' , 1) -> first() ;
        return view('pages.Settings.index' , compact('infos')) ;
    }

    //! function UPDATE() ;
    public function store(Request $request)
    {
        try {
            $infos = Setting::findOrFail($request -> id) ;

            if($request -> hasfile('logo'))
            {

                $logo = $request -> logo ;

                Storage::disk('upload_quiz') -> delete('attachement/logo/' . $infos -> logo) ;
                $logo -> storeAs('attachement/logo' , 'logo.png' , 'upload_quiz') ;

                $infos -> current_session = date('Y-m-d') ;
                $infos -> school_title    = $request -> title ;
                $infos -> school_name     = $request -> name ;
                $infos -> end_first_term  = $request -> end_first_term ;
                $infos -> end_second_term = $request -> end_second_term ;
                $infos -> phone           = $request -> phone ;
                $infos -> address         = $request -> address ;
                $infos -> school_email    = $request -> email ;
                $infos -> logo            = 'logo.png' ;
                $infos -> save() ;
            }
            else 
            {
                $infos -> current_session = date('Y-m-d') ;
                $infos -> school_title    = $request -> title ;
                $infos -> school_name     = $request -> name ;
                $infos -> end_first_term  = $request -> end_first_term ;
                $infos -> end_second_term = $request -> end_second_term ;
                $infos -> phone           = $request -> phone ;
                $infos -> address         = $request -> address ;
                $infos -> school_email    = $request -> email ;
                $infos -> logo            = $infos -> logo ;
                $infos -> save() ;
            }
            
            toastr() -> success(trans('settings.success_update')) ;
            return redirect() -> back() ;
        }
        catch(\Exception $error)
        {
            toastr() -> error(trans('attendance.error')) ;
            return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
        }
    }
}
