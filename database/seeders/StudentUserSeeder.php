<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentUserSeeder extends Seeder
{
   
    public function run(): void
    {
        User::create([
            'name' => 'Student',
            'email' => 'student@ehb.be',
            'password' => Hash::make('Test123!'),
            'is_admin' => false,
        ]);
    }
}
