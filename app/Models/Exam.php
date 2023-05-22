<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasFactory ;
    use HasTranslations ;

    protected $fillable = ['name' , 'term' , 'year_academic'] ;
    public $translatable = ['name'] ;
}
