<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            ["note"=> 0,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
            ["note"=> 18,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
            ["note"=> 14,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
            ["note"=> 20,
                "etudiant_id"=> 8,
                    "matiere_id"=> 7],
            ["note"=> 15,
                "etudiant_id"=> 2,
                    "matiere_id"=> 7],
            ["note"=> 17,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
            ["note"=> 9,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
            ["note"=> 0,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
            ["note"=> 0,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
            ["note"=> 2,
                "etudiant_id"=> 7,
                    "matiere_id"=> 7],
        ]);
    }
}
