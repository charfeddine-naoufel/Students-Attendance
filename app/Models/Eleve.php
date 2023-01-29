<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $fillable = [
        'CIN',
        'IdentifiantUnique',
        'NomPrenom',
        'DateNaissance',
        'Adresse',
        'NomPere',
        'NomMere',
        'GSMPere',
        
    ];
    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
