<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécuter la migration.
     */
    public function up(): void
    {
        Schema::create('certifications', function (Blueprint $table) {

            $table->id();

            // Nom du certificat ou de l'attestation
            $table->string('titre');

            // Organisme qui a délivré le certificat
            $table->string('organisme')->nullable();

            // Description du certificat
            $table->text('description')->nullable();

            // Date d'obtention
            $table->date('date_obtention')->nullable();

            // Période de la formation
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();

            // Image du certificat
            $table->string('image')->nullable();

            // Document PDF du certificat
            $table->string('document')->nullable();

            // Lien de vérification du certificat
            $table->string('lien')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Annuler la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('certifications');
    }
};