<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Repository\StudentsRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //! class Construct :
    public $Student ;
    public function __construct(StudentsRepositoryInterface $Student)
    {
        $this -> Student = $Student ;
    }

    //! function Index :
    public function index()
    {
        return $this -> Student -> getStudents() ;
    }

    //! function Create :
    public function create()
    {
        $the_message_from_interface = $this -> Student -> createStudents() ;
        return $the_message_from_interface ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            //! name (arabic and english) :
            'name_ar' => 'required|max:255',
            'name_en' => 'required|max:255',
            //! email and password :
            'email' => 'required',
            'password' => 'required',
            //! nationality , blood , gender :
            'nationalitie_id' => 'required',
            'blood_id' => 'required',
            'gender_id' => 'required',
            //! birthdate :
            'Birth_date' => 'required',
            //! grade , classrooms , section , parent name , academic year :
            'Grade_id' => 'required',
            'Classroom_id' => 'required',
            'section_id' => 'required',
            'parent_id' => 'required',
            'academic_year' => 'required',
        ]);

        return $this -> Student -> storeStudent($request) ;        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this -> Student -> editStudent($id) ;
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
        return $this -> Student -> updateStudent($request , $id) ;
    }

    public function show($id)
    {
        return $this -> Student -> show($id) ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this -> Student -> deleteStudent($request -> id_of_student_wanna_delete) ;
    }

    //! function for geeting classrooms :
    public function Get_classrooms($id)
    {
        return $this -> Student -> getClassroomsForAjax($id) ;
    }

    //! function for geeting sections :
    public function Get_Sections($id)
    {
        return $this -> Student -> getSectionsForAjax($id) ;
    }

    //! function for uploading more attachements :
    public function uploadMoreAttachements(Request $request)
    {
        return $this -> Student -> uploadMoreAttachements($request) ;
    }

    public function downloadAttachement($studentName , $fileName)
    {
        return $this -> Student -> downloadAttachement($studentName , $fileName) ;
    }

    public function deleteAttachement(Request $request)
    {
        return $this -> Student -> deleteAttachement($request) ;
    }

    // public function getAllStudents()
    // {
    //     return Student::all() ;
    // }

}
