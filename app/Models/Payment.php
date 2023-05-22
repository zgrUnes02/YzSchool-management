<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory ;
    protected $guadred = [] ;
    
    //* relation with students table :
    public function students()
    {
        return $this -> belongsTo(Student::class , 'student_id') ;
    }
}
