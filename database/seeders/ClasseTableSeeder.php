<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ["classe"=>"Licence1"],
            ["classe"=>"Licence2"],
            ["classe"=>"Licence3"],
            ["classe"=>"Master1"],
            ["classe"=>"Master2"],
            ["classe"=>"Doctorat1"],
            ["classe"=>"Doctorat2"],
            ["classe"=>"Doctorat3"],
        ]);
    }
}
