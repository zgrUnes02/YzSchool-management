<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Repository\StudentsGraduateRepositoryInterface;
use Illuminate\Http\Request;

class GraduateController extends Controller
{
    protected $Graduate ;

    public function __construct(StudentsGraduateRepositoryInterface $Graduate)
    {
        $this -> Graduate = $Graduate ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this -> Graduate -> index() ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this -> Graduate -> create() ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this -> Graduate -> softDelete($request) ;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this -> Graduate -> restoreOrDeleteDefinitly($request) ;
    }
}
