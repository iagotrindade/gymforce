<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'image_id' => 1,
            'email' => 'iago23st1@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456',
            'whatsapp' => '123456',
            'status' => 'Ativo',
        ]);

        $user = User::find(1); // Encontre o usuário que você deseja atribuir a role
        $role = Role::findByName('admin'); // Encontre a role que você deseja atribuir ao usuário

        $user->assignRole($role); // Atribua a role ao usuário
    }
}
