<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = [
        'IdClasse',
        'IDNbrClasse',
        'AnneeScol',
        'libeclassar',
        
    ];
    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
    public function enseignants()
{
    return $this->belongsToMany(Enseignant::class ,'classe_enseignant', 'enseignant_id', 'classe_IdClasse');
}
}
