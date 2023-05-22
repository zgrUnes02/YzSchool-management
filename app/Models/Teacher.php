<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Teacher extends Model
{
    use HasFactory;

    use HasTranslations ;
    public $translatable =['name'] ;

    public $guarded = [] ;

    public function genders()
    {
        return $this -> belongsTo('App\Models\Gender' , 'gender_id') ;
    }

    public function specializations()
    {
        return $this -> belongsTo('App\Models\Specialization' , 'specialization_id') ;
    }

    //! relation between Teacher and Section ;
    public function Sections()
    {
        return $this -> belongsToMany('App\Models\Section' , 'teacher_section_') ;
    }
}
