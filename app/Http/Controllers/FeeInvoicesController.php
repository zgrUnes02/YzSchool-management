<?php

namespace App\Http\Controllers;

use App\Models\FeeInvoices;
use App\Models\StudentAccount;
use App\Repository\FeeInvoicesRepositoryInterface;
use Illuminate\Http\Request;

class FeeInvoicesController extends Controller
{
    protected $FeeInvoices ;
    public function __construct(FeeInvoicesRepositoryInterface $FeeInvoices)
    {
        $this -> FeeInvoices = $FeeInvoices ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this -> FeeInvoices -> index() ;
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
        return $this -> FeeInvoices -> store($request) ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this -> FeeInvoices -> show($id) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this -> FeeInvoices -> edit($id) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        return $this -> FeeInvoices -> update($request , $id) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this -> FeeInvoices -> destroy($id) ;
    }
}
