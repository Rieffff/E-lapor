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
        Category::factory()->create([
            'category' => 'Bidang Humas',
        ]);
        Category::factory()->create([
            'category' => 'Bidang Sarana dan Prasarana',
        ]);
        Category::factory()->create([
            'category' => 'Bidang Tata Usaha',
        ]);
        Category::factory()->create([
            'category' => 'Bidang Kurikulum',
        ]);
        Category::factory()->create([
            'category' => 'Bidang Kesiswaan dan Bimbingan konseling',
        ]);
    }
}
