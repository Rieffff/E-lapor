<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'category' => 'Bidang Humas',
        ]);
        User::factory()->create([
            'category' => 'Bidang Sarana dan Prasarana',
        ]);
        User::factory()->create([
            'category' => 'Bidang Tata Usaha',
        ]);
        User::factory()->create([
            'category' => 'Bidang Kurikulum',
        ]);
        User::factory()->create([
            'category' => 'Bidang Kesiswaan dan Bimbingan konseling',
        ]);
    }
}
