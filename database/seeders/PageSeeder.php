<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i=0; $i < 100; $i++) {
            Page::insert([
                "slug" => $faker->slug(),
                "title" => $faker->name(),
                "content" => $faker->realText()
            ]);
        }
    }
}
