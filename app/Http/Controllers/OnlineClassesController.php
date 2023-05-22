<?php

namespace App\Http\Controllers;

use App\Repository\OnlineClassesRepositoryInterface;
use Illuminate\Http\Request;

class OnlineClassesController extends Controller
{
    protected $OnlineClasses ;
    public function __construct(OnlineClassesRepositoryInterface $OnlineClasses)
    {
        $this -> OnlineClasses = $OnlineClasses ;
    }

    //! index :
    public function index()
    {
        return $this -> OnlineClasses -> index() ;
    }

    //! create direct (online) :
    public function create()
    {
        return $this -> OnlineClasses -> create() ;
    }

    //! create indirect (offline) :
    public function create_indirect()
    {
        return $this -> OnlineClasses -> create_indirect() ;
    }

    //! store direct (online) :
    public function store(Request $request)
    {
        return $this -> OnlineClasses -> store($request) ;
    }

    //! store indirect (offline) :
    public function store_indirect(Request $request)
    {
        return $this -> OnlineClasses -> store_indirect($request) ;
    }

    //! destroy direct (online) :
    public function destroy(Request $request , $id)
    {
        return $this -> OnlineClasses -> destroy($request , $id) ;
    }

    //! destroy direct (online) :
    public function destroy_indirect(Request $request , $id)
    {
        // return $this -> OnlineClasses -> destroy($request , $id) ;
    }
}
