<?php

namespace App\Http\Controllers;

use App\Mail\NouveauMessage;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        // Validation du formulaire
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sujet' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        // Enregistrement dans la base de données
        Message::create($validated);

        // Envoi du mail
        Mail::to(env('MAIL_USERNAME'))->send(
            new NouveauMessage(
                $validated['nom'],
                $validated['email'],
                $validated['sujet'],
                $validated['message']
            )
        );

        // Retour à la page
        return redirect()
            ->route('home')
            ->with('success', 'Votre message a bien été envoyé.');
    }
}