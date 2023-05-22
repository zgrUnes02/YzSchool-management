<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations ;
    public $translatable = ['name' , 'notes'];

    protected $table = 'Grades' ;
    public $timestamps = true ;

    protected $fillable = ['name' , 'notes'] ;

    public function Sections()
    {
        return $this -> hasMany('App\Models\Section' , 'grade_id') ;
    }

}
