<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exercises')->insert([
            'name' => 'Puxada Alta',
            'rest' => '1,30 min',
            'exercise_medias_id' => 1
        ]);

        DB::table('exercises')->insert([
            'name' => 'Voador Máquina',
            'rest' => '1,30 min',
            'exercise_medias_id' => 1
        ]);

        DB::table('exercises')->insert([
            'name' => 'Elevação Lateral Halteres',
            'rest' => '1,30 min',
            'exercise_medias_id' => 1
        ]);

        DB::table('exercises')->insert([
            'name' => 'Rosca Direta Barra W',
            'rest' => '1,30 min',
            'exercise_medias_id' => 1
        ]);

        DB::table('exercises')->insert([
            'name' => 'Tríceps Roldana',
            'rest' => '1,30 min',
            'exercise_medias_id' => 1
        ]);

        DB::table('exercises')->insert([
            'name' => 'Extensor',
            'rest' => '1,30 min',
            'exercise_medias_id' => 1
        ]);

        DB::table('exercises')->insert([
            'name' => 'Panturrilha',
            'rest' => '1,30 min',
            'exercise_medias_id' => 1
        ]);
    }
}
