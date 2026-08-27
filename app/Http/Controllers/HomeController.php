<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Competence;
use App\Models\Experience;
use App\Models\Formation;
use App\Models\Service;
use App\Models\Parametre;
use App\Models\Certification;

class HomeController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | PROJETS
        |--------------------------------------------------------------------------
        */

        $projets = Projet::latest()->get();


        /*
        |--------------------------------------------------------------------------
        | COMPÉTENCES
        |--------------------------------------------------------------------------
        */

        $competences = Competence::all();


        /*
        |--------------------------------------------------------------------------
        | EXPÉRIENCES
        |--------------------------------------------------------------------------
        */

        $experiences = Experience::orderBy(
            'date_debut',
            'desc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | FORMATIONS
        |--------------------------------------------------------------------------
        */

        $formations = Formation::orderBy(
            'date_debut',
            'desc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | CERTIFICATIONS ET ATTESTATIONS
        |--------------------------------------------------------------------------
        */

        $certifications = Certification::orderBy(
            'date_obtention',
            'desc'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        $services = Service::all();


        /*
        |--------------------------------------------------------------------------
        | PARAMÈTRES DU PORTFOLIO
        |--------------------------------------------------------------------------
        */

        $parametre = Parametre::first();


        /*
        |--------------------------------------------------------------------------
        | CRÉATION AUTOMATIQUE DES PARAMÈTRES
        |--------------------------------------------------------------------------
        */

        if (!$parametre) {
            $parametre = Parametre::create([]);
        }


        /*
        |--------------------------------------------------------------------------
        | ENVOI DES DONNÉES À LA VUE HOME
        |--------------------------------------------------------------------------
        */

        return view('home', compact(
            'projets',
            'competences',
            'experiences',
            'formations',
            'certifications',
            'services',
            'parametre'
        ));
    }
}