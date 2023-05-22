<?php

namespace App\Http\Controllers;

use App\Repository\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
     //! function __CONSTRUCT() :
    protected $Quiz ;
    public function __construct(QuizRepositoryInterface $Quiz)
    {
        return $this -> Quiz = $Quiz ;
    }

    //! function INDEX() :
    public function indeX()
    {
        return $this -> Quiz -> index() ;
    }

    //! function CREATE() :
    public function create()
    {
        return $this -> Quiz -> create() ;
    }

    //! function STORE() :
    public function store(Request $request)
    {
        return $this -> Quiz -> store($request) ;
    }

    //! function EDIT() :
    public function edit($id)
    {
        return $this -> Quiz -> edit($id) ;
    }

    //! function UPDATE() :
    public function update(Request $request , $id)
    {
        return $this -> Quiz -> update($request , $id) ;
    }

    //! function DESTROY() :
    public function destroy(Request $request , $id)
    {
        return $this -> Quiz -> destroy($request , $id) ;
    }

    public function showFile($teacher_name , $file_name)
    {
        return $this -> Quiz -> showFile($teacher_name , $file_name) ;
    }
}
