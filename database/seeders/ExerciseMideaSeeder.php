<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Exercise;

class ExerciseMideaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exercise_medias')->insert([
            'name' => 'exercises/adaptative_workout.png',
            'url' => 'exercises/adaptative_workout.png',
        ]);
    }
}
