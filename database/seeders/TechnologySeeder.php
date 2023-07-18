<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $tecnologies = [ "Laravel", "vite", "html", "Css", "JavaScript", "C++" ];

        foreach ($tecnologies as $item) {
            $newTecnology = new Technology();
            $newTecnology->name = $item;
            $newTecnology->save();
        }
    }
}
