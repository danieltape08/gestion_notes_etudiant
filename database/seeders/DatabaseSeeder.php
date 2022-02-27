<?php

namespace Database\Seeders;

use App\Models\Etudiant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MatiereTableSeeder::class);

        $this->call(ClasseTableSeeder::class);

        $this->call(NoteTableSeeder::class);

        Etudiant::factory(25)->create();
    }
}
