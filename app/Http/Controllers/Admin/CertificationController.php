<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    /**
     * Afficher la liste des certifications.
     */
    public function index()
    {
        $certifications = Certification::latest()->get();

        return view(
            'admin.certifications.index',
            compact('certifications')
        );
    }

    /**
     * Afficher le formulaire d'ajout.
     */
    public function create()
    {
        return view('admin.certifications.create');
    }

    /**
     * Enregistrer une certification.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'organisme' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'date_obtention' => 'nullable|date',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'document' => 'nullable|file|mimes:pdf|max:10240',

            'lien' => 'nullable|url|max:255',
        ], [
            'titre.required' => 'Le titre de la certification est obligatoire.',

            'date_obtention.date' => 'La date d’obtention doit être valide.',
            'date_debut.date' => 'La date de début doit être valide.',
            'date_fin.date' => 'La date de fin doit être valide.',
            'date_fin.after_or_equal' =>
                'La date de fin doit être postérieure ou égale à la date de début.',

            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L’image doit être au format JPG, JPEG, PNG ou WEBP.',
            'image.max' => 'L’image ne doit pas dépasser 2 Mo.',

            'document.mimes' => 'Le document doit être au format PDF.',
            'document.max' => 'Le document PDF ne doit pas dépasser 10 Mo.',

            'lien.url' => 'Le lien doit être une URL valide.',
        ]);

        $certification = new Certification();

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS
        |--------------------------------------------------------------------------
        */

        $certification->titre = $request->titre;
        $certification->organisme = $request->organisme;
        $certification->description = $request->description;

        $certification->date_obtention = $request->date_obtention;
        $certification->date_debut = $request->date_debut;
        $certification->date_fin = $request->date_fin;

        $certification->lien = $request->lien;

        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {
            $certification->image = $request
                ->file('image')
                ->store('certifications', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | DOCUMENT PDF
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('document')) {
            $certification->document = $request
                ->file('document')
                ->store('certifications/documents', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | ENREGISTREMENT
        |--------------------------------------------------------------------------
        */

        $certification->save();

        return redirect()
            ->route('admin.certifications.index')
            ->with(
                'success',
                'Certification ajoutée avec succès.'
            );
    }

    /**
     * Afficher une certification.
     */
    public function show(Certification $certification)
    {
        return view(
            'admin.certifications.show',
            compact('certification')
        );
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(Certification $certification)
    {
        return view(
            'admin.certifications.edit',
            compact('certification')
        );
    }

    /**
     * Modifier une certification.
     */
    public function update(
        Request $request,
        Certification $certification
    ) {
        $request->validate([
            'titre' => 'required|string|max:255',
            'organisme' => 'nullable|string|max:255',
            'description' => 'nullable|string',

            'date_obtention' => 'nullable|date',
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date|after_or_equal:date_debut',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'document' => 'nullable|file|mimes:pdf|max:10240',

            'lien' => 'nullable|url|max:255',
        ], [
            'titre.required' => 'Le titre de la certification est obligatoire.',

            'date_obtention.date' => 'La date d’obtention doit être valide.',
            'date_debut.date' => 'La date de début doit être valide.',
            'date_fin.date' => 'La date de fin doit être valide.',
            'date_fin.after_or_equal' =>
                'La date de fin doit être postérieure ou égale à la date de début.',

            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'L’image doit être au format JPG, JPEG, PNG ou WEBP.',
            'image.max' => 'L’image ne doit pas dépasser 2 Mo.',

            'document.mimes' => 'Le document doit être au format PDF.',
            'document.max' => 'Le document PDF ne doit pas dépasser 10 Mo.',

            'lien.url' => 'Le lien doit être une URL valide.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | INFORMATIONS
        |--------------------------------------------------------------------------
        */

        $certification->titre = $request->titre;
        $certification->organisme = $request->organisme;
        $certification->description = $request->description;

        $certification->date_obtention = $request->date_obtention;
        $certification->date_debut = $request->date_debut;
        $certification->date_fin = $request->date_fin;

        $certification->lien = $request->lien;

        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            if (
                $certification->image &&
                Storage::disk('public')->exists($certification->image)
            ) {
                Storage::disk('public')->delete(
                    $certification->image
                );
            }

            $certification->image = $request
                ->file('image')
                ->store('certifications', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | DOCUMENT PDF
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('document')) {

            if (
                $certification->document &&
                Storage::disk('public')->exists($certification->document)
            ) {
                Storage::disk('public')->delete(
                    $certification->document
                );
            }

            $certification->document = $request
                ->file('document')
                ->store('certifications/documents', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | ENREGISTREMENT
        |--------------------------------------------------------------------------
        */

        $certification->save();

        return redirect()
            ->route('admin.certifications.index')
            ->with(
                'success',
                'Certification modifiée avec succès.'
            );
    }

    /**
     * Supprimer une certification.
     */
    public function destroy(Certification $certification)
    {
        /*
        |--------------------------------------------------------------------------
        | SUPPRIMER IMAGE
        |--------------------------------------------------------------------------
        */

        if (
            $certification->image &&
            Storage::disk('public')->exists($certification->image)
        ) {
            Storage::disk('public')->delete(
                $certification->image
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRIMER DOCUMENT
        |--------------------------------------------------------------------------
        */

        if (
            $certification->document &&
            Storage::disk('public')->exists($certification->document)
        ) {
            Storage::disk('public')->delete(
                $certification->document
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SUPPRIMER LA CERTIFICATION
        |--------------------------------------------------------------------------
        */

        $certification->delete();

        return redirect()
            ->route('admin.certifications.index')
            ->with(
                'success',
                'Certification supprimée avec succès.'
            );
    }
}