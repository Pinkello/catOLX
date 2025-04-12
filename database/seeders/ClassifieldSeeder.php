<?php

namespace Database\Seeders;

use App\Models\Classifield;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassifieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classifield::factory(10)->create();
    }
}
