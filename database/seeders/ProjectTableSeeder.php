<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Functions\Helper;
use App\Models\Technology;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 30; $i++) {
            $new_project = new Project();
            $new_project->technology_id = Technology::inRandomOrder()->first()->id;
            $new_project->title = $faker->sentence();
            $new_project->slug = Helper::generateSlug($new_project->title, Project::class);
            $new_project->text = $faker->paragraph(4, true);
            $new_project->reading_time = $faker->numberBetween(5, 90);
            $new_project->save();
        }
    }
}
