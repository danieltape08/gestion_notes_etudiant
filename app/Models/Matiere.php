<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $fillable = [
        'matiere','coef',
    ];
    public function etudiantN(){
        return $this->hasMany(Note::class);    
}

}