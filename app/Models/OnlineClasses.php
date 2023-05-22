<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineClasses extends Model
{
    use HasFactory ;
    protected $guarded = [] ;

    //! function grades() => relation with OnlineClasses and grades :
    public function grades()
    {
        return $this -> belongsTo(Grade::class , 'grade_id') ;
    }

    //! function classrooms() => relation with OnlineClasses and classrooms :
    public function classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'classroom_id') ;
    }

    //! function sections() => relation with OnlineClasses and sections :
    public function sections()
    {
        return $this -> belongsTo(Section::class , 'section_id') ;
    }

    //! function teachers() => relation with OnlineClasses and teachers :
    public function users()
    {
        return $this -> belongsTo(User::class , 'user_id') ;
    }
}
