<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Subject extends Model
{
    use HasFactory ;
    use HasTranslations ;

    public $translatable = ['name'] ;
    protected $fillable = ['name' , 'grade_id' , 'classroom_id' , 'teacher_id'] ;

    public function grades()
    {
        return $this -> belongsTo(Grade::class , 'grade_id') ;
    }

    public function classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'classroom_id') ;
    }

    public function teachers()
    {
        return $this -> belongsTo(Teacher::class , 'teacher_id') ;
    }
}
