<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = array(
            "HTML" => "#E34C26",
            "CSS" => "#264DE4",
            "JavaScript" => "#F7DF1E",
            "SCSS" => "#CD6799",
            "PHP" => "#777BB4",
            "Laravel" => "#FF2D20",
            "Phyton" => "#3776AB",
        );
        
        foreach ($tecnologies as $name => $color) {
            
            Technology::create([
                'name' => $name,
                'color'=> $color,
                'slug' => Str::slug($name),
    
            ]);
        };
    }
}
