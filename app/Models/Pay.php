<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory ;
    protected $fillable = ['student_id' , 'date' , 'amount' , 'description'] ;

    //* relation with STUDENTS table :
    public function students()
    {
        return $this -> belongsTo(Student::class , 'student_id') ;
    }
}
