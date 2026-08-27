<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjetController extends Controller
{
    /**
     * Liste des projets
     */
    public function index()
    {
        $projets = Projet::latest()->get();

        return view('admin.projets.index', compact('projets'));
    }

    /**
     * Formulaire d'ajout
     */
    public function create()
    {
        return view('admin.projets.create');
    }

    /**
     * Enregistrer un projet
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'nullable|string',

            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'apk_url' => 'nullable|url|max:255',

            /*
             * APK :
             * On vérifie l'extension .apk.
             * Cela évite les problèmes de MIME avec certains APK.
             */
            'apk_file' => 'nullable|file|extensions:apk|max:51200',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'titre.required' => 'Le titre du projet est obligatoire.',
            'description.required' => 'La description du projet est obligatoire.',

            'github_url.url' => 'Le lien GitHub doit être une URL valide.',
            'demo_url.url' => 'Le lien de démonstration doit être une URL valide.',
            'apk_url.url' => 'Le lien APK doit être une URL valide.',

            'apk_file.extensions' => 'Le fichier doit avoir l’extension .apk.',
            'apk_file.max' => 'Le fichier APK ne doit pas dépasser 50 Mo.',

            'image.image' => 'Le fichier doit être une image.',
            'image.max' => 'L’image ne doit pas dépasser 2 Mo.',
        ]);

        $projet = new Projet();

        /*
        |--------------------------------------------------------------------------
        | TITRE
        |--------------------------------------------------------------------------
        */

        $projet->titre = $request->titre;

        /*
        |--------------------------------------------------------------------------
        | SLUG AUTOMATIQUE
        |--------------------------------------------------------------------------
        */

        $slug = Str::slug($request->titre);

        if (empty($slug)) {
            $slug = 'projet';
        }

        $originalSlug = $slug;
        $compteur = 1;

        while (Projet::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $compteur;
            $compteur++;
        }

        $projet->slug = $slug;

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS
        |--------------------------------------------------------------------------
        */

        $projet->description = $request->description;
        $projet->technologies = $request->technologies;
        $projet->github_url = $request->github_url;
        $projet->demo_url = $request->demo_url;

        /*
        |--------------------------------------------------------------------------
        | APK
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('apk_file')) {

            $projet->apk_url = $request
                ->file('apk_file')
                ->store('apk', 'public');

        } elseif ($request->filled('apk_url')) {

            $projet->apk_url = $request->apk_url;

        } else {

            $projet->apk_url = null;
        }

        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $projet->image = $request
                ->file('image')
                ->store('projets', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | ENREGISTREMENT
        |--------------------------------------------------------------------------
        */

        $projet->save();

        return redirect()
            ->route('admin.projets.index')
            ->with('success', 'Projet ajouté avec succès.');
    }

    /**
     * Afficher un projet
     */
    public function show(Projet $projet)
    {
        return view(
            'admin.projets.show',
            compact('projet')
        );
    }

    /**
     * Formulaire de modification
     */
    public function edit(Projet $projet)
    {
        return view(
            'admin.projets.edit',
            compact('projet')
        );
    }

    /**
     * Modifier un projet
     */
    public function update(Request $request, Projet $projet)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'nullable|string',

            'github_url' => 'nullable|url|max:255',
            'demo_url' => 'nullable|url|max:255',
            'apk_url' => 'nullable|url|max:255',

            /*
             * APK :
             * Vérification de l'extension uniquement.
             */
            'apk_file' => 'nullable|file|extensions:apk|max:51200',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'titre.required' => 'Le titre du projet est obligatoire.',
            'description.required' => 'La description du projet est obligatoire.',

            'github_url.url' => 'Le lien GitHub doit être une URL valide.',
            'demo_url.url' => 'Le lien de démonstration doit être une URL valide.',
            'apk_url.url' => 'Le lien APK doit être une URL valide.',

            'apk_file.extensions' => 'Le fichier doit avoir l’extension .apk.',
            'apk_file.max' => 'Le fichier APK ne doit pas dépasser 50 Mo.',

            'image.image' => 'Le fichier doit être une image.',
            'image.max' => 'L’image ne doit pas dépasser 2 Mo.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS
        |--------------------------------------------------------------------------
        */

        $projet->titre = $request->titre;
        $projet->description = $request->description;
        $projet->technologies = $request->technologies;
        $projet->github_url = $request->github_url;
        $projet->demo_url = $request->demo_url;

        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $nouveauSlug = Str::slug($request->titre);

        if (empty($nouveauSlug)) {
            $nouveauSlug = 'projet';
        }

        if ($nouveauSlug !== $projet->slug) {

            $originalSlug = $nouveauSlug;
            $compteur = 1;

            while (
                Projet::where('slug', $nouveauSlug)
                    ->where('id', '!=', $projet->id)
                    ->exists()
            ) {
                $nouveauSlug = $originalSlug . '-' . $compteur;
                $compteur++;
            }

            $projet->slug = $nouveauSlug;
        }

        /*
        |--------------------------------------------------------------------------
        | APK
        |--------------------------------------------------------------------------
        */

        /*
         * Nouveau fichier APK
         */
        if ($request->hasFile('apk_file')) {

            /*
             * Supprimer l'ancien APK local
             */
            if (
                $projet->apk_url &&
                !filter_var(
                    $projet->apk_url,
                    FILTER_VALIDATE_URL
                )
            ) {

                if (
                    Storage::disk('public')
                        ->exists($projet->apk_url)
                ) {
                    Storage::disk('public')
                        ->delete($projet->apk_url);
                }
            }

            /*
             * Enregistrer le nouveau APK
             */
            $projet->apk_url = $request
                ->file('apk_file')
                ->store('apk', 'public');

        /*
         * Nouveau lien APK
         */
        } elseif ($request->filled('apk_url')) {

            /*
             * Supprimer l'ancien fichier local
             */
            if (
                $projet->apk_url &&
                !filter_var(
                    $projet->apk_url,
                    FILTER_VALIDATE_URL
                )
            ) {

                if (
                    Storage::disk('public')
                        ->exists($projet->apk_url)
                ) {
                    Storage::disk('public')
                        ->delete($projet->apk_url);
                }
            }

            /*
             * Enregistrer le nouveau lien
             */
            $projet->apk_url = $request->apk_url;

        /*
         * Suppression volontaire de l'APK
         */
        } elseif (
            $request->has('apk_url') &&
            empty($request->apk_url)
        ) {

            /*
             * Supprimer l'ancien fichier local
             */
            if (
                $projet->apk_url &&
                !filter_var(
                    $projet->apk_url,
                    FILTER_VALIDATE_URL
                )
            ) {

                if (
                    Storage::disk('public')
                        ->exists($projet->apk_url)
                ) {
                    Storage::disk('public')
                        ->delete($projet->apk_url);
                }
            }

            $projet->apk_url = null;
        }

        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            /*
             * Supprimer l'ancienne image
             */
            if (
                $projet->image &&
                Storage::disk('public')
                    ->exists($projet->image)
            ) {
                Storage::disk('public')
                    ->delete($projet->image);
            }

            /*
             * Enregistrer la nouvelle image
             */
            $projet->image = $request
                ->file('image')
                ->store('projets', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | ENREGISTREMENT
        |--------------------------------------------------------------------------
        */

        $projet->save();

        return redirect()
            ->route('admin.projets.index')
            ->with('success', 'Projet modifié avec succès.');
    }

    /**
     * Supprimer un projet
     */
    public function destroy(Projet $projet)
    {
        /*
        |--------------------------------------------------------------------------
        | SUPPRIMER IMAGE
        |--------------------------------------------------------------------------
        */

        if (
            $projet->image &&
            Storage::disk('public')
                ->exists($projet->image)
        ) {

            Storage::disk('public')
                ->delete($projet->image);
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRIMER APK LOCAL
        |--------------------------------------------------------------------------
        */

        if (
            $projet->apk_url &&
            !filter_var(
                $projet->apk_url,
                FILTER_VALIDATE_URL
            )
        ) {

            if (
                Storage::disk('public')
                    ->exists($projet->apk_url)
            ) {

                Storage::disk('public')
                    ->delete($projet->apk_url);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRIMER LE PROJET
        |--------------------------------------------------------------------------
        */

        $projet->delete();

        return redirect()
            ->route('admin.projets.index')
            ->with('success', 'Projet supprimé avec succès.');
    }
}
