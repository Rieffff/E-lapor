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
            'email' => 'muhammad@smpn1situbondo.sch.id',
            'password' => Hash::make('Wiii'), // ganti password 
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
            
        ]);
    }
}
