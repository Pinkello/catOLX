<?php

namespace Database\Seeders;

use App\Models\Classifield;
use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassifieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classifields = Classifield::factory(10)->create();

        foreach ($classifields as $classifield) {
            $photoCount = rand(1, 5);

            Photo::factory($photoCount)->create([
                'classifield_id' => $classifield->id, // Powiązanie zdjęcia z ogłoszeniem
            ]);
        }
    }
}
