<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $table = 'projets';

    protected $fillable = [
        'titre',
        'slug',
        'description',
        'image',
        'technologies',
        'github_url',
        'demo_url',
        'apk_url',
    ];
}