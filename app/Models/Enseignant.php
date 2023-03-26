<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $fillable = [
        'CodeEnseignant',
        'NomEnseignant',
        'Matiere_id',
        'Grade',
        'Type',
        
    ];
    public function classes()
    {
        return $this->belongsToMany(Classe::class ,'classe_enseignant');
    }
    public function user()
    {
        return $this->belongsTo(User::class );
    }
}
