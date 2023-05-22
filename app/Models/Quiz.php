<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quiz extends Model
{
    use HasFactory ;
    use HasTranslations ;

    protected $guarded = [] ;
    public $translatable = ['name'] ;

    //! relation with SUBJECTS table :
    public function subjects()
    {
        return $this -> belongsTo(Subject::class , 'subject_id') ;
    }

    //! relation with GRADES table :
    public function grades()
    {
        return $this -> belongsTo(Grade::class , 'grade_id') ;
    }

    //! relation with CLASSROOMS table :
    public function classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'classrooms_id') ;
    }

    //! relation with SECTIONS table :
    public function sections()
    {
        return $this -> belongsTo(Section::class , 'section_id') ;
    }

    //! relation with TEACHERS table :
    public function teachers()
    {
        return $this -> belongsTo(Teacher::class , 'teacher_id') ;
    }
}
