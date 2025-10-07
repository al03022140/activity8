<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoboticsKit;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoboticsKitSeeder::class,
            CourseSeeder::class,
            UserSeeder::class,
        ]);
    }
}
