<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Grades') -> delete() ;

        Grade::create([
            'id' => 1 ,
            'name' => ['ar' => 'الابتدائي' , 'en' => 'Primary grade'] ,
            'notes' => [
                'ar' => 'كتاب أو عمل آخر مكتوب أو مطبوع، يُنظر إليه من حيث محتواه وليس من حيث شكله المادي' ,
                'en' => 'a book or other written or printed work, regarded in terms of its content rather than its physical form'
            ]
        ]) ;

        Grade::create([
            'id' => 2 ,
            'name' => ['ar' => 'الاعدادي' , 'en' => 'preparatory grade'] ,
            'notes' => [
                'ar' => 'كتاب أو عمل آخر مكتوب أو مطبوع، يُنظر إليه من حيث محتواه وليس من حيث شكله المادي' ,
                'en' => 'a book or other written or printed work, regarded in terms of its content rather than its physical form'
            ]
        ]) ;
    }
}
