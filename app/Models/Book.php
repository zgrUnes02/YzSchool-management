<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory ;
    protected $guarded = [] ;

    //! reltion with table grades :
    public function grades()
    {
        return $this -> belongsTo(Grade::class , 'grade_id') ;
    }

    //! reltion with table classrooms :
    public function classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'classroom_id') ;
    }

    //! reltion with table sections :
    public function sections()
    {
        return $this -> belongsTo(Section::class , 'section_id') ;
    }

    //! reltion with table teachers :
    public function teachers()
    {
        return $this -> belongsTo(Teacher::class , 'teacher_id') ;
    }
}
