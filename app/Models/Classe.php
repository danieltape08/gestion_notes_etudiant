<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $fillable = [
        'classe',
    ];
    public function classe(){
        return $this->hasMany(Etudiant::class);    
    }
}
