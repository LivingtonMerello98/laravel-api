<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['name' => 'HTML'],
            ['name' => 'css'],
            ['name' => 'JavaScript'],
            ['name' => 'PHP'],
        ];


        //sganciare le foreign key


        //truncate dei dati presenti in colonna

        //utilizzare un ciclo per scegliere quanti dati inserire all interno

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }


        //riagganciare le foreign key
    }
}
