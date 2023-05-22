<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeInvoices extends Model
{
    use HasFactory;
    protected $guadred = [] ;

    //* relation between the invoices and students (tables) :
    public function students()
    {
        return $this -> belongsTo(Student::class , 'student_id') ;
    }

    //* relation between the invoices and grades (tables) :
    public function grades()
    {
        return $this -> belongsTo(Grade::class , 'grade_id') ;
    }

    //* relation between the invoices and classrooms (tables) :
    public function classrooms()
    {
        return $this -> belongsTo(Classroom::class , 'classroom_id') ;
    }

    //* relation between the invoices and fees (tables) :
    public function fees()
    {
        return $this -> belongsTo(Fee::class , 'fee_id') ;
    }
}
