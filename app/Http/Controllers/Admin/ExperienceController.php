<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Afficher la liste des expériences.
     */
    public function index()
    {
        $experiences = Experience::latest('date_debut')->get();

        return view(
            'admin.experiences.index',
            compact('experiences')
        );
    }

    /**
     * Afficher le formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.experiences.create');
    }

    /**
     * Enregistrer une nouvelle expérience.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'poste' => 'required|string|max:255',
            'entreprise' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'lieu' => 'nullable|string|max:255',
        ]);

        Experience::create($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with(
                'success',
                'Expérience ajoutée avec succès.'
            );
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Experience $experience)
    {
        return view(
            'admin.experiences.edit',
            compact('experience')
        );
    }

    /**
     * Modifier une expérience.
     */
    public function update(
        Request $request,
        Experience $experience
    ) {
        $validated = $request->validate([
            'poste' => 'required|string|max:255',
            'entreprise' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',
            'lieu' => 'nullable|string|max:255',
        ]);

        $experience->update($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with(
                'success',
                'Expérience modifiée avec succès.'
            );
    }

    /**
     * Supprimer une expérience.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()
            ->route('admin.experiences.index')
            ->with(
                'success',
                'Expérience supprimée avec succès.'
            );
    }
}