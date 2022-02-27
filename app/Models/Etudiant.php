<?php

namespace App\Models;

use App\Http\Controllers\ClasseController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    
    use HasFactory;
    
    protected $fillable = [
        'nom','prenom', 'sexe','classe_id','note_id',
    ];
    protected $attributes = [
        'note_id' => 1,
    ];

    public function etudiantC(){
        return $this->belongsTo(Classe::class,'classe_id',"id");    
    }

    public function etudiantN(){
        return $this->hasMany(Note::class);    
    }


    
}