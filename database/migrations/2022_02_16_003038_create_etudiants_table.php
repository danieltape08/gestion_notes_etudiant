<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string("nom")->unique();
            $table->string("prenom")->unique();
            $table->char("sexe");
            $table->foreignId("classe_id")->constrained("classes");
            $table->foreignId("note_id")->constrained("notes");
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropForeign("classe_id");
            $table->dropForeign("note_id");
        });
        Schema::dropIfExists('etudiants');
    }
}
