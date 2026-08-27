<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    /**
     * Les champs pouvant être remplis.
     */
    protected $fillable = [
        'titre',
        'organisme',
        'description',
        'date_obtention',
        'date_debut',
        'date_fin',
        'image',
        'document',
        'lien',
    ];

    /**
     * Conversion des types.
     */
    protected $casts = [
        'date_obtention' => 'date',
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];
}