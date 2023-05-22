<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Fee extends Model
{
    use HasFactory;
    protected $guadred = [] ;

    use HasTranslations ;
    public $translatable = ['name'] ;

    //? relation with fees and grades
    public function grades()
    {
        return $this -> belongsTo(Grade::class , 'grade_id') ;
    }

    //? relation with fees and classrooms :
    public function classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'classroom_id') ;
    }
    
}
