<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    /**
     * Afficher la liste des formations.
     */
    public function index()
    {
        $formations = Formation::latest()->get();

        return view(
            'admin.formations.index',
            compact('formations')
        );
    }

    /**
     * Afficher le formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.formations.create');
    }

    /**
     * Enregistrer une nouvelle formation.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'diplome' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        Formation::create($validated);

        return redirect()
            ->route('admin.formations.index')
            ->with(
                'success',
                'Formation ajoutée avec succès.'
            );
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Formation $formation)
    {
        return view(
            'admin.formations.edit',
            compact('formation')
        );
    }

    /**
     * Modifier une formation.
     */
    public function update(
        Request $request,
        Formation $formation
    ) {
        $validated = $request->validate([
            'diplome' => 'required|string|max:255',
            'etablissement' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
        ]);

        $formation->update($validated);

        return redirect()
            ->route('admin.formations.index')
            ->with(
                'success',
                'Formation modifiée avec succès.'
            );
    }

    /**
     * Supprimer une formation.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();

        return redirect()
            ->route('admin.formations.index')
            ->with(
                'success',
                'Formation supprimée avec succès.'
            );
    }
}