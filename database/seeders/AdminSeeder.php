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
<<<<<<< HEAD
    'email' => 'admin@smpn1situbondo.sch.id',
    'password' => Hash::make('daniel'), // ganti password 

    //  run di terminal "php artisan db:seed --class=AdminSeeder"
    
]);
=======
            'email' => 'admin@smpn1situbondo.sch.id',
            'password' => Hash::make('Wiii'), // ganti password 
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
            
        ]);
>>>>>>> parent of a69b807 (template)
    }
}
