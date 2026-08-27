<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NouveauMessage extends Mailable
{
    use Queueable, SerializesModels;

    public string $nom;
    public string $email;
    public ?string $sujet;
    public string $contenu;

    /**
     * Création du message.
     */
    public function __construct(
        string $nom,
        string $email,
        ?string $sujet,
        string $contenu
    ) {
        $this->nom = $nom;
        $this->email = $email;
        $this->sujet = $sujet;
        $this->contenu = $contenu;
    }

    /**
     * Sujet de l'e-mail.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->sujet ?: 'Nouveau message depuis mon portfolio',
        );
    }

    /**
     * Vue utilisée pour le contenu de l'e-mail.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.nouveau-message',
        );
    }

    /**
     * Pièces jointes.
     */
    public function attachments(): array
    {
        return [];
    }
}