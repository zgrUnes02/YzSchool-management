<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\Translatable\Translatable;

class Section extends Model
{

    use HasTranslations ;
    public $translatable = ['name_section'] ;

    protected $table = 'sections';
    public $timestamps = true;
    protected $fillable = ['name_section' , 'grade_id' , 'classroom_id' , 'status'] ;

    public function Classrooms()
    {
        return $this->belongsTo('App\Models\Classroom' , 'classroom_id');
    }

    //! relation between Section and Teacher ;
    public function Teachers()
    {
        return $this -> belongsToMany('App\Models\Teacher' , 'teacher_section_') ;
    }

}
