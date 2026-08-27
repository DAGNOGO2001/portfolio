<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Afficher la liste des services.
     */
    public function index()
    {
        $services = Service::latest()->get();

        return view(
            'admin.services.index',
            compact('services')
        );
    }

    /**
     * Afficher le formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Enregistrer un nouveau service.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'icone' => 'nullable|string|max:255',
        ]);

        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service ajouté avec succès.'
            );
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Service $service)
    {
        return view(
            'admin.services.edit',
            compact('service')
        );
    }

    /**
     * Mettre à jour un service.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'icone' => 'nullable|string|max:255',
        ]);

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service modifié avec succès.'
            );
    }

    /**
     * Supprimer un service.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with(
                'success',
                'Service supprimé avec succès.'
            );
    }
}