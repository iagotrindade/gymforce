<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Image;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            ImageSeeder::class,
            AccessControlSeeder::class,
            AdminUserSeeder::class,
            StudentTestSeeder::class,
            ExerciseMideaSeeder::class,
            ExerciseSeeder::class,
        ]);

        //User::factory(10)->create();
    }
}
