<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class StudentTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Student User',
            'age' => '25',
            'inscription' => '12345678',
            'image_id' => 1,
            'email' => 'iagost1@hotmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '991657516',
            'whatsapp' => '991657516',
            'status' => 'Ativo',
            'plan' => '99,99/mês',
        ]);

        $user = User::find(2); // Encontre o usuário que você deseja atribuir a role
        $role = Role::findByName('student'); // Encontre a role que você deseja atribuir ao usuário

        $user->assignRole($role); // Atribua a role ao usuário
    }
}
