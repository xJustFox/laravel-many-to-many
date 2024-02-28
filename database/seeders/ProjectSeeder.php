<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i=0; $i < 10; $i++) {
            $name = $faker->sentence(3);
            $slug = Str::slug($name);
            
            Project::create([
                'name' => $name,
                'slug' => $slug,
                'repository_link' => $faker->url,
                'description' => $faker->paragraph,
                'date_start' => $faker->date,
                'date_end' => $faker->optional()->date,
                'img' => $faker->imageUrl(),
            ]);
        }
    }
}
