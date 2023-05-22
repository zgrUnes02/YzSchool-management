<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class My_parents extends Model
{
    use HasFactory ;

    use HasTranslations ;
    public $translatable = ['Name_Father' , 'Job_Father' , 'Name_Mother' , 'Job_Mother'];

    protected $guarded = [] ;
}
