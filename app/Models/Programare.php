<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programare extends Model
{
    use HasFactory;

    protected $fillable = [
        'nume', 'prenume', 'specialitate', 'medic', 'data', 'ora', 'telefon', 'email', 'motiv', 'mesaj'
    ];
}
