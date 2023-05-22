<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gender;
use App\Models\nationality;
use App\Models\Specialization;
use App\Providers\AppServiceProvider;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class ,
            BloodSeeder::class ,
            NationalitySeeder::class ,
            RelegionSeeder::class ,
            SpesializationSeeder::class ,
            GenderSeeder::class ,
            GradeSeeder::class ,
            ClassroomSeeder::class ,
            ParentsSeeder::class ,
            SettingsSeeder::class ,
        ]) ;
    }
}
