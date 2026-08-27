<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Créer la table parametres.
     */
    public function up(): void
    {
        Schema::create('parametres', function (Blueprint $table) {

            $table->id();

            // ==========================================
            // IDENTITÉ
            // ==========================================

            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();

            // ==========================================
            // INFORMATIONS PROFESSIONNELLES
            // ==========================================

            $table->string('titre')->nullable();

            $table->text('description')->nullable();

            // ==========================================
            // CONTACT
            // ==========================================

            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('adresse')->nullable();

            // ==========================================
            // FICHIERS
            // ==========================================

            $table->string('photo')->nullable();
            $table->string('cv')->nullable();

            // ==========================================
            // RÉSEAUX SOCIAUX
            // ==========================================

            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            // ==========================================
            // DATES
            // ==========================================

            $table->timestamps();
        });
    }

    /**
     * Supprimer la table parametres.
     */
    public function down(): void
    {
        Schema::dropIfExists('parametres');
    }
};
