<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;

use App\Repository\TeachersRepositoryInterface;
use Flasher\Laravel\Http\Request as HttpRequest;

class TeacherController extends Controller
{
    protected $Teacher ;
    public function __construct(TeachersRepositoryInterface $Teacher)
    {
        $this -> Teacher = $Teacher ;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = $this -> Teacher -> getAllTeachers() ;
        return view('pages.Teachers.empty' , compact('teachers')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = $this -> Teacher -> getAllGenders() ;
        $specializations = $this -> Teacher -> getAllSpecializations() ;
        
        return view('pages.Teachers.addTeacher' , compact('genders' , 'specializations')) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $testInfo = $this -> Teacher -> storeInfo($request) ;
            return $testInfo ;
        }
        catch(\Exception $error)
        {
            return redirect() -> route('teachers.index') -> withErrors(['error' => $error -> getMessage()]) ;
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //! genders and specializations :
        $genders = $this -> Teacher -> getAllGenders() ;
        $specializations = $this -> Teacher -> getAllSpecializations() ;

        //! find the teacher :
        $teacher_wanna_update = Teacher::findOrFail($id) ;

        return view('pages.Teachers.edit' , compact('teacher_wanna_update' , 'genders' , 'specializations')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $this -> Teacher -> updateTeacher($request) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $deleteTeacher = $this -> Teacher -> deleteTeacher($request -> teacher_delete_id) ;
        return $deleteTeacher ;
    }
}
