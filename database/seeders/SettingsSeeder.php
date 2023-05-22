<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings') -> delete() ;

        Setting::create([
            'current_session'  => '2022-2023' ,
            'school_title'     => 'YZIS' ,
            'school_name'      => 'Youness zagouri international school' ,
            'school_title'     => 'YZS' ,
            'end_first_term'   => '2023-01-01' ,
            'end_second_term'   => '2023-01-08' ,
            'phone'            => '06 99 03 02 65' ,
            'address'          => 'RUE DE LA LIBERTE , Casablanca , Casablanca 20500 , morocco' ,
            'school_email'     => 'younesszagouri-is@gmail.com' ,
            'logo'             => '1.jpg' ,
        ]) ;
    }
}
