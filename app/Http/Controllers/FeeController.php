<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Repository\FeesRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{

    public $Fees ;
    public function __construct(FeesRepositoryInterface $Fees)
    {
        $this -> Fees = $Fees ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this -> Fees -> index() ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this -> Fees -> createFees() ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this -> Fees -> storeFees($request) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this -> Fees -> show($id) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this -> Fees -> edit($id) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       return $this -> Fees -> update($request , $id) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this -> Fees -> destroy($id) ;
    }
}
