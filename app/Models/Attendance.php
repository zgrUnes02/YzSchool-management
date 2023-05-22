<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id'      , 
        'garde_id'        ,  
        'section_id'      , 
        'classroom_id'    ,
        'teacher_id'      ,
        'attendance_date' ,
        'status'          ,
    ] ;
}
