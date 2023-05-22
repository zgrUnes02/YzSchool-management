<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Relegion extends Model
{
    use HasFactory;

    use HasTranslations ;
    public $translatable = ['relegion_name'] ;

    protected $fillable = ['relegion_name'] ;
}
