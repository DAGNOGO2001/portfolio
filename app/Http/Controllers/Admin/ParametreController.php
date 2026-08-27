<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parametre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParametreController extends Controller
{
    /**
     * Afficher la page des paramètres.
     */
    public function edit()
    {
        $parametre = Parametre::first();

        // Créer automatiquement une ligne si aucun paramètre n'existe
        if (!$parametre) {
            $parametre = Parametre::create([]);
        }

        return view('admin.parametres.edit', compact('parametre'));
    }


    /**
     * Mettre à jour les paramètres.
     */
    public function update(Request $request)
    {
        $parametre = Parametre::first();

        if (!$parametre) {
            $parametre = Parametre::create([]);
        }

        $validated = $request->validate([

            // Identité
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',

            // Profession
            'titre' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            // Contact
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:30',
            'adresse' => 'nullable|string|max:255',

            // Photo
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // CV
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',

            // Réseaux sociaux
            'linkedin' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
        ]);


        /*
        |--------------------------------------------------------------------------
        | PHOTO
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('photo')) {

            // Supprimer l'ancienne photo
            if (
                $parametre->photo &&
                Storage::disk('public')->exists($parametre->photo)
            ) {
                Storage::disk('public')->delete($parametre->photo);
            }

            // Enregistrer la nouvelle photo
            $validated['photo'] = $request
                ->file('photo')
                ->store('parametres', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | CV
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cv')) {

            // Supprimer l'ancien CV
            if (
                $parametre->cv &&
                Storage::disk('public')->exists($parametre->cv)
            ) {
                Storage::disk('public')->delete($parametre->cv);
            }

            // Enregistrer le nouveau CV
            $validated['cv'] = $request
                ->file('cv')
                ->store('cv', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | MISE À JOUR
        |--------------------------------------------------------------------------
        */

        $parametre->update($validated);


        /*
        |--------------------------------------------------------------------------
        | REDIRECTION
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.parametres.edit')
            ->with(
                'success',
                'Les paramètres ont été mis à jour avec succès.'
            );
    }
}
