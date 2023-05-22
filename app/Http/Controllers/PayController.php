<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use App\Repository\PayRepositoryInterface;
use Illuminate\Http\Request;

class PayController extends Controller
{
    //* function __construct() ;
    protected $Pay ;
    public function __construct(PayRepositoryInterface $Pay)
    {
        $this -> Pay = $Pay ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this -> Pay -> index() ;
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
        return $this -> Pay -> store($request) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this -> Pay -> show($id) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        return $this -> Pay -> update($request , $id) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pay  $pay
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this -> Pay -> destroy($id) ;
    }
}
