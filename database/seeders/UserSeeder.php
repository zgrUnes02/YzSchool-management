<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') -> delete() ;
        
        $userName = 'Youness zagouri' ;
        $email    = 'younesszagouri2002@gmail.com' ;
        $password = 'younesszgr02' ;
        $type     = 'admin' ; 

        User::create([
            'name' => $userName ,
            'email' => $email ,
            'password' => Hash::make($password) ,
            'type' => $type ,
        ]) ;
    }
}
