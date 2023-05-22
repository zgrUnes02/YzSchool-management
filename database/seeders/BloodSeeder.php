<?php

namespace Database\Seeders;

use App\Models\Blood;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods') -> delete() ;
        $types = ['A+' , 'A-' , 'B+' , 'B-' , 'AB+' , 'AB-' , 'O-' , 'O+'] ;

        foreach ($types as $type)
        {
            Blood::create([
                'type_of_blood' => $type ,
            ]) ;
        }
    }
}
