<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::create([
            'slug' => 'darksouls',
            'name' => 'Dark Souls',
        ]);

        Game::create([
            'slug' => 'darksouls2',
            'name' => 'Dark Souls 2',
        ]);

        Game::create([
            'slug' => 'darksouls3',
            'name' => 'Dark Souls 3',
        ]);
    }
}
