<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class fake_data extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Crea un'istanza di Faker

        for ($i = 0; $i < 10; $i++) {

            $project = new Project();
            $project->title = $faker->sentence;
            $project->description = $faker->paragraph;
            $project->languages = $faker->word;

            $project->save();
        }
    }
}
