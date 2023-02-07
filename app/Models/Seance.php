<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'fin',
        'debut',
        'classe_IdClasse',
        'enseignant_id',
        'matiere_id',
        'absents',
        'exclus',
              
    ];
    public function setAbsentsAttribute($value)
    {
        $this->attributes['absents'] = json_encode($value);
    }

    public function getAbsentsAttribute($value)
    {
        return $this->attributes['absents'] = json_decode($value);
    }
    public function setExclusAttribute($value)
    {
        $this->attributes['exclus'] = json_encode($value);
    }

    public function getExclusAttribute($value)
    {
        return $this->attributes['exclus'] = json_decode($value);
    }
}
