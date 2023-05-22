<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Student extends Model
{
    use HasFactory ;
    use SoftDeletes ;

    public $guarded = [] ;

    use HasTranslations ;
    public $translatable = ['name'] ; 

    //! relation with grades table :
    public function grades()
    {
        return $this -> belongsTo(Grade::class , 'grade_id') ;
    }

    //! relation with classrooms table :
    public function classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'classroom_id') ;
    }

    //! relation with sections table :
    public function sections()
    {
        return $this -> belongsTo(Section::class , 'section_id') ;
    }

    //! relation with genders table :
    public function genders()
    {
        return $this -> belongsTo(Gender::class , 'gender_id') ;
    }

    //! relation with parents table :
    public function parents()
    {
        return $this -> belongsTo(My_parents::class , 'parent_id') ;
    }

    //! relation with nationalities table :
    public function nationalities()
    {
        return $this -> belongsTo(Nationality::class , 'nationality_id') ;
    }

    //! relation with bloods table :
    public function bloods()
    {
        return $this -> belongsTo(Blood::class , 'blood_id') ;
    }

    //! polymorphic function :
    public function images()
    {
        return $this -> morphMany('App\Models\Image' , 'imageable') ;
    }

    //! relation with payment table :
    public function students_accounts()
    {
        return $this -> hasMany(StudentAccount::class , 'student_id') ;
    }

    //! relation with attendances table :
    public function attendances()
    {
        return $this -> hasMany(Attendance::class , 'student_id') ;
    }
}
