<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Error;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all() ;
        return view('pages.Events.index' , compact('events')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try
        {
            $event = Event::findOrFail($id) ;
            $event -> title = $request -> title ;
            $event -> start = $request -> start ;
            $event -> save() ;

            toastr() -> success(trans('events_trans.success_edit')) ;
            return redirect() -> back() ;
        }
        catch(\Exception $error)
        {
            toastr() -> warning(trans('events_trans.error')) ;
            return redirect() -> back() -> withErrors(['error' => $error -> getMessage()]) ;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            Event::where('id' , $id) -> delete() ;

            toastr() -> success(trans('events_trans.success_delete')) ;
            return redirect() -> route('events.index') ;
        }
        catch(\Exception $error)
        {
            toastr() -> warning(trans('events_trans.error')) ;
            return redirect() -> route('events.index') -> withErrors(['error' => $error -> getMessage()]) ;
        }
    }
}
