<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
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


/*
|--------------------------------------------------------------------------
| ACCUEIL
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
| FICHIERS STORAGE
|--------------------------------------------------------------------------
|
| Cette route permet à Laravel de servir les fichiers présents
| dans storage/app/public lorsque le lien symbolique
| public/storage ne fonctionne pas sur l'hébergement.
|
| Exemple :
| /storage/certifications/image.jpg
|
*/

Route::get('/storage/{path}', function ($path) {

    $file = storage_path('app/public/' . $path);

    if (!file_exists($file)) {
        abort(404);
    }

    return response()->file($file);

})->where('path', '.*');


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

    /*
    |--------------------------------------------------------------------------
    | MODIFIER LE PROFIL
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');


    /*
    |--------------------------------------------------------------------------
    | METTRE À JOUR LE PROFIL
    |--------------------------------------------------------------------------
    */

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');


    /*
    |--------------------------------------------------------------------------
    | SUPPRIMER LE PROFIL
    |--------------------------------------------------------------------------
    */

    Route::delete('/profile', [ProfileController::class, 'destroy']);

});


/*
|--------------------------------------------------------------------------
| ESPACE ADMINISTRATION
|--------------------------------------------------------------------------
|
| Toutes les routes de cette partie nécessitent
| que l'utilisateur soit connecté.
|
*/

Route::middleware(['auth', 'admin'])
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
        | PROJETS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'projets',
            ProjetController::class
        );


        /*
        |--------------------------------------------------------------------------
        | COMPÉTENCES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'competences',
            CompetenceController::class
        );


        /*
        |--------------------------------------------------------------------------
        | EXPÉRIENCES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'experiences',
            ExperienceController::class
        );


        /*
        |--------------------------------------------------------------------------
        | FORMATIONS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'formations',
            FormationController::class
        );


        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'services',
            ServiceController::class
        );


        /*
        |--------------------------------------------------------------------------
        | CERTIFICATIONS
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'certifications',
            CertificationController::class
        );


        /*
        |--------------------------------------------------------------------------
        | PARAMÈTRES DU PORTFOLIO
        |--------------------------------------------------------------------------
        */


        /*
        | Afficher les paramètres
        */

        Route::get(
            '/parametres',
            [ParametreController::class, 'edit']
        )->name('parametres.edit');


        /*
        | Enregistrer les paramètres
        */

        Route::put(
            '/parametres',
            [ParametreController::class, 'update']
        )->name('parametres.update');

    });


/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION
|--------------------------------------------------------------------------
|
| Login
| Register
| Logout
| Mot de passe oublié
| Réinitialisation du mot de passe
|
*/

require __DIR__.'/auth.php';