<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //disabilita le chiavi per poter lanciare il seeder
        Schema::disableForeignKeyConstraints();

        //possibilità di svuotare la tabella a ogni esecuzione del seeder
        Category::truncate();

        $categories = ['Frontend', 'Backend', 'AI', 'Fullstack'];

        foreach ($categories as $category) {

            $new_category = new Category();
            $new_category->title = $category;
            $new_category->slug = Str::of($category)->slug;

            $new_category->save();
        }
        //abilita le chiavi dopo che la tabella è stata popolata
        Schema::enableForeignKeyConstraints();
    }
}
