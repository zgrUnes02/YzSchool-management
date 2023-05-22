<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Classrooms') -> delete() ;

        //! primary grade's classrooms :
        $classrooms = [
            ['ar' => 'الاول'   , 'en' => 'First in primary']  ,
            ['ar' => 'الثاني' , 'en' => 'Second in primary'] ,
            ['ar' => 'الثالث' , 'en' => 'Third in primary']  ,
            ['ar' => 'الرابع' , 'en' => 'Fourth in primary'] ,
            ['ar' => 'الخامس' , 'en' => 'Fifth in primary']  ,
            ['ar' => 'السادس' , 'en' => 'Sixth in primary']  ,
        ] ;

        foreach($classrooms as $classroom)
        {
            Classroom::create([
                'class_name' => $classroom ,
                'grade_id'   => 1 ,
            ]) ;
        }
    }

}