<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Admin\ProjetController;
use App\Http\Controllers\Admin\CompetenceController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ParametreController;
use App\Http\Controllers\Admin\CertificationController;


/*
|--------------------------------------------------------------------------
| SITE PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::post('/contact', [MessageController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| TABLEAU DE BORD UTILISATEUR
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    return view('dashboard');

})->middleware(['auth', 'verified'])
  ->name('dashboard');


/*
|--------------------------------------------------------------------------
| PROFIL UTILISATEUR
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ESPACE ADMINISTRATION
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        /*
        |--------------------------------------------------------------------------
        | TABLEAU DE BORD ADMIN
        |--------------------------------------------------------------------------
        */

        Route::get('/', function () {

            return view('admin.dashboard');

        })->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | GESTION DES PROJETS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'projets',
            ProjetController::class
        );


        /*
        |--------------------------------------------------------------------------
        | GESTION DES COMPÉTENCES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'competences',
            CompetenceController::class
        );


        /*
        |--------------------------------------------------------------------------
        | GESTION DES EXPÉRIENCES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'experiences',
            ExperienceController::class
        );


        /*
        |--------------------------------------------------------------------------
        | GESTION DES FORMATIONS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'formations',
            FormationController::class
        );


        /*
        |--------------------------------------------------------------------------
        | GESTION DES SERVICES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'services',
            ServiceController::class
        );


        /*
        |--------------------------------------------------------------------------
        | PARAMÈTRES DU PORTFOLIO
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/parametres',
            [ParametreController::class, 'edit']
        )->name('parametres.edit');

        Route::put(
            '/parametres',
            [ParametreController::class, 'update']
        )->name('parametres.update');

    });


/*
|--------------------------------------------------------------------------
| ADMIN - CERTIFICATIONS
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::resource(
            'certifications',
            CertificationController::class
        );

    });


/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';