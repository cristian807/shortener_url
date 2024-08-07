<?php

namespace Database\Seeders;

use App\Models\Shortener;
use Illuminate\Database\Seeder;

class ShotenerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shortener::factory()->count(10)->create();
    }
}
