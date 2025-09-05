<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Universe;
use App\Models\Character;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        Universe::factory(5)->create();

        Character::factory(20)->create();
    }
}
