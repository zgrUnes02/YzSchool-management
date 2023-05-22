<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //! function INDEX() :
    public function index()
    {
        try
        {
            $messages = Contact::all() ;
            return view('pages.Messages.index' , compact('messages')) ;
        }
        catch(\Exception $error)
        {
            toastr() -> error(trans('message_trans.error')) ;
            return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
        }
    }

    //! fucntion STORE() :
    public function store(Request $request)
    {
        $validation = $request -> validate([
            'full_name' => 'required' ,
            'email' => 'email|required' ,
            'message' => 'required' ,
        ]) ;

        try
        {
            Contact::create([
                'full_name' => $request -> full_name ,
                'email' => $request -> email ,
                'message' => $request -> message ,
            ]) ;
            toastr() -> success('Your Message was sent successfully !') ;
            return redirect() -> back() ;
        }
        catch(\Exception $error)
        {
            toastr() -> error('Your Message was not sent successfully !') ;
            return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
        }
        
    }

    //! function SHOW() :
    public function show($id)
    {
        try
        {
            $message = Contact::findOrFail($id) ;
            return view('pages.Messages.show' , compact('message')) ;
        }
        catch(\Exception $error)
        {
            toastr() -> error('Your Message was not sent successfully !') ;
            return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
        }
    }

    //! function DESTROY() :
    public function destroy($id)
    {
        try
        {
            Contact::where('id' , $id) -> delete() ;

            toastr() -> success(trans('message_trans.success_delete')) ;
            return redirect() -> back() ;
        }
        catch(\Exception $error)
        {
            toastr() -> error(trans('message_trans.error')) ;
            return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
        }
        
    }
}
