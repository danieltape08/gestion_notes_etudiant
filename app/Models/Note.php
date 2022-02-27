<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'note','etudiant_id','matiere_id',
    ];

    public function noteE(){
        return $this->belongsTo(Etudiant::class,'note_id',"id");    
    }

    public function noteM(){
        return $this->belongsTo(Matiere::class,'classe_id',"id");
}

}