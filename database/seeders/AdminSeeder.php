<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@smpn1situbondo.sch.id',
            'password' => Hash::make('ChangeMe123!'),
        ]);
    }
}
