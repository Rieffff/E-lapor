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
            'name' => 'Siti Rosida,S.Ag',
            'Role' => 'Bidang Humas',
            'email' => 'rosida@smpn1situbondo.sch.id',
            'password' => Hash::make('Gemilang123@'), // ganti password 
            'photos' => 'rosida.png',
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
        ]);
        User::factory()->create([
            'name' => 'Moch. Sofwan.S.Pd',
            'Role' => 'Bidang Tata Usaha',
            'email' => 'admin@smpn1situbondo.sch.id',
            'password' => Hash::make('Gemilang123@'), // ganti password 
            'photos' => 'sofwan.png',
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
        ]);
        User::factory()->create([
            'name' => 'Sari Wahyuni,S.Pd',
            'Role' => 'Bidang Tata Usaha',
            'email' => 'sari@smpn1situbondo.sch.id',
            'password' => Hash::make('Gemilang123@'), // ganti password 
            'photos' => 'sari.png',
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
        ]);
        User::factory()->create([
            'name' => 'Sutrisno,S.Pd',
            'Role' => 'Bidang Tata Usaha',
            'email' => 'sutrisno@smpn1situbondo.sch.id',
            'password' => Hash::make('Gemilang123@'), // ganti password 
            'photos' => 'sutrisno.png',
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
        ]);
        User::factory()->create([
            'name' => 'Lailatul Rohmah,S.Pd',
            'Role' => 'Bidang Tata Usaha',
            'email' => 'laila@smpn1situbondo.sch.id',
            'password' => Hash::make('Gemilang123@'), // ganti password 
            'photos' => 'Rohmah.png',
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
        ]);
        User::factory()->create([
            'name' => 'Administrator',
            'Role' => 'Bidang Teknologi Informasi',
            'email' => 'muhammad@smpn1situbondo.sch.id',
            'password' => Hash::make('Gemilang123@'), // ganti password 
            'photos' => 'masganteng.png',
            //  run di terminal "php artisan db:seed --class=AdminSeeder"
        ]);
        

    }
}
