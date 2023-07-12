<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologies = [ "Laravel", "vite", "html", "Css", "JavaScript", "C++" ];

        foreach ($tecnologies as $tecnologyName) {
            $newTecnology = new Technology();
            $newTecnology->name = $tecnologyName;
            $newTecnology->save();
        }
    }
}
