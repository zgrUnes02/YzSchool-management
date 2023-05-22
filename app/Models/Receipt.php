<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory ;
    protected $guadred = [] ;

    public function students()
    {
        return $this -> belongsTo(Student::class , 'student_id') ;
    }
}
