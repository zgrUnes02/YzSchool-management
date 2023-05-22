<?php

namespace Database\Seeders;

use App\Models\My_parents;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ParentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_parents') -> delete() ;

        $parents = new My_parents() ;

        $parents -> Email = 'mouhamedzgr1972@gmail.com' ;
        $parents -> Password = Hash::make('mouhamed123'); ;

        // Father Info For Storing In Table :
        $parents -> Name_Father           = ['en' => 'mouhamed zagouri' , 'ar' => 'محمد زكوري'] ;
        $parents -> National_ID_Father    = 'BK13567' ;
        $parents -> Passport_ID_Father    = 'BE68J45FD2' ;
        $parents -> Phone_Father          = '0699030265' ;
        $parents -> Job_Father            = ['en' => 'policeman' , 'ar' => 'شرطي'] ;
        $parents -> Nationality_Father_id = 1 ;
        $parents -> Blood_Type_Father_id  = 1 ;
        $parents -> Religion_Father_id    = 1 ;
        $parents -> Address_Father        = 'bouskoura diar al andalous gh3 emm 10' ;

        // Mother Info For Storing In Table :
        $parents -> Name_Mother           = ['en' => 'fatiha msadek' , 'ar' => 'فتيحة مصدق'] ;
        $parents -> National_ID_Mother    = 'BE86012' ;
        $parents -> Passport_ID_Mother    = 'BO26F79J3D' ;
        $parents -> Phone_Mother          = '0687868384' ;
        $parents -> Job_Mother            = ['en' => 'housewife' , 'ar' => 'ربة بيت'] ;
        $parents -> Nationality_Mother_id = 1 ;
        $parents -> Blood_Type_Mother_id  = 1 ;
        $parents -> Religion_Mother_id    = 1 ;
        $parents -> Address_Mother        = 'bouskoura diar al andalous gh3 emm 10' ;

        $parents -> save() ;
    }
}
