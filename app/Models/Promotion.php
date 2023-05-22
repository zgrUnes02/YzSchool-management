<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory ;

    //? soft delete :
    // use SoftDeletes ;

    protected $guarded = [] ;

    //! Relations With Promotion And Students :
    public function Students()
    {
        return $this -> belongsTo(Student::class , 'student_id') ;
    }

//? ----------------------------------------------------------------------------------------
//? -------------------------------------- FROM --------------------------------------------
//? ----------------------------------------------------------------------------------------

    //! Relation With Promotion And Grades :
    public function Grades()
    {
        return $this -> belongsTo(Grade::class , 'from_grade') ;
    }

    //! Relation With Promotion And Classrooms :
    public function Classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'from_classroom') ;
    }

    //! Relation With Promotion And Sections :
    public function Sections()
    {
        return $this -> belongsTo(Section::class , 'from_section') ;
    }
//? ----------------------------------------------------------------------------------------

//? ----------------------------------------------------------------------------------------
//? --------------------------------------- To ---------------------------------------------
//? ----------------------------------------------------------------------------------------

    //! Relation With Promotion And Grades :
    public function toGrades()
    {
        return $this -> belongsTo(Grade::class , 'to_grade') ;
    }

    //! Relation With Promotion And Classrooms :
    public function toClassrooms()
    {
        return $this -> belongsTo(Classroom::class , 'to_classroom') ;
    }

    //! Relation With Promotion And Sections :
    public function toSections()
    {
        return $this -> belongsTo(Section::class , 'to_section') ;
    }

//? -----------------------------------------------------------------------------------------


}
