<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpesializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations') -> delete() ;

        $specializations = [
            ['en' => 'Life and Earth Sciences' , 'ar' => 'علوم الحياة و الارض'] ,
            ['en' => 'Physics and Chemistry Sciences' , 'ar' => 'علوم الفيزياء و الكيمياء'] ,
            ['en' => 'Mathematics' , 'ar' => 'الرياضيات'] ,
            ['en' => 'Arabic Language' , 'ar' => 'اللغة العربية'] ,
            ['en' => 'English Language' , 'ar' => 'اللغة الانجليزية'] ,
            ['en' => 'French language' , 'ar' => 'اللغة الفرنسية'] ,
            ['en' => 'Sports' , 'ar' => 'الرياضة'] ,
            ['en' => 'Philosophy' , 'ar' => 'الفلسفة'] ,
            ['en' => 'Visual Arts' , 'ar' => 'التربية الاسلامية'] ,
            ['en' => 'History and Geography' , 'ar' => 'التاريخ و الجغرافيا']
        ] ;

        foreach($specializations as $specialization)
        {
            Specialization::create([
                'name' => $specialization ,
            ]) ;
        }
    }
}
