<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatiereTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matieres')->insert([
            ["matiere"=>"ANGLAIS",
                "coef"=> 1],
            ["matiere"=>"FRANCAIS",
                "coef"=> 3],
            ["matiere"=>"MATHS",
                "coef"=> 5],
            ["matiere"=>"DEV PERSO",
                "coef"=> 3],
            ["matiere"=>"PHYSIQUE",
                "coef"=> 6],
            ["matiere"=>"CODING",
                "coef"=> 4],
            ["matiere"=>"SPORT",
                "coef"=> 1],

        ]);
    }
}
