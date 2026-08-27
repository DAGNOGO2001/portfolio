<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Afficher la liste des compétences.
     */
    public function index()
    {
        $competences = Competence::latest()->get();

        return view('admin.competences.index', compact('competences'));
    }

    /**
     * Afficher le formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.competences.create');
    }

    /**
     * Enregistrer une nouvelle compétence.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'nullable|string|max:255',
            'niveau' => 'nullable|string|max:255',
            'icone' => 'nullable|string|max:255',
        ]);

        Competence::create($validated);

        return redirect()
            ->route('admin.competences.index')
            ->with('success', 'Compétence ajoutée avec succès.');
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Competence $competence)
    {
        return view(
            'admin.competences.edit',
            compact('competence')
        );
    }

    /**
     * Modifier une compétence.
     */
    public function update(
        Request $request,
        Competence $competence
    ) {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'categorie' => 'nullable|string|max:255',
            'niveau' => 'nullable|string|max:255',
            'icone' => 'nullable|string|max:255',
        ]);

        $competence->update($validated);

        return redirect()
            ->route('admin.competences.index')
            ->with(
                'success',
                'Compétence modifiée avec succès.'
            );
    }

    /**
     * Supprimer une compétence.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();

        return redirect()
            ->route('admin.competences.index')
            ->with(
                'success',
                'Compétence supprimée avec succès.'
            );
    }
}